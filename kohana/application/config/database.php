<?php defined('SYSPATH') or die('No direct access allowed.');

return array(
    'default' => array('type'       => 'mysql',
    	               'connection' => array('hostname'   => 'trinity.devfrye.com',
    	               	                     'database'   => 'trinity_data',
    	               	                     'username'   => 'adfrye',
    	               	                     'password'   => 'Sprite20**',
    	               	                     'persistent' => FALSE),
    	               'table_prefix' => '',
    	               'charset'      => 'utf8',
    	               'caching'      => FALSE,
    	               'profiling'    => TRUE),
);