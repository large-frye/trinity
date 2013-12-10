<?php
/**
 * This controller handles the actions belonging to database manipulation
 */
class Controller_Sys_Users extends Controller_Systemplate
{

	public function action_index()
	{
		$view = View::factory('sys/users/list');
		
		$m_users = new Model_Psusers();
		
		$view->users = $m_users->get_users();
		
		$this->_view->content = $view;
	}
	
	public function action_add()
	{
		$view = View::factory('sys/users/single');		
		
		$view->post_url = Route::url('sys', array('controller' => 'users', 'action' => 'add'));
		
		if ( $this->request->method() == Request::POST )
		{
			$post = $this->request->post();
			
			$m_users = new Model_Psusers();			
			
			$err = $m_users->validate_data($post);
			
			if ( $err !== true )
			{
				$view->errors = $m_users->return_errors();
				$view->user = $post;
			}
			else
			{
				$m_users->sign_up();
				HTTP::redirect(Route::url('sys', array('controller' => 'users')));
			}
			
		}		
		
		$this->_view->content = $view;			
	}
	
	public function action_edit()
	{
		$id = $this->request->param('id');
		
		$m_users = new Model_Psusers();

		$user = $m_users->load_by( array('id' => $id) );
		
		if ( !$user )
		{		
			HTTP::redirect(Route::url('sys', array('controller' => 'users')));
		}
		
		$view = View::factory('sys/users/single');
		
		$view->user = $user->return_data();
		
		$view->post_url = Route::url('sys', array('controller' => 'users', 'action' => 'edit', 'id' => $id));
		
		if ( $this->request->method() == Request::POST )
		{
			$post = $this->request->post();
			
			$err = $m_users->validate_data($post);
			
			if ( $err !== true )
			{
				$view->errors = $m_users->return_errors();
				$view->user = $post;
			}
			else
			{
				$m_users->update();
				HTTP::redirect(Route::url('sys', array('controller' => 'users')));
			}
			
		}
		
		$this->_view->content = $view;		
		
	}
	
	public function action_delete()
	{
		$id = $this->request->param('id');
		
		$m_users = new Model_Psusers();

		$user = $m_users->load_by( array('id' => $id) );
		
		if ( $user !== false )
		{		
			$m_users->delete();	
		}

		HTTP::redirect(Route::url('sys', array('controller' => 'users')));	
	}

	public function action_resetpw()
	{
		$id = $this->request->param('id');
		
		$m_users = new Model_Psusers();

		$user = $m_users->load_by( array('id' => $id) );
		
		if ( !$user )
		{		
			HTTP::redirect(Route::url('sys', array('controller' => 'users')));
		}		

		$view = View::factory('sys/users/resetpw');			
		
		$view->user = $user->return_data();
		
		$view->data = array(); 

		
		if ( $this->request->method() === HTTP_Request::POST )
		{
			$post = $this->request->post();
			
			if (isset($post['generate']))
			{
				$view->data['password'] = $m_users->generate_pass();
				
			}
			
			if (isset($post['reset']))
			{
				$err = $m_users->reset_password($post['password']);
				
				if ( $err === true)
				{
					HTTP::redirect(Route::url('sys', array('controller' => 'users')));
				}
				else
				{
					$view->errors = $err;
					$view->data['password'] = $post['password'];
				}
			}
		}		

		
		$this->_view->content = $view;		
	}
}