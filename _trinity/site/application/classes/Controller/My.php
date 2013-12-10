<?php
/**
 * Controller for user related things, like profile
 */
class Controller_My extends Controller_Protected
{
	public function action_index()
	{
		HTTP::redirect(Route::url('default', array('controller' => 'my', 'action' => 'profile')));
	}
	
	public function action_profile()
	{
		$m_user = new Model_Psusers();
		
		$m_user->load_by(array('id' => $this->_user->id));
		$m_profile = new Model_Profile($m_user);
		$m_profile->load();
		
		$view = new View_My_Profile($m_user, $m_profile);
		
		$view->fill_data();
		
		if ( $this->request->method() == Request::POST )
		{
			$post = Security::sanitize($this->request->post());
			
			$post['username'] = $m_user->username;
			
			try
			{
				$user_val = $m_user->validate_data($post);
				$profile_val = $m_profile->validate($post);
				
				if ( $user_val && $profile_val )
				{
					if ( $m_user->update() )
					{	
						$m_profile->save();
						
						Activity_Stream::instance()->template('user-edited-profile', $this->_user->id, null);						
					
						Message::instance()->info('Profile updated successfully');
						
						if ( Valid::not_empty($post['password']) )
						{
							Auth::instance()->logout();
							HTTP::redirect('/login');
						}
						
						$view->fill_data();
					}
					else
					{
						Message::instance()->info('Something went wrong, please try again');
						$view->fill_data($post);
					}
				}
				else
				{
					$view->fill_data($post);
				}
			}
			catch(Database_Exception $db_e)
			{
				Message::instance()->error('Exception: '.$db_e->getMessage());
			}
		}
		
		$this->_view = $view;
	}
}