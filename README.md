kdrcornell
==========
Master: [![Build Status](https://travis-ci.org/awbn/kdrcornell.png?branch=master)](https://travis-ci.org/awbn/kdrcornell)
Release: [![Build Status](https://travis-ci.org/awbn/kdrcornell.png?branch=release)](https://travis-ci.org/awbn/kdrcornell)

Code for kdrcornell.com

Setup a dev environment:
==========
- Make sure that git, Apache, MySQL, and PHP (including php-pear and curl) are installed
- Switch to your working directory
- `git clone https://github.com/awbn/kdrcornell`
- If [Phing](http://www.phing.info/) is not installed, run `scripts/prereqs.sh`
- Run `phing dev-setup` to install dependencies and set up the environment

To Submit changes:
==========
- Run `phing test` to run unittests against your code.  Make sure everything passes
- Run `phing phpcs` to check your coding style.
- Run `phing prodchecks` to verify that your local changes render correctly
- Use `git push` if you have permissions, or submit a github pull request

Deploy:
==========
- Check-ins to the 'release' branch are deployed automatically (after validations)
-