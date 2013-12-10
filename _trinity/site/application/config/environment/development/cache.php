<?php

return array
(
	'file' => array
	(
		'driver' => 'file',
		'cache_dir' => APPPATH.'cache',
		'default_expire' => 1 // disabled in development
	),
	
	'apc' => array
	(
		'driver' => 'file',
		'cache_dir' => APPPATH.'cache',
		'default_expire' => 1 // disabled in development
	)
	
	/*
	'apc' => array
	(
		'driver' => 'apc',
		'default_expire' => 1 // disabled in development (1 second, because of bug in Kohana)
	)
*/	
);