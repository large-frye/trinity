<?php
/**
 * We set the route for the system 
 */
Route::set('sys/authentication', 'sys(/<action>)', array('action' => '(login|logout)'))
	->defaults(array(
		'controller' => 'authentication',
		'action' => 'login'
	));
 
Route::set('sys', 'sys(/<controller>(/<action>(/<id>)))')
	->defaults(array(
		'directory' => 'sys',
		'controller' => 'dashboard',
		'action'     => 'index',
	));	
	