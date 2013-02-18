<?php defined('SYSPATH') OR die('No direct script access.');

/*
 * Load in all environments
 */
$modules = array(
	'common'		=> MODPATH.'common'		//Kohana common module
	// 'auth'       => MODPATH.'auth',       // Basic authentication
	// 'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	// 'database'   => MODPATH.'database',   // Database access
	// 'image'      => MODPATH.'image',      // Image manipulation
	// 'minion'     => MODPATH.'minion',     // CLI Tasks
	// 'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	// 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
);

/*
 * Only load in non-production environments
 * Unit testing is enabled automatically by phpunit
 */
if (Kohana::$environment !== Kohana::PRODUCTION)
{
	$modules = Arr::merge($modules,array(
	));
}

return $modules;