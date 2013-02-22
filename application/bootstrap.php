<?php defined('SYSPATH') OR die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/Kohana/Core'.EXT;

if (is_file(APPPATH.'classes/Kohana'.EXT))
{
	// Application extends the core
	require APPPATH.'classes/Kohana'.EXT;
}
else
{
	// Load empty core extension
	require SYSPATH.'classes/Kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/timezones
 */
date_default_timezone_set('America/New_York');

/**
 * Set the default locale.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/function.setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @link http://kohanaframework.org/guide/using.autoloading
 * @link http://www.php.net/manual/function.spl-autoload-register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Optionally, you can enable a compatibility auto-loader for use with
 * older modules that have not been updated for PSR-0.
 *
 * It is recommended to not enable this unless absolutely necessary.
 */
// spl_autoload_register(array('Kohana', 'auto_load_lowercase'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @link http://www.php.net/manual/function.spl-autoload-call
 * @link http://www.php.net/manual/var.configuration#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
I18n::lang('en-us');

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV']))
{
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}

/**
 *
 * Enable the Common module early to handle exceptions
 *
 * Must include the initiation here, outside of the normal module load
 * If loaded after Kohana::init(), e.g. when modules' init are processed,
 * Kohana_Exception is already defined.
 * 
 * Wrap in an if statement to allow the app to override further.
 * Kohana will load the APPPATH version automatically, if present
 *
 * See: https://github.com/kohana/core/pull/300
 * See: http://dev.kohanaframework.org/issues/4614
 */

if ( ! file_exists(APPPATH."classes/Kohaha/Exception".EXT) AND file_exists(MODPATH."common/classes/Kohana/Exception".EXT))
{
	Kohana::modules(array('common' => MODPATH.'common'));
}

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - integer  cache_life  lifetime, in seconds, of items cached              60
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 * - boolean  expose      set the X-Powered-By header                        FALSE
 */
Kohana::init(array(
	'base_url'   => '',
	'index_file' =>	FALSE,
	'profile'    => Kohana::$environment !== Kohana::PRODUCTION,
	'caching'    => Kohana::$environment === Kohana::PRODUCTION,
	'errors'     => TRUE,
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);

/**
 * Attach platform specific configs, if present
 * Settings in the platfrom specific files override the generic config settings
 */
if (isset($_SERVER['PLATFORM']) AND is_dir(APPPATH.'config/'.strtolower($_SERVER['PLATFORM'])))
{
	Kohana::$config->attach(new Config_File('config/'.strtolower($_SERVER['PLATFORM'])));
}

/**
 * Set cookie salt
 */
Cookie::$salt = Kohana::$config->load('cookie.salt');

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(Kohana::$config->load('modules')->as_array());

/**
 * Include core routes.  Don't throw an exception if not found, as some modules may contain routes.
 */
if (is_file(APPPATH.'routes/routes'.EXT))
{
	require_once APPPATH.'routes/routes'.EXT;
}
