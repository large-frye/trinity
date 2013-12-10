<?php

class View_Layout
{
	protected $_layout = 'layout/core';

	protected $_template = '';
	protected $_partials = array();		
	
	public $status_messages = null;

	/**
	 * @var object Holds the user object
	 */
	protected $_user = null;

	/**
	 * Get the css assets for the mustache templates
	 *
	 * @return array|bool If CSS assets are found returns the registered css array, FALSE on empty assets
	 *
	 */
	public function asset_css()
	{
		$css = Asset::instance()->css();
		$tmp = array();
	
		if (! empty($css) )
		{
			foreach ($css as $key => $value)
			{
				array_push($tmp, $value);
			}
		}
		else
		{
			$tmp = false;
		}		
	
		unset($css);
	
		return $tmp;
	}

	/**
	 * Get the javascript assets for the mustache templates
	 *
	 * @return array|bool If Javascript assets are found returns the registered js array, FALSE on empty assets
	 *
	 */
	public function asset_js()
	{
		$js = Asset::instance()->js();
		$tmp = array();
	
		if (! empty($js) )
		{
			foreach ($js as $key => $value)
			{
				array_push($tmp, $value);
			}
		}
		else
		{
			$tmp = false;
		}		
	
		unset($js);
	
		return $tmp;
	}

	/**
	 * Get the javascript options that can be set in view models
	 *
	 * @return array|bool If Javascript options are found return an array, FALSE otherwise  
	 *
	 */
	public function js_options()
	{
		$opts = Asset::instance()->get_js_options();
	
		if ( empty($opts) ) { return false; }
	
		$ret = '';
		foreach ($opts as $namespace => $data)
		{
			$ret .= 'JS.namespace("' .$namespace .'");';
			$ret .= 'JS.' .$namespace .' = ' .json_encode($data) .';';
		}
		
		return $ret;		
	}
	
	
	/**
	 * Get the status messages (defaults to 'global' message group)
	 *
	 * @return array The messages array for the global message group
	 *
	 */
	public function is_alert()
	{
		if ( $this->status_messages === null )
		{
			$this->status_messages = Message::instance()->get_flat();
		}
			
		return (bool) $this->status_messages;
	}
	
	/**
	 * See if we have a user logged in
	 * @return boolean
	 */
	public function is_logged_in()
	{
		$this->_user = Auth::instance()->is_logged_in();		
		return (bool)($this->_user !== false);
	}
	
	protected function _set_redirect()
	{
		$subdomain = 'www';
		$subdomains = array('admin', 'client', 'inspector', 'www');
		
		if ( $this->_user->roles->has('client') )
		{
			$subdomain = 'client';
		}

		if ( $this->_user->roles->has('admin') )
		{
			$subdomain = 'admin';
		}
		
		if ( $this->_user->roles->has('inspector') )
		{
			$subdomain = 'inspector';
		}		
		
		$request = Request::current();
		
		if ( is_object($request) && method_exists($request, 'url') )
		{
			$baseurl = $request->url();
		}
		else
		{
			$baseurl = URL::base();
		}
		
		$url = str_replace('http://', '', $baseurl);
		
		
		$exploded = explode('.', $url);
		
		if ( in_array($exploded[0], $subdomains) )	
		{
			$exploded[0] = $subdomain;
			$redirect = implode('.', $exploded);
		}
		else
		{
			$redirect = $subdomain.'.'.implode('.', $exploded);
		}
		
		$redirect = explode('/', $redirect);
		$redirect = $redirect[0];
		
		return 'http://'.$redirect;	
	}
	
	public function top_navigation()
	{
		return array(
			'username' => (isset($this->_user->username))? $this->_user->username : '',
		
			'url_profile' => ($this->_user !== false)? $this->_set_redirect() : '',
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
		return array
		(
			array
			(
				'name' => 'Home',
				'url' => '/'
			),
			array(
				'name' => 'About',
				'url' => '/about'
			),
			array(
				'name' => 'Services',
				'url' => '/services'
			),
			array(
				'name' => 'Damage Types',
				'url' => '/damage-types',
			),
			array(
				'name' => 'Testimonials',
				'url' => '/testimonials'
			),
			array(
				'name' => 'Contact',
				'url' => '/contact'
			)
		);
	}

}