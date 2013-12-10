<?php

/**
 * Controller for admin users
 */
class Controller_Admin_Users extends Controller_Admin
{
	
	/**
	 * Action to list users
	 */
	public function action_index()
	{
		$this->_view = new View_Admin_Users_List(new Model_Admin_Users);
	}

	/**
	 * Action which handle the new user creation process
	 */
	public function action_create()
	{
		$m_roles = Model_Psroles::factory();
		
		$m_users = new Model_Psusers();
		$m_profile = new Model_Profile($m_users);
		
		$this->_view = new View_Admin_Users_Single($m_roles);
		
		if ( $this->request->method() == Request::POST )
		{
			$post = $this->request->post();
			
			$user_val = $m_users->validate_data($post);
			$profile_val = $m_profile->validate($post);
			
			if ( $user_val && $profile_val )
			{
				if ($m_users->sign_up())
				{
					$m_profile->save();
					
					$m_roles->add_mapping( $m_users->id, array(Security::sanitize($post['role_id'])) );
					
					$this->_send_confirmation_email($m_users, $post['password']);
					
					Message::instance()->info(__('User created.'));		
					Activity_Stream::instance()->template('admin-created-user', $this->_user->id);
					HTTP::redirect(Route::url('admin', array('controller' => 'users')));				
				}
			}
			else
			{
				Message::instance()->error(__('Error occured. Please check the fields.'));					
				$this->_view->errors = array_merge($m_users->return_errors(), $m_profile->return_errors());
				$this->_view->repopulate_data($post);
			}
			
		}
	}
	
	/**
	 * Action which handle the edit user process
	 */
	public function action_edit()
	{

		$id = Security::sanitize($this->request->param('id'));
		
		$m_users = new Model_Psusers();

		$m_roles = Model_Psroles::factory();
		
		$user = $m_users->load_by( array('id' => $id) );
		
		if ( $user->is_loaded === false )
		{
			Message::instance()->error(__('This user doesn\'t exists.'));	
			HTTP::redirect(Route::url('admin', array('controller' => 'users')));		
		}
		
		$m_profile = new Model_Profile($m_users);
		$m_profile->load();
		
		$this->_view = new View_Admin_Users_Single($m_roles, $m_users, $m_profile, true);		
		
		if ( $this->request->method() == Request::POST )
		{
			$post = $this->request->post();
			
			$user_val = $m_users->validate_data($post);
			$profile_val = $m_profile->validate($post);
			
			if ( $user_val && $profile_val )
			{
				if ($m_users->update())
				{
					$m_profile->save(); 
					
					$m_roles->add_mapping( $m_users->id, array(Security::sanitize($post['role_id'])) );
					Message::instance()->info(__('User edited.'));		
					Activity_Stream::instance()->template('admin-edited-user', $this->_user->id);
					HTTP::redirect(Route::url('admin', array('controller' => 'users')));				
				}
			}
			else
			{
				Message::instance()->error(__('Error occured. Please check the fields.'));					
				$this->_view->errors = array_merge($m_users->return_errors(), $m_profile->return_errors());
				$this->_view->repopulate_data($post);
			}
			
		}		
	}	
	
	/**
	 * Action for user soft delete 
	 */
	public function action_softdelete()
	{
		$id = Security::sanitize($this->request->param('id'));
		
		$m_users = new Model_Psusers();
		
		$user = $m_users->load_by( array('id' => $id) );
		
		if ( $user->is_loaded === false )
		{
			Message::instance()->error(__('This user doesn\'t exists.'));	
			HTTP::redirect(Route::url('admin', array('controller' => 'users')));		
		}
		
		$m_users->delete();
		Message::instance()->info(__('User soft deleted.'));		
		Activity_Stream::instance()->template('admin-soft-deleted-user', $this->_user->id);
		HTTP::redirect(Route::url('admin', array('controller' => 'users')));				
	}
	
	/**
	 * Action for user hard delete 
	 */
	public function action_delete()
	{
		$id = Security::sanitize($this->request->param('id'));
		
		$m_psusers = new Model_Psusers();
		
		$m_users = new Model_Admin_Users();
		
		$user = $m_psusers->load_by( array('id' => $id) );
		
		if ( $user->is_loaded === false )
		{
			Message::instance()->error(__('This user doesn\'t exists.'));	
			HTTP::redirect(Route::url('admin', array('controller' => 'users')));		
		}
		
		$m_profile = new Model_Profile($user);
		
		if ( $m_users->check_users_connections($id) )
		{
			$m_psusers->erase();
			
			$m_profile->load();
			$m_profile->delete();
			
			Message::instance()->info(__('User deleted.'));		
			Activity_Stream::instance()->template('admin-deleted-user', $this->_user->id);
			HTTP::redirect(Route::url('admin', array('controller' => 'users')));			
		}
		else
		{
			Message::instance()->error(__('User cannot be deleted. Is linked to a workorder as a client or as an inspector.'));		
			HTTP::redirect(Route::url('admin', array('controller' => 'users')));					
		}
	}	
	
	protected function _send_confirmation_email($user, $password)
	{
		// Create Gearman client
		$client= new GearmanClient();
		$client->addServer('127.0.0.1', 4730);
		
		$email_data = array();
		
		$m_settings = new Model_Settings();
		
		$settings_data = $m_settings->load_by(array('name' => 'email_template_createuser'));
		
		if ( $settings_data === false )
		{
			return false;
		}
		
		$settings_data = Security::decode($settings_data);
		
		$template = str_replace('::username::', $user->username, $settings_data->value);
		$template = str_replace('::password::', $password, $template);
		
		$email_data['message'] = $template;
		
		$email_data['subject'] = 'Trinity - Sign Up';
		
		$email_data['email'] = $user->email;
		
		$client->addTaskBackground('EmailMessage', json_encode($email_data));
		
		$result = $client->runTasks();
		
	}
}
	