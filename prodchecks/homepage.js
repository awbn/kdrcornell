casper.cli.get('url') || casper.warn("Missing URL parameter").exit(1);
casper.test.comment('Check core functionality of the homepage');

casper.start(casper.cli.get("url"), function(){
    this.test.assertHttpStatus(200, "Homepage returns HTTP 200");
    this.test.assertTextExists("ΚΔΡ", "Greek letters exist on the page");
    this.test.assertTextExists("Kappa Delta Rho", "Text 'Kappa Delta Rho' exists on the page");
})

casper.run(function() {
    this.test.done(3);
});
