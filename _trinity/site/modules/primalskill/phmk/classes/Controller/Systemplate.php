<?php

/**
 * Class that is used for handling templates
 */
class Controller_Systemplate extends Kohana_Controller
{
	/**
	 * @var class $_view This is the main view that handles the otehrs
	 */
	protected $_view;
	
	/**
	 * The before function, used here to construct the template
	 */
	public function before()
	{
		parent::before();

		// Get the user model. (method has redirection)
		$this->_user = Auth::instance()->is_logged_in();
				
		// Verify if the user has basic access.
		if ($this->_user === false)
		{
			HTTP::redirect('sys/login');
		}

		if ( ! $this->_user->roles->has('superadmin') )
		{
			HTTP::redirect('/');
		}		
		
		$this->_view = View::factory('_common/template');
		$this->_view->header = View::factory('_common/header');
		$this->_view->footer = View::factory('_common/footer');			
		
		// Construct the menu
		$menu = array(
			0 => array('name' => 'Home', 'link' => Route::url('sys')),
			1 => array('name' => 'Database', 'link' => Route::url('sys', array('controller' => 'db', 'action' => 'index'))),
			2 => array('name' => 'Users', 'link' => Route::url('sys', array('controller' => 'users', 'action' => 'index'))),
			3 => array('name' => 'Roles', 'link' => Route::url('sys', array('controller' => 'roles', 'action' => 'index'))),
			4 => array('name' => 'Permissions', 'link' => Route::url('sys', array('controller' => 'permissions', 'action' => 'index'))),
			5 => array('name' => 'Settings', 'link' => Route::url('sys', array('controller' => 'settings', 'action' => 'index'))),
		);
		
		$this->_view->menu = $menu;
	}
	
	/**
	 * The main purpose of this is to put the content of the view out to the browser
	 */
	public function after()
	{
		$this->response->body($this->_view);
		
		parent::after();
	}
	
} 
