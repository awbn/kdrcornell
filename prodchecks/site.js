casper.cli.get('url') || casper.warn("Missing URL parameter").exit(1);

var urls = [
	"robots.txt",
	"humans.txt",
	"sitemap.xml",
	"build.json"
	],
	base = casper.cli.get('url').replace(/\/?$/, '/');

casper.start().then(function(){
	urls.forEach(function(url){
		this.clear().open(base + url);
		this.test.assertHttpStatus(200, url + " returns HTTP 200");
	})
	casper.test.done(urls.length);
});