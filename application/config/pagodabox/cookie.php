<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Salt should be changed for each environment
 **/
return array(
	"salt"  =>	$_SERVER["COOKIE_SALT"]
);