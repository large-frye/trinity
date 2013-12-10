<?php
/**
 * PHMK controller for role handling
 */
class Controller_Sys_Roles extends Controller_Systemplate
{
	public function action_index()
	{
		$view = View::factory('sys/pslist');
		
		$m_roles = Auth::Psroles();
		
		$view->title = 'Manage Roles';
		$view->data = $m_roles->load_values_by(array());
		$view->edit_url = Route::url('sys', array('controller' => 'roles', 'action' => 'edit'));
		$view->delete_url = Route::url('sys', array('controller' => 'roles', 'action' => 'delete'));
		$view->add_url = Route::url('sys', array('controller' => 'roles', 'action' => 'add'));
		$view->extra_action = true;
		$view->custom_action_url = Route::url('sys', array('controller' => 'roles', 'action' => 'permissions'));
		$view->custom_action_label = __('Manage permissions');
		
		$this->_view->content = $view;
	}
	
	public function action_add()
	{
		$view = View::factory('sys/psroles/roles');
		$view->form_action = Route::url('sys', array('controller' => 'roles', 'action' => 'add'));
		$view->is_edit = false;
		
		if ( $this->request->method() == Request::POST )
		{
			$m_roles = Auth::Psroles();
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
				HTTP::redirect(Route::url('sys', array('controller' => 'Roles')));
			}
		}
		
		$this->_view->content = $view;
	}
	
	public function action_delete()
	{
		$id = $this->request->param('id');
		
		$m_roles = Auth::Psroles();
		
		$role = $m_roles->load_values_by(array('id' => $id));
		
		if ( empty($role) )
		{
			HTTP::redirect(Route::url('sys', array('controller' => 'Roles')));
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
			HTTP::redirect(Route::url('sys', array('controller' => 'roles')));
		}
		else
		{
			$error = $m_roles->return_errors();
			$error = reset($error);
			$this->_view->content .= '<br>'.$error;
		}
	}
	
	public function action_edit()
	{
		$id = $this->request->param('id');
		
		$m_roles = Auth::Psroles();
		
		$role = $m_roles->load_values_by(array('id' => $id));
		
		if ( empty($role) )
		{
			HTTP::redirect(Route::url('sys', array('controller' => 'Roles')));
		}
		
		$view = View::factory('sys/psroles/roles');
		
		$view->data = $role[0];
		$view->form_action = Route::url('sys', array('controller' => 'roles', 'action' => 'edit', 'id' => $id));
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
				HTTP::redirect(Route::url('sys', array('controller' => 'Roles')));
			}
		}
		
		$this->_view->content = $view;
	}
	
	public function action_permissions()
	{
		$id = $this->request->param('id');
		
		$m_roles = Auth::Psroles();
		
		$role = $m_roles->load_values_by(array('id' => $id));
		
		if ( empty($role) )
		{
			HTTP::redirect(Route::url('sys', array('controller' => 'Roles')));
		}
		
		$role = $role[0];
		
		$view = View::factory('sys/psroles/mapping');
		$view->form_action = Route::url('sys', array('controller' => 'roles', 'action' => 'permissions', 'id' => $id));
		$view->title = 'Select the permissions for this role';
		$view->item_name = $role['name'];
		$view->display_column = 'variable';
		
		$m_permission = Model_Psroles::factory(Model_Psroles::DRIVER_PERMISSION);
		$view->all_data = $m_permission->load_values_by(array());
		
		$self_permissions = $m_roles->load_mapping($id, 'roles_permissions');
		$self_ids = array();
		
		for ( $i = 0, $max = count($self_permissions); $i < $max; $i++ )
		{
			$self_ids[] = $self_permissions[$i]['permission_id'];
		}
		
		$view->self_data = $self_ids;
		
		if ( $this->request->method() == Request::POST )
		{
			$post = Security::sanitize($this->request->post());
			
			$success = false;
			$ids = array();
			if ( isset($post['ids']) && is_array($post['ids']) )
			{
				$ids = $post['ids'];
			}
			
			try
			{
				$m_roles->add_mapping($id, $ids, 'roles_permissions');
				$success = true;
			}
			catch(Database_Exception $e)
			{
				$view->error = array('exception' => $e->getMessage());
			}
			
			if ( $success )
			{
				HTTP::redirect(Route::url('sys', array('controller' => 'Roles')));
			}
		}
		
		
		$this->_view->content = $view;
	}
	
	public function action_users()
	{
		$id = $this->request->param('id');
		
		$m_roles = Auth::Psroles();
		$m_user = Auth::Psroles(Model_Psroles::DRIVER_USER);
		
		$user = $m_user->load_values_by(array('id' => $id));
	
		if ( empty($user) )
		{
			HTTP::redirect(Route::url('sys', array('controller' => 'users')));
		}
		
		$user = $user[0];
		
		$view = View::factory('sys/psroles/mapping');
		$view->form_action = Route::url('sys', array('controller' => 'roles', 'action' => 'users', 'id' => $id));
		$view->title = 'Select the permissions for this user';
		$view->item_name = $user['username'];
		$view->display_column = 'name';
		
		$view->all_data = $m_roles->load_values_by(array());
		
		$self_roles = $m_roles->load_mapping($id, 'roles_users');
		$self_ids = array();
		
		for ( $i = 0, $max = count($self_roles); $i < $max; $i++ )
		{
			$self_ids[] = $self_roles[$i]['role_id'];
		}
		
		$view->self_data = $self_ids;
		
		if ( $this->request->method() == Request::POST )
		{
			$post = Security::sanitize($this->request->post());
			
			$success = false;
			$ids = array();
			if ( isset($post['ids']) && is_array($post['ids']) )
			{
				$ids = $post['ids'];
			}
			
			try
			{
				$m_roles->add_mapping($id, $ids, 'roles_users');
				$success = true;
			}
			catch(Database_Exception $e)
			{
				$view->error = array('exception' => $e->getMessage());
			}
			
			if ( $success )
			{
				HTTP::redirect(Route::url('sys', array('controller' => 'users')));
			}
		}
		
		
		$this->_view->content = $view;
	}
}