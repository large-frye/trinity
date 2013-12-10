<?php

/**
 * Controller for new user registration
 */
class Controller_Signup extends Controller_Public
{
	
	public function action_index()
	{
	}
	
	/**
	 * Sign up action for client usertype
	 */
	public function action_client()
	{
		$this->_view = new View_Registration_Client();
		
		if ( $this->request->method() === HTTP_Request::POST )
		{	
			$post = $this->request->post();
			
			$m_user = new Model_Psusers;
			
			$m_profile = new Model_Profile($m_user);
			
			$user_val = $m_user->validate_data($post);
			$profile_val = $m_profile->validate($post);
			
			if ( $user_val && $profile_val )
			{
				$m_user->sign_up();			
				
				$m_profile->save();
				
				$user_id = $m_user->id;
				
				$m_roles = new Model_Psroles_Role();
				
				$role = $m_roles->load_values_by(array('code' => 'client'));
				
				$m_roles->add_mapping($user_id, array($role[0]['id']));
				
				Message::instance()->info(__('New account created.'));				
				
				$this->_send_confirmation_email($m_user);
				
				Activity_Stream::instance()->template('user-sign-up', $user_id, null);						
				
				HTTP::redirect(Route::url('authentication', array('action' => 'login')));
			}
			else
			{
				Message::instance()->error(__('Something went wrong. Please check the fields again.'));
				$this->_view->errors = array_merge($m_user->return_errors(), $m_profile->return_errors());			
				$this->_view->data = $post;
			}
		}	
	}
	
	protected function _send_confirmation_email($user)
	{
		// Create Gearman client
		$client= new GearmanClient();
		$client->addServer('127.0.0.1', 4730);
		
		$email_data = array();
		
		$m_settings = new Model_Settings();
		
		$settings_data = $m_settings->load_by(array('name' => 'email_template_registration'));
		
		if ( $settings_data === false )
		{
			return false;
		}
		
		$settings_data = Security::decode($settings_data);
		
		$template = str_replace('::username::', $user->username, $settings_data->value);
		
		$email_data['message'] = $template;
		
		$email_data['subject'] = 'Trinity - Sign Up';
		
		$email_data['email'] = $user->email;
		
		$client->addTaskBackground('EmailMessage', json_encode($email_data));
		
		$result = $client->runTasks();
		
	}
}