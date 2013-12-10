<?php

/**
 * Controller for work order submissions
 */
class Controller_Client_Workorder extends Controller_Protected
{
	/**
	 * @var array Variable holding the currently logged in user's data
	 */
//	protected $_user = null;

	public function before()
	{
		parent::before();
		
		// Get the user model. (method has redirection)
//		$this->_user = Auth::instance()->is_logged_in();
		
		if ( $this->_user != false && ! $this->_user->roles->has('client') )
		{
			Message::instance()->error(__('Only clients can submit workorders.'));
			HTTP::redirect($this->_redirect_url);
		}
	}
	
	// Only a placeholder
	public function action_index() 
	{
		$this->_view = new View_Workorders_List_Client();
	}
	
	/**
	 * Action which handles the new work order submissions
	 */
	public function action_submit()
	{
		$this->_view = new View_Workorders_Submit();
		
		//get the work order data from session, and pass for the view
		$this->_view->data =  Session::instance()->get_once('workorder_data');
		
		if ( $this->request->method() === HTTP_Request::POST )
		{	
			$post = $this->request->post();
			
			unset($post['csrf_token']);
			
			$m_workorders = new Model_Workorders;
			
			$err = $m_workorders->check_data($post);
			
			if ( $err === true )
			{
				//if the user is not logged in, the data will saved in session
				if ( $this->_user === false )
				{
					Session::instance()->set('workorder_data', $post);
					Session::instance()->set('redirect_to', Route::url('client', array('controller' => 'workorder', 'action' => 'submit')));			

					HTTP::redirect(Route::url('authentication', array('action' => 'login')));
				}					
			
				$m_workorders->create($this->_user->id);

				$data = $m_workorders->return_data();
				
				Activity_Stream::instance()->template('work-order-submit', $this->_user->id, $data['id']);				
				
				Message::instance()->info(__('Work order sent.'));
				
				HTTP::redirect('/');
			}
			else
			{
				Message::instance()->warning(__('Something went wrong when submitting this Work Order. Please check the fields again.'));
				$this->_view->errors = $err;
				$this->_view->data = $post;
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
			HTTP::redirect('/');
		}		
		
		$work_order = $m_workorders->return_data();
		
		if ( $work_order['user_id'] !== $this->_user->id )
		{
			Message::instance()->error(__('The work order does not exist.'));	
			HTTP::redirect('/');		
		}
		
		$this->_view = new View_Workorders_View_Client($m_workorders);		
		
		if ( $this->request->method() === HTTP_Request::POST )
		{	
			$post = $this->request->post();
			
			$m_messages = new Model_Messages();
			
			$post['work_order_id'] = $id;
			$post['from_id'] = $this->_user->id;
			
			$check_message = $m_messages->check_data($post);
			
			if( $check_message === true )
			{
				$m_messages->save();

				Activity_Stream::instance()->template('wrote-comment', $this->_user->id, $id);						
				
				HTTP::redirect(Route::url('client', array('controller' => 'workorder', 'action' => 'view', 'id' => $id)));
			}
			else
			{
				$this->_view->errors = $check_message;
				$this->_view->load_comments();
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
			$this->redirect('/');
		}			
		
		$work_order = $m_workorders->return_data();
		
		if ( $work_order['user_id'] !== $this->_user->id )
		{
			Message::instance()->error(__('The work order does not exist.'));	
			HTTP::redirect('/');		
		}		

		if ( $work_order['inspection_status'] != 4 )
		{
			Message::instance()->error(__('The work order is not completed.'));	
			HTTP::redirect('/');		
		}				
		
		$this->_view = new View_Workorders_Report( $m_workorders, new Model_Inspection($id) );		
	}	

}