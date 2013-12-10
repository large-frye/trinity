<?php
/**
 * Trinity controller for admin settings
 */
class Controller_Admin_Workorders extends Controller_Admin
{

	// Displays a list with all workorders
	public function action_index() 
	{
		$this->_view = new View_Workorders_List_Admin();
	}

	/**
	 * Action which handles the new work order submissions for admins
	 */
	public function action_submit()
	{
	
		$this->_view = new View_Workorders_Submit(true);

		if ( $this->request->method() === HTTP_Request::POST )
		{	
			$post = $this->request->post();
	
			$m_workorders = new Model_Workorders;
			
			$check = $m_workorders->check_data($post);
			
			if ( $check === true )
			{
				$m_workorders->create($post['user_id']);
				
				$data = $m_workorders->return_data();
				
				Activity_Stream::instance()->template('work-order-submit', $this->_user->id, $data['id']);
				
				Message::instance()->info(__('Work order created.'));
				
				HTTP::redirect(Route::url('admin', array('controller' => 'workorders')));
			}
			else
			{
				Message::instance()->warning(__('Something went wrong when submitting this Work Order. Please check the fields again.'));
				$this->_view->errors = $check;
				$this->_view->data = $post;
				$this->_view->repopulate_data();				
			}			
		}
	}
	
	public function action_view()
	{
		$id = Security::sanitize($this->request->param('id'));
		
		$m_workorders = new Model_Workorders();

		if (! $m_workorders->load_by( array('id' => $id) ) )
		{
			Message::instance()->error(__('The work order does not exist.'));	
			$this->redirect('/');
		}		
		
		$this->_view = new View_Workorders_View_Admin($m_workorders);		

		if ( $this->request->method() === HTTP_Request::POST )
		{	
			$post = $this->request->post();		
			
			// CSRF attack?
			if ( (! isset($post['csrf_token'])) || ( ! Security::CSRF_valid( Security::sanitize($post['csrf_token'])) ) )
			{
				Message::instance()->warning(__('The form has expired. Try refreshing the page and sign in again.'));
			
				return false;
			}				
			
			//if work order status save request exists in the POST
			if ( isset($post['set_status']) )
			{
				$check = $m_workorders->check_status($post);		
				
				if ( $check === true )
				{
					$m_workorders->save_status();
					Message::instance()->info(__('Work order status saved.'));						
					HTTP::redirect(Route::url('admin', array('controller' => 'workorders', 'action' => 'view', 'id' => $id)));					
				}
				else
				{
					Message::instance()->error(__('Something went wrong. Please check the fields again.'));					
					$this->_view->errors = $check;
					$this->_view->repopulate_status_form($post);
				}
			}
			
			if ( isset($post['set_inspection_status']) )
			{
				$check = $m_workorders->check_inspection_status($post);		
				
				if ( $check === true )
				{
					$m_workorders->save_inspection_status();
					Message::instance()->info(__('Inspection status saved.'));						
					HTTP::redirect(Route::url('admin', array('controller' => 'workorders', 'action' => 'view', 'id' => $id)));					
				}
				else
				{
					Message::instance()->error(__('Something went wrong. Please check the fields again.'));					
					$this->_view->errors = $check;
					$this->_view->repopulate_inspection_status_form($post);
				}
			}			
			
			//only comment message in POST
			if ( isset($post['only_comment']) )
			{
				$m_messages = new Model_Messages();
				
				$post['work_order_id'] = $id;
				$post['from_id'] = $this->_user->id;
				
				$check_message = $m_messages->check_data($post);
				
				if( $check_message === true )
				{
					$m_messages->save();

					Activity_Stream::instance()->template('wrote-comment', $this->_user->id, $id);						
					
					HTTP::redirect(Route::url('admin', array('controller' => 'workorders', 'action' => 'view', 'id' => $id)));							
				}
				else
				{
					Message::instance()->error(__('Something went wrong. Please check the fields again.'));	
					$this->_view->errors = $check_message;
					$this->_view->load_comments();
				}
			}
		}			
	}
	
