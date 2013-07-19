<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */

Route::set('brotherhood', 'brotherhood/<slug>', array(
		'slug'	=>  '[a-zA-Z0-9_-]+'
	))->defaults(array(
		'controller' 	=> 'pages',
		'action'		=> 'brother_detail'
	));

Route::set('centennial', 'centennial(/<action>)')
	->defaults(array(
		'controller' 	=> 'centennial',
		'action'		=> 'index'
	));

Route::set('donate', 'donate(/<action>)', array(
		'action' => 'donate|confirm'
	))->defaults(array(
		'controller' 	=> 'pages',
		'action'		=> 'donate'
	));

Route::set('pages', '(<action>)', array(
		'action' => 'home|about|history|brotherhood|multimedia|contact|rush|alumni|board'
	))->defaults(array(
		'controller' 	=> 'pages',
		'action'		=> 'home'
	));

Route::set('site', '<action>.<ext>', array(
		'action' => 'sitemap|robots|humans|build',
		'ext'	 => 'txt|xml|json'
	))->defaults(array(
		'controller' 	=> 'site'
	));

Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' 	=> 'pages',
		'action'		=> 'home'
	));