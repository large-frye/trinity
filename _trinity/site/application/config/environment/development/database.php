<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
/*
	'default' => array
	(
		'type'       => 'mysql',
		'connection' => array(
			'hostname'   => 'localhost',
			'username'   => 'root',
			'password'   => '',
			'persistent' => FALSE,
			'database'   => 'cdm_hr',
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => TRUE,
	)
*/

	'default' => array
	(
		'type'       => 'mysql',
		'connection' => array(
			'hostname'   => 'trinity.devfrye.com',
			'username'   => 'dholmblad',
			'password'   => 'Darren1',
			'persistent' => FALSE,
			'database'   => 'trinity_data',
		),
		'table_prefix' => '',
		'charset'      => 'utf8',
		'caching'      => FALSE,
		'profiling'    => TRUE,
	)
);



