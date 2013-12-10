<?php
/**
 * PHMK controller for managing permissions
 */
class Controller_Sys_Permissions extends Controller_Systemplate
{
	public function action_index()
	{
		$view = View::factory('sys/pslist');
		
		$m_roles = Model_Psroles::factory(Model_Psroles::DRIVER_PERMISSION);
		
		$view->title = 'Manage Permissions';
		$view->data = $m_roles->load_values_by(array());
		$view->edit_url = Route::url('sys', array('controller' => 'permissions', 'action' => 'edit'));
		$view->delete_url = Route::url('sys', array('controller' => 'permissions', 'action' => 'delete'));
		$view->add_url = Route::url('sys', array('controller' => 'permissions', 'action' => 'add'));
		$view->extra_action = false;
		
		$this->_view->content = $view;
	}
	
	public function action_add()
	{
		$view = View::factory('sys/psroles/permissions');
		$view->form_action = Route::url('sys', array('controller' => 'permissions', 'action' => 'add'));
		$view->is_edit = false;
		
		if ( $this->request->method() == Request::POST )
		{
			$m_roles = Model_Psroles::factory(Model_Psroles::DRIVER_PERMISSION);
			$success = false;
			
			try
			{
				if ( $m_roles->validate($this->request->post()) )
				{
					$m_roles->save();
					$success = true;
				}
				else
				{
					$view->error = $m_roles->return_errors();
					$view->data = $this->request->post();
				}
			}
			catch(Database_Exception $e)
			{
				$view->error = array('exception' => $e->getMessage());
			}
			
			if ( $success )
			{
				HTTP::redirect(Route::url('sys', array('controller' => 'permissions')));
			}
		}
		
		$this->_view->content = $view;
	}
	
	public function action_edit()
	{
		$id = $this->request->param('id');
		
		$m_roles = Model_Psroles::factory(Model_Psroles::DRIVER_PERMISSION);
		
		$role = $m_roles->load_values_by(array('id' => $id));
		
		if ( empty($role) )
		{
			HTTP::redirect(Route::url('sys', array('controller' => 'permissions')));
		}
		
		$view = View::factory('sys/psroles/permissions');
		
		$view->data = $role[0];
		$view->form_action = Route::url('sys', array('controller' => 'permissions', 'action' => 'edit', 'id' => $id));
		$view->is_edit = true;
		
		if ( $this->request->method() == Request::POST )
		{
			$success = false;
			
			try
			{
				if ( $m_roles->validate($this->request->post()) )
				{
					$m_roles->save();
					$success = true;
				}
				else
				{
					$view->error = $m_roles->return_errors();
					$view->data = $this->request->post();
				}
			}
			catch(Database_Exception $e)
			{
				$view->error = array('exception' => $e->getMessage());
			}
			
			if ( $success )
			{
				HTTP::redirect(Route::url('sys', array('controller' => 'permissions')));
			}
		}
		
		$this->_view->content = $view;
	}
	
	public function action_delete()
	{
		$id = $this->request->param('id');
		
		$m_roles = Model_Psroles::factory(Model_Psroles::DRIVER_PERMISSION);
		
		$role = $m_roles->load_values_by(array('id' => $id));
		
		if ( empty($role) )
		{
			HTTP::redirect(Route::url('sys', array('controller' => 'permissions')));
		}
		
		$success = false;
		try
		{
			$success = $m_roles->delete();
		}
		catch(Database_Exception $e)
		{
			$this->_view->content = $e->getMessage();
		}
		
		if ( $success )
		{
			HTTP::redirect(Route::url('sys', array('controller' => 'permissions')));
		}
		else
		{
			$error = $m_roles->return_errors();
			$error = reset($error);
			$this->_view->content .= '<br>'.$error;
		}
	}
}