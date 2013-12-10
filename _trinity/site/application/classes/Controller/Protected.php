<?php

class Controller_Protected extends Controller_Public
{
	/**
	 * @var array Variable holding the currently logged in user's data
	 */
	protected $_user = null;
	
	protected $_redirect_url = null;
	/**
	 * Handle the permissions, sessions and redirecting
	 *
	 * @return void
	 *
	 */
	public function before()
	{
		parent::before();
		
		// Get the user model. (method has redirection)
		$this->_user = Auth::instance()->is_logged_in();
				
		// Verify if the user has basic access.
		if ($this->_user === false)
		{			
			HTTP::redirect(Route::url('authentication', array('action' => 'login')));
		}
		
		$this->_set_redirect();
	
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
		
		$url = str_replace('http://', '', $this->request->url());
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
		
		$this->_redirect_url = 'http://'.$redirect;	
	}
	
	
	/**
	 * Verify if the user has the required permissions for the page, handle redirect and message too.
	 *
	 * @param string The permission string
	 * @param string The error message in case the permission fails
	 *
	 * @return void
	 */
/*
	protected function _verify_permission( $permission, $error_message )
	{
		if (! $this->_user->permissions->can($permission) )
		{
			Message::instance()->error(__($error_message));

			$this->request->redirect('/');
			exit;
		}
	}	
*/
}