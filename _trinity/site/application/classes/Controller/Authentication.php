<?php
/**
 * Controller for authentication, including sign in, sign out
 */
class Controller_Authentication extends Controller_Public
{
	/**
	 * @var object The authentication class.
	 */
	protected $_auth = null;
	
	protected $_user = null;
	
	
	public function before()
	{
		parent::before();
		
		$this->_auth = Auth::instance();		
	}
	
	
	/**
	 * Action login: handle login process
	 *
	 * @return void
	 */
	public function action_login()
	{
		// The user is already logged in. 
		if ( $this->_auth->is_logged_in() !== false )
		{
			HTTP::redirect('/');
		}
	
		// Process the form if submitted.
		if ( $this->request->method() === HTTP_Request::POST )
		{
			if ( $this->_process_login() === true )
			{	
				Activity_Stream::instance()->template('user-logged-in', $this->_user->id, null);	
				
				$redirect = $this->_define_redirect();			
			
				if ( $this->_user->roles->has('admin') ||  $this->_user->roles->has('inspector'))
				{
					//Session::instance()->delete('redirect_to');
					//HTTP::redirect($redirect);
				}
				
				if ( $this->_user->roles->has('client') )
				{				
					$redirect_url = Session::instance()->get_once('redirect_to', $redirect);
					HTTP::redirect($redirect_url);
				}
			}
		}
	
		// Initialize the ViewModel for this action.
		$this->_view = new View_Authentication_Login();
	}

	/**
	 * Process the login
	 *
	 * @return bool It returns FALSE if login was unsuccessful.
	 */
	protected function _process_login()
	{
		$post = Security::sanitize($this->request->post());

		// Login is invalid
		if ( $this->_auth->login($post['username'], $post['password']) === false )
		{
			Message::instance()->error(__('Your username or password is incorrect.'));
			
			return false;
		}
		else
		{
			$this->_user = $this->_auth->is_logged_in();

			// The user is deleted or banned
			if ( (int)$this->_user->deleted !== 0 || (int)$this->_user->banned !== 0 )
			{
				Message::instance()->error(__('Your acces has been denied.'));

				$this->_auth->logout();
				
				return false;
			}			
			
			// Login was successful.
			return true;
			
		}
		
		
		return false;
	}
	
	/**
	 * Define the redirect URL after the login specified by the role of the user
	 */
	protected function _define_redirect()
	{
		if ( $this->_user->roles->has('admin') )
		{
			$subdomain = 'admin';
		}
		
		if ( $this->_user->roles->has('inspector') )
		{
			$subdomain = 'inspector';
		}
		
		if ( $this->_user->roles->has('client') )
		{
			$subdomain = 'client';
		}		
		
		$subdomains = array('admin', 'client', 'inspector', 'www');
		
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

        if(Kohana::$environment === Kohana::DEVELOPMENT) {
            $redirectArr = explode('/', $redirect);
            $redirect = $redirectArr[0] . '.com/' . $redirectArr[1];
        }
		
		return 'http://'.$redirect;	
	}

	/**
	 * Action logout: handle logout process
	 *
	 * @return void
	 */
	public function action_logout()
	{		

		$this->_user = $this->_auth->is_logged_in();	
		
		$subdomains = array('admin', 'client', 'inspector', 'www');		
		
		if ($this->_user === false)
		{
			$this->redirect(Route::url('authentication'));
		}
	
		if ( Auth::instance()->logout() )
		{
			Activity_Stream::instance()->template('user-logged-out', $this->_user->id, null);			
			
			$url = str_replace('http://', '', $this->request->url());
			$exploded = explode('.', $url);
			
			if ( in_array($exploded[0], $subdomains) )
			{
				$exploded[0] = 'www';
				$redirect = implode('.', $exploded);
			}
			else
			{
				$redirect = 'www.'.implode('.', $exploded);
			}
	
			$redirect = 'http://'.$redirect;
		
			Message::instance()->info(__('You successfully logged out.'));
			HTTP::redirect($redirect);
		}
		else
		{
			Message::instance()->error(__('Log out failed. Please try again.')); 
			HTTP::redirect('/');	
		}
	}

