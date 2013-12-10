<?php
/**
 * Trinity controller for admin settings
 */
class Controller_Admin_Settings extends Controller_Admin
{
	public function action_index()
	{
		$view = new View_Admin_Settings();
		
		if ( $this->request->method() == Request::POST )
		{
			$post = Security::sanitize($this->request->post());
			
			$m_settings = new Model_Admin_Settings();
			
			$redirect = false;
			try
			{
				if ( $m_settings->set_validation('general', $post) )
				{
					if ( $m_settings->save_data() )
					{
						Message::instance()->info('Settings saved successfully');
						Activity_Stream::instance()->template('admin-edited-settings', $this->_user->id);
						$redirect = true;
					}
					else
					{
						Message::instance()->warning('The settings were not saved, please try again');
						$redirect = true;
					}
				}
				else
				{
					$errors = $m_settings->return_errors();
					$view->pass_data($post, $errors);
				}
			}
			catch(Database_Exception $db_e)
			{
				Message::instance()->error('Error saving settings: '.$e->getMessage());
				$redirect = true;
			}
			
			if ( $redirect )
			{
				HTTP::redirect(Route::url('admin', array('controller' => 'settings')));
			}
		}
		
		$this->_view = $view;
	}
	
	public function action_email()
	{
		$view = new View_Admin_Settings_Email();
		
		if ( $this->request->method() == Request::POST )
		{
			$post = Security::sanitize($this->request->post());
			
			$m_settings = new Model_Admin_Settings();
			$redirect = false;
			
			try
			{
				if ( $m_settings->set_validation('email_template', $post) )
				{
					if ( $m_settings->save_data() )
					{
						Message::instance()->info('Settings saved successfully');
						Activity_Stream::instance()->template('admin-edited-settings', $this->_user->id);
						$redirect = true;
					}
					else
					{
						Message::instance()->warning('The settings were not saved, please try again');
						$redirect = true;
					}
				}
				else
				{
					$errors = $m_settings->return_errors();
					$view->pass_data($post, $errors);
				}
			}
			catch(Database_Exception $db_e)
			{
				Message::instance()->error('Error saving settings: '.$e->getMessage());
				$redirect = true;
			}
			
			if ( $redirect )
			{
				HTTP::redirect(Route::url('admin', array('controller' => 'settings', 'action' => 'email')));
			}
		}
		
		$this->_view = $view;
	}
	
	public function action_prices()
	{
		$m_prices = new Model_Admin_Prices();
		$view = new View_Admin_Prices($m_prices);
		
		$view->fill_data();
		
		if ( $this->request->method() == Request::POST )
		{
			$post = Security::sanitize($this->request->post());
			$redirect = false;
			try
			{
				if ( $m_prices->validate($post) )
				{
					$m_prices->save();
					Message::instance()->info('Prices saved successfully');
					Activity_Stream::instance()->template('admin-edited-settings', $this->_user->id);
					$redirect = true;
				}
				else
				{
					$view->fill_data($post);
				}
			}
			catch(Database_Exception $db_e)
			{
				Message::instance()->error('Exception: '.$db_e->getMessage());
				$redirect = true;
			}
			
			if ( $redirect )
			{
				HTTP::redirect(Route::url('admin', array('controller' => 'settings', 'action' => 'prices')));
			}
		}
		
		$this->_view = $view;
	}
}