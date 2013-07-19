casper.start(casper.cli.get("url"), function() {
	this.viewport(1027,768);
	this.captureSelector('home.png', 'html');
});

casper.run();