<?php 

$assets_root = 'assets/';



if(Kohana::$environment === 40){
$assets_root = 'trinity/site/public_html/assets/';
}



// Asset constants
define('ASSETS', Kohana::$base_url .$assets_root);
define('ASSETS_CSS', ASSETS .'css/');
define('ASSETS_JS', ASSETS .'js/');

define('ASSETS_VENDOR', ASSETS .'vendor/');

// Auto-load assets config
$assets_config = Kohana::find_file('config', 'asset', 'php');

if (! empty($assets_config) )
{	
	Kohana::load($assets_config[0]);
}

unset($assets_config);