	/**
	 * Action for requesting the email where to send the reset code
	 */
	public function action_forgotpassword()
	{
		if ( Auth::instance()->is_logged_in() )
		{
			HTTP::redirect('/');
		}	
		
		// Handle post
		if ( $this->request->method() == Request::POST )
		{
			$post = Security::sanitize($this->request->post());
			
			// Check if the email exists in the post
			if ( isset( $post['email'] ) )
			{
				try
				{
					// Check if we have the user with the email
					$m_users = new Model_Psusers();
					
					$user = $m_users->load_by(array('email' => $post['email']));
					
					if ( $user->id !== null )
					{
						// Generate the code
						$m_users->generate_password_code();
						
						// Get the code
						$code = $m_users->get_pwcode_by(array('user_id' => $user->id));
						$code = $code['code'];
						
						// Send email
						$this->_send_code($user, $code);
						
						// Redirect with success message
						Message::instance()->info(__('You recieved an email with the reset password link'));
						HTTP::redirect('/');
					}
					else
					{
						Message::instance()->error(__('No user with such email'));
					}
				}
				catch(Exception $e)
				{
					throw $e;
				}
			}
			else
			{
				Message::instance()->error(__('No email address provided'));
			}
		}
		
		$this->_view = new View_Authentication_Email();
	}	
	
	
	public function action_resetpassword()
	{
		// Get the code from the url
		$code = $this->request->query('code');
		
		if ( Auth::instance()->is_logged_in() )
		{
			HTTP::redirect('/');
		}	
		
		// Check if code is ok
		if ( $code == null || $code == '' )
		{
			Message::instance()->warning('Reset password code not provided please click on the link you received in the e-mail.');
			HTTP::redirect(Route::url('authentication', array('action' => 'forgotpassword')));
		}
		
		// We have the code, we have to instanciate the users model and get the user id
		$m_users = new Model_Psusers();
		
		$user_id = $m_users->get_pwcode_by(array('code' => $code));

		// Check if we found such thing
		if ( $user_id === false )
		{
			Message::instance()->warning('Invalid code provided');
			HTTP::redirect('/');
		}
		
		$user_id = $user_id['user_id'];
		
		// Load the user by user id
		$m_users->load_by(array('id' => $user_id));
		
		// Create the view and pass the model
		$this->_view = new View_Authentication_Resetpassword($m_users, $code);
		
		// Handle the post where we have the new passsword and password confirmation
		if ( $this->request->method() == Request::POST )
		{
			$post = Security::sanitize($this->request->post());
			
			try
			{
				// We have to add the username and email of the user to the post so it passes validation
				$data = array();
				$data['username'] = $m_users->username;
				$data['email'] = $m_users->email;
				
				$data = array_merge($data, $post);
				
				// Now update the user
				if ( $m_users->validate_data($data) )
				{
					$m_users->update($data, true);
				
					// Password reset was successful, delete the password code
					$m_users->generate_password_code(true);
					
					Message::instance()->info('Password was reset successfully. Please log in with the new password.');
					$this->redirect(Route::url('authentication'));
				}
				else
				{
					$this->_view->fill_data($post);
				}
			}
			catch(Exception $e)
			{
				throw $e;
			}
			
		}
	}	
	
	/**
	 * Send the recovery url with the code for the user
	 *
	 * @param Object User 
	 * @param String Recovery code
	 */
	protected function _send_code($user, $code)
	{
	
		// Create Gearman client
		$client= new GearmanClient();
		$client->addServer('127.0.0.1', 4730);
		
		$email_data = array();
		
		$m_settings = new Model_Settings();
		
		$settings_data = Security::decode($m_settings->load_by(array('name' => 'email_template_recovery_password')));
		
		$url = Route::url('authentication', array('action' => 'resetpassword')).'?code='.$code;

		$template = str_replace('::username::', $user->username, $settings_data->value);
		$template = str_replace('::resetpw_link::', $url, $template);
		
		$email_data['message'] = $template;
		
		$email_data['subject'] = 'Trinity - Password Recovery';
		
		$email_data['email'] = $user->email;
		
		$client->addTaskBackground('EmailMessage', json_encode($email_data));
		
		$result = $client->runTasks();
		
	}	
	
}