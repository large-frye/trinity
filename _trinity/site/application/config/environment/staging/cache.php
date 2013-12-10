<?php

return array
(
	'file' => array
	(
		'driver' => 'file',
		'cache_dir' => APPPATH.'cache',
		'default_expire' => 172800
	),
	
	'apc' => array
	(
		'driver' => 'apc',
		'default_expire' => 172800 
	)	
);