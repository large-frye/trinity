<?php

/**
 * Controller class for authentication
 */
class Controller_Authentication extends Kohana_Controller
{
	/**
	 * @var array 
	 */
	protected $_auth = null;
	
	/**
	 * Action login: handle login process
	 */
	public function action_login()
	{
		$this->_auth = Auth::instance(); 
	
		$view = View::factory('authentication/login');
	
		// The user is already logged in. 
		if ( $this->_auth->is_logged_in() !== false )
		{
			HTTP::redirect('/');
		}	
		
		// Process POST
		if ( $this->request->method() === HTTP_Request::POST )
		{
			$post = $this->request->post();

		/*	if ( (! isset($post['token'])) || (! Security::CSRF_valid($post['token'])) )
			{
				HTTP::redirect(Route::url('authentication', array('action' => 'login')));
			}
*/
			if ( $this->_auth->login($post['username'], $post['password']) === false )
			{
				$view->error = 'The username or password is incorrect.'	;				
			}
			else
			{
					$user = $this->_auth->is_logged_in();
					
					if ( $user->banned == 1 || $user->deleted == 1 )
					{
						$this->_auth->logout(true);
						HTTP::redirect('/sys/login');
					}
					
					HTTP::redirect('/sys/users'); 
			}
		}

		$this->response->body($view);
	}

	/**
	 * Action logout: handle logout process
	 */
	public function action_logout($surpress_message = false)
	{		
		if ( Auth::instance()->logout() )
		{
			if ( $surpress_message === false )
			{
				//error message here
			}
			
			HTTP::redirect(Route::url('sys/authentication', array('action' => 'login')));
		}
		else
		{
			if ( $surpress_message === false )
			{
				Message::instance()->error(__('Log out failed. Please try again.'), 'global'); 
			}
			
			HTTP::redirect('/');	
		}
	}	

}