	/**
	 * Action which handles the new work order edit for admins
	 */
	public function action_edit()
	{
		$id = Security::sanitize($this->request->param('id'));		
		
		$m_workorders = new Model_Workorders();		
		
		if (! $m_workorders->load_by( array('id' => $id) ) )
		{
			Message::instance()->error(__('The work order does not exist.'));	
			$this->redirect('/');
		}			

		$this->_view = new View_Workorders_Submit(true, true, $m_workorders);
		
		if ( $this->request->method() === HTTP_Request::POST )
		{	
			$post = $this->request->post();
		
			$check = $m_workorders->check_data($post);
			
			if ( $check === true )
			{
				$m_workorders->edit();
				
				Message::instance()->info(__('Work order edited.'));
				
				Activity_Stream::instance()->template('admin-work-order-edited', $this->_user->id, $id);				
				
				HTTP::redirect(Route::url('admin', array('controller' => 'workorders')));
			}
			else
			{
				Message::instance()->warning(__('Something went wrong when editing this Work Order. Please check the fields again.'));
				$this->_view->errors = $check;
				
				foreach($post as $key => $value)
				{
					$this->_view->data[$key] = $value;
				}
				
				$this->_view->repopulate_data();				
			}				
			
		}
		
	}	
	
	public function action_report()
	{
		$id = Security::sanitize($this->request->param('id'));		
		
		$m_workorders = new Model_Workorders();		
		
		if (! $m_workorders->load_by( array('id' => $id) ) )
		{
			Message::instance()->error(__('The work order does not exist.'));	
			HTTP::redirect('/');
		}			
		
		$work_order = $m_workorders->return_data();

		if ( $work_order['inspection_status'] != 4 )
		{
			Message::instance()->error(__('The work order is not completed.'));	
			HTTP::redirect(Route::url('admin', array('controller' => 'workorders')));			
		}				

		$this->_view = new View_Workorders_Report_Admin( $m_workorders, new Model_Inspection($id) );		
	}
	
	public function action_generate()
	{
		set_time_limit(0);
	
		$id = Security::sanitize($this->request->param('id'));		
		
		$m_workorders = new Model_Workorders();		
		
		if (! $m_workorders->load_by( array('id' => $id) ) )
		{
			Message::instance()->error(__('The work order does not exist.'));	
			$this->redirect('/');
		}			
		
		// Create Gearman client
		$client= new GearmanClient();
		$client->addServer('127.0.0.1', 4730);
		
		$data = array();
		$data['id'] = $id;
		
		$client->addTaskBackground('GeneratePDF', json_encode($data));
		
		$m_workorders->save_generated_pdf(0, 'generating', null);		
		
		$result = $client->runTasks();	

		Message::instance()->info(__('PDF Report generation in progress. This may take a few moments. Try to refresh the page to know when will be done.'));			
		HTTP::redirect( Route::url('admin', array('controller' => 'workorders', 'action' => 'report', 'id' => $id) ) );
	}
	
	public function action_sendreport()
	{
		$id = Security::sanitize($this->request->param('id'));		
		
		$m_workorders = new Model_Workorders();		
		
		if (! $m_workorders->load_by( array('id' => $id) ) )
		{
			Message::instance()->error(__('The work order does not exist.'));	
			$this->redirect('/');
		}				

		$work_order = $m_workorders->return_data();

		if ( $work_order['is_generated_pdf'] != 1 )
		{
			Message::instance()->error(__('Report doean`t exists.'));	
			HTTP::redirect(Route::url('admin', array('controller' => 'workorders')));			
		}	
		
		if ($m_workorders->_send_report())
		{
			Message::instance()->info(__('PDF Report sent.'));			
		}
		else
		{
			Message::instance()->error(__('Error Ocured.PDF Report not sent.'));				
		}
		
		HTTP::redirect( Route::url('admin', array('controller' => 'workorders', 'action' => 'report', 'id' => $id) ) );
	}
	
	
}