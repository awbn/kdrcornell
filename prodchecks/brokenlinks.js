// Based on https://gist.github.com/n1k0/4509789

casper.cli.get('url') || casper.warn("Missing URL parameter").exit(1);
casper.test.comment('Crawl site for broken links.  Starting page: ' + casper.cli.get("url"));

var links = {
    to_crawl : [],
    crawled : [],
    errors : [],
    max_depth : casper.cli.get('max-depth') || 200,
    base_url : casper.cli.get('url').replace(/\/?$/, '/')
},
    utils = require('utils');

// Url object
function Url(url, referer, status)
{
    this.url = url;
    this.referer = referer || null;
    this.status = status || null;

    this.is_internal = function(){
        return this.url.indexOf(links.base_url) !== -1;
    };

    this.toString = function(){
        return this.url + " (" + this.status + "; linked from " + this.referer + ")";
    };
}

// Some quick helper functions from http://stackoverflow.com/questions/1988349/array-push-if-does-not-exist

// check if an element exists in array using a comparison function
// comparer : function(currentElement)
Array.prototype.inArray = function(comparer) {
    for(var i=0, n=this.length; i<n; i++) {
        if(comparer(this[i])) return true;
    }
    return false; 
}; 

// adds an element to the array if it does not already exist using the passed comparison 
// function
Array.prototype.pushIfUnique = function(element, comparer) {
    if (!this.inArray(comparer)) {
        this.push(element);
    }
}; 

// Check resources as well
casper.on("resource.received", function(request)
{
  // Log broken resource links if they originated internally and this is not the initial request
  if (casper.getCurrentUrl().indexOf(links.base_url) !== -1 &&
    casper.getCurrentUrl() != request.url &&
    (request.status == 404 || request.status == 500))
  {
    var url = new Url(
            request.url,
            (casper.getCurrentUrl() == 'https://js-uri.googlecode.com/svn/trunk/lib/URI.js') ? null : casper.getCurrentUrl(),
            request.status
        );
    links.errors.pushIfUnique(url, function(e){
        return url.url === e.url;
    });
  }
});

// Crawl a link
function crawl(link)
{
    this.clear().start().then(function(){
        this.open(link.url);
        links.crawled.push(link.url);
        casper.log('Crawling ' + link.url + "(status: " + this.currentHTTPStatus + ")", 'info');
    }).then(function(){
        switch(this.currentHTTPStatus)
        {
            case 404:
            case 500:
                // Add to list of errors
                link.status = this.currentHTTPStatus;
                links.errors.push(link);
                break;
            default:
                // Only continue to crawl internal links on HTML pages
                if(link.is_internal() ){
                    find_links.call(this).forEach(function(url){
                        casper.log("New link: " + url, 'info');
                        var href = new Url(url, link.url);
                        links.to_crawl.pushIfUnique(href, function(e){
                            return href.url === e.url;
                        });
                    });
                }
        }
    });
}

// Fetch all <a> elements from the page and return
function find_links()
{
    // Initial List
    var hrefs = this.evaluate(function _fetch_links(){
        return [].map.call(__utils__.findAll('a[href]'), function(node) {
            return node.getAttribute('href');
        });
    });

    return utils.unique(hrefs).filter(function(url){
        // Filter out Javascript, bookmark, ftp urls, etc 
        return !new RegExp('^(#|ftp|javascript|mailto)').test(url);
    }).map(function(url){
        // Translate to absolute URLs
        return absolute_path(url, links.base_url);
    }).filter(function(url){
        // Filter ones we've already checked
        return links.crawled.indexOf(url) === -1;
    });
}

// Translate to absolute paths
function absolute_path(url, base) {
    return new URI(url).resolve(new URI(base)).toString();
}

// Main controller
function controller()
{
    // Are any links left to crawl?  And are we under the max depth?
    if(links.to_crawl.length > 0 && links.crawled.length < links.max_depth){
        var link = links.to_crawl.shift();
        crawl.call(this, link);
        this.run(controller);
    }else{
        // Wrap up and report results
        this.test.comment(links.crawled.length + " page(s) crawled");
        casper.log(links.crawled.join('\n'), 'info');
        if(links.errors.length > 0){
            this.test.fail(links.errors.length + " broken links were found");
            links.errors.forEach(function(link){
                casper.test.error(link.toString());
            });
        }
        this.test.done();
    }
}

// Make sure URI lib is loaded
casper.start('https://js-uri.googlecode.com/svn/trunk/lib/URI.js', function() {
    var scriptCode = this.getPageContent() + '; return URI;';
    window.URI = new Function(scriptCode)();
    if (typeof window.URI !== "function") {
        this.warn('Could not setup URI.js').exit();
    }
});

// Populate with initial URL
links.to_crawl.push(new Url(links.base_url));

// Start crawling links...
casper.run(function(){
    this.run(controller);
});
