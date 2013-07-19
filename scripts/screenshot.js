var casper = require("casper").create({
	viewportSize: {width:1024, height:768}
});

casper.cli.get('url') || casper.warn("Missing source url parameter (url)").exit(1);
casper.cli.get('file') || casper.warn("Missing destination file parameter (file)").exit(1);

casper.start(casper.cli.get('url'), function(){
	this.captureSelector(casper.cli.get('file'), 'html');
});

casper.run();