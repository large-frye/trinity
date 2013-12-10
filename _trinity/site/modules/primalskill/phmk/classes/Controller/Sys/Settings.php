<?php
/** 
 * PHMK controller for settings
 */
class Controller_Sys_Settings extends Controller_Systemplate
{
	public function action_index()
	{
		$m = new Model_Settings();
		
		$core = new Model_Core();
		
		$settings = $core->get_table_data('settings');
		
		$data = array();
		for ( $i = 0, $max = count($settings); $i < $max; $i++ )
		{
			$data[] = array(
				'id' => $settings[$i]['id'],
				'nice_name' => $settings[$i]['nice_name'],
				'name' => $settings[$i]['name']
			);
		}
		
		$view = View::factory('sys/pslist');
		$view->data = $data;
		$view->title = 'Manage Settings';
		$view->edit_url = Route::url('sys', array('controller' => 'settings', 'action' => 'edit'));
		$view->add_url = Route::url('sys', array('controller' => 'settings', 'action' => 'add'));
		$view->delete_url = Route::url('sys', array('controller' => 'settings', 'action' => 'delete'));
		$view->extra_action = false;
		
		$this->_view->content = $view;
	}
	
	public function action_add()
	{
		$view = View::factory('sys/settings/addedit');
		$view->is_edit = false;
		$view->form_action = Route::url('sys', array('controller' => 'settings', 'action' => 'add'));
		
		if ( $this->request->method() == Request::POST )
		{
			$post = Security::sanitize($this->request->post());
			$m = new Model_Settings();
			
			try
			{
				if ( $m->validate($post) )
				{
					$m->save();
					HTTP::redirect(Route::url('sys', array('controller' => 'settings', 'action' => 'index')));
				}
				else
				{
					$view->errors = $m->return_errors();
					$view->data = (object)$post;
				}
			}
			catch(Database_Exception $db_e)
			{
				$view->top_error = $db_e->getMessage();
			}
		}
		
		$this->_view->content = $view;
	}
	
	public function action_edit()
	{
		$id = $this->request->param('id');
		
		$m = new Model_Settings();
		
		$m->load_by(array('id' => $id));
		
		if ( !$m->is_loaded )
		{
			HTTP::redirect(Route::url('sys', array('controller' => 'settings', 'action' => 'index')));
		}
		
		$view = View::factory('sys/settings/addedit');
		$view->is_edit = true;
		$view->data = $m;
		$view->form_action = Route::url('sys', array('controller' => 'settings', 'action' => 'edit', 'id' => $m->id));
		
		if ( $this->request->method() == Request::POST )
		{
			$post = Security::sanitize($this->request->post());
			
			try
			{
				if ( $m->validate($post) )
				{
					$m->save();
					HTTP::redirect(Route::url('sys', array('controller' => 'settings', 'action' => 'index')));
				}
				else
				{
					$view->errors = $m->return_errors();
					$view->data = (object)$post;
				}
			}
			catch(Database_Exception $db_e)
			{
				$view->top_error = $db_e->getMessage();
			}
		}
		
		$this->_view->content = $view;
	}
	
	public function action_delete()
	{
		$id = $this->request->param('id');
		
		$m = new Model_Settings();
		
		$m->load_by(array('id' => $id));
		
		if ( $m->is_loaded )
		{
			$m->delete();
		}
		
		HTTP::redirect(Route::url('sys', array('controller' => 'settings', 'action' => 'index')));
	}
}