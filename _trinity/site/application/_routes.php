<?php

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */

/*  Route::set('inspections', 'inspections(/<action>(/<id>))')
	->defaults(array(
		'controller' => 'inspections',
		'action' => 'form'
	));*/
 
 /*
 Route::set('workorder', 'workorder(/<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' => 'workorder',
		'action' => 'submit'
	));*/
 
 Route::set('authentication', '<action>', array('action' => '(login|logout|forgotpassword|resetpassword)'))
	->defaults(array(
		'controller' => 'authentication',
		'action' => 'login'
	));
	
 Route::set('signup', 'signup(/<action>)', array('action' => '(client)'))
	->defaults(array(
		'controller' => 'signup',
		'action' => 'client'
	));	

Route::set('get', 'get(/<controller>(/<action>(/<type>(/<id>))))')
	->defaults(array(
		'directory' => 'get',
		'controller' => 'image',
		'action' => 'index'
	));	
	
Route::set('my', 'my(/<action>)')
	->defaults(array(
		'controller' => 'my',
		'action'     => 'profile',
	));	
	
Route::set('admin', '(<controller>(/<action>(/<id>)))')
	->filter(function($route, $params, $request)
	{
		$url = str_replace('http://', '', $request->url());
		$subdomain = explode('.', $url);
		
		if ( (! isset($subdomain[0])) || ($subdomain[0] != 'admin') )
		{
			return false;
		}		
	})
	->defaults(array(
		'directory' => 'admin',
		'controller' => 'workorders'
	));
	

Route::set(
	'inspector/getphoto', 
	'inspections/getphoto/(<size>(/<workorder_id>(/<photo_id>)))',
	array(
		'size' => '(t|o|r)',
		'workorder_id' => '([0-9]+)',
		'photo_id' => '([a-z0-9-_]+)'
	))
	->filter(function($route, $params, $request)
	{
		$url = str_replace('http://', '', $request->url());
		$subdomain = explode('.', $url);
		
		if ( (! isset($subdomain[0])) || ($subdomain[0] != 'inspector') )
		{
			return false;
		}		
	})
	->defaults(array(
		'directory' => 'inspector',
		'controller' => 'get_photos',
		'action' => 'index',
		'size' => 't',
		'workorder_id' => 0,
		'photo_id' => 0
	));	

	
Route::set('inspector', '(<controller>(/<action>(/<id>)))')
	->filter(function($route, $params, $request)
	{
		$url = str_replace('http://', '', $request->url());
		$subdomain = explode('.', $url);
		
		if ( (! isset($subdomain[0])) || ($subdomain[0] != 'inspector') )
		{
			return false;
		}		
	})
	->defaults(array(
		'directory' => 'inspector',
		'controller' => 'inspections',
		'action' => 'index'
	));	
	
Route::set('client', '(<controller>(/<action>(/<id>)))')
	->filter(function($route, $params, $request)
	{
		$url = str_replace('http://', '', $request->url());
		$subdomain = explode('.', $url);
		
		if ( (! isset($subdomain[0])) || ($subdomain[0] != 'client') )
		{
			return false;
		}		
	})
	->defaults(array(
		'directory' => 'client',
		'controller' => 'workorder',
		'action' => 'index'
	));		
	
Route::set(
	'getphoto', 
	'getphoto/inspection/(<size>(/<workorder_id>(/<photo_id>)))',
	array(
		'size' => '(t|o|r)',
		'workorder_id' => '([0-9]+)',
		'photo_id' => '([a-z0-9-_]+)'
	))
	->defaults(array(
		'controller' => 'getphoto',
		'action' => 'inspection',
		'size' => 't',
		'workorder_id' => 0,
		'photo_id' => 0
	));		
 
Route::set('static', '<page_name>(/<subpage_name>)')
	->defaults(array(
		'controller' => 'static',
		'action' => 'index'
	));
 
Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' => 'welcome',
		'action'     => 'index',
	));