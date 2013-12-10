<?php

class View_Protected_Layout extends View_Layout
{
	/**
	 * @var string Overloaded the layout template from the parent class.
	 */
	protected $_layout = 'protected/layout/core';
	
	/**
	 * @var object Holds the user object
	 */
	protected $_user = null;
	
	/**
	 * @var boolean To check if we have a sidebar
	 */
	public $has_sidebar = false;
	
	/**
	 * @var array Holds the links that get added to the sidebar
	 */
	public $sidebar_links = array();
	
	public function __construct()
	{	
		// Get the logged in user (no need to handle permissions here, already handled in controller)
		$this->_user = Auth::instance()->is_logged_in();		
	}
	
	
	public function top_navigation()
	{
		return array(
			'username' => $this->_user->username,
		
			'url_profile' => '/',
			'url_settings' => Route::url('default', array('controller' => 'my', 'action' => 'profile')),
			'url_logout' => Route::url('authentication', array('action' => 'logout'))
		);
	}
	
	/**
	 * Main navigation for administrators
	 *
	 * @return array The navigation items
	 */
	public function main_navigation()
	{	
		$url = str_replace('http://', '', URL::base());
		$parts = explode('.', $url);
		$subdomain = $parts[0];
		
		if ( $subdomain == 'admin' )
		{
			$m = new View_Protected_Admin_Layout();
			return $m->main_navigation();
		}
		
		if ( $subdomain == 'inspector' )
		{
			$m = new View_Protected_Inspector_Layout();
			return $m->main_navigation();
		}
		
		return array
		(
			array
			(
				'name' => 'Dashboard',
				'url' => Route::url('client')
			)
		);
	}
	
}