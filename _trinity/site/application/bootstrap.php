<?php defined('SYSPATH') or die('No direct script access.');

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
date_default_timezone_set('UTC');

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
//spl_autoload_register(array('Kohana', 'auto_load_lowercase'));

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
// if (isset($_SERVER['KOHANA_ENV']))
// {
	// Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
// }

$env = getenv('KOHANA_ENV');
if ($env !== false)
{
	Kohana::$environment = constant('Kohana::'.strtoupper($env));
	$env = strtolower($env);
}
else
{
	Kohana::$environment = Kohana::DEVELOPMENT;
	$env = 'development';
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
 
if ( (! isset($_SERVER['HTTP_HOST'])) && (! isset($_SERVER['SERVER_NAME'])) )
{
	$_SERVER['SERVER_NAME'] = 'www.trinity.dev';
	$host_name = 'www.trinity.dev';
}
else
{
	$host_name = (isset($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
}
 


Kohana::init(array(
	'base_url'   => 'http://'.$host_name.'/',
	'index_file' => '',
	'charset' => 'utf-8',
	'profile' => false,
	'cache' => true,
	'cache_dir' => APPPATH .'cache',
	'errors' => true
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
if (Kohana::$environment != Kohana::PRODUCTION)
{
	Kohana::$config->attach(new Config_File('config/environment/' .$env));
}
else
{
	Kohana::$config->attach(new Config_File);
}

/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
	 'primalskill/auth'       => MODPATH.'primalskill/auth',       // Basic authentication
	 'cache'      => MODPATH.'cache',      // Caching with multiple backends
	 'database'   => MODPATH.'database',   // Database access
	 'image'      => MODPATH.'image',      // Image manipulation
	 'minion'     => MODPATH.'minion',     // CLI Tasks
//	 'unittest'   => MODPATH.'unittest',   // Unit testing
	 'email'	=> MODPATH.'email',
	 'primalskill/purifier'	=> MODPATH.'primalskill/purifier',
	 'primalskill/phmk' => MODPATH.'primalskill/phmk',
	 'primalskill/mustache' => MODPATH.'primalskill/mustache',
	 'primalskill/psusers' => MODPATH.'primalskill/psusers',
	 'primalskill/security' => MODPATH.'primalskill/security',
	 'primalskill/helpers' => MODPATH.'primalskill/helpers',
	 'primalskill/pssettings' => MODPATH.'primalskill/pssettings',
	 'primalskill/message' => MODPATH.'primalskill/message',
	 'primalskill/psmedia' => MODPATH.'primalskill/psmedia',
	 'primalskill/pagination' => MODPATH.'primalskill/pagination',
	 'primalskill/activity-stream' => MODPATH.'primalskill/activity-stream',
	 'primalskill/asset' => MODPATH .'primalskill/asset'

	));
	
	
// Session settings
Session::$default = 'database';

Kohana_Cookie::$salt = md5('prjaka-121004');
Kohana_Cookie::$expiration = 1209600; // 14 days

if (Kohana::$environment == Kohana::STAGING)
{
	Kohana_Cookie::$domain = '.pixelchocolate.trinity.pskdev.com';
}
elseif (Kohana::$environment == Kohana::PRODUCTION)
{
	Kohana_Cookie::$domain = '.trinity.is';
}
else
{
	Kohana_Cookie::$domain = '.trinity.dev';	
}



// Set the general cache lifetime 
if (Kohana::$environment == Kohana::PRODUCTION)
{
	Kohana::$cache_life = 0; // 300 seconds
}
else
{
	Kohana::$cache_life = 0; // 0 second
}	

require_once('_routes.php');