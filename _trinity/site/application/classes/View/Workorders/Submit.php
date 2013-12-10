<?php

class View_Workorders_Submit extends View_Protected_Layout
{
	protected $_template = 'workorders/submit';
	
	/**
	 * @var string Form token for CSRF attacks
	 */
	public $csrf_token = null;
	
	/**
	 * Array Holds the array with form validation errors 
	 */
	public $errors = null;
	
	public $data = null;
	
	public $post_url = '';
	public $login_url = '';
	
	public $is_admin = false;
	
	public $clients = null;
	
	public $types = array
	(
		array
		(
			'code'=> 0, 
			'name' => 'Basic Inspections',
			'selected' => ''
		),
		
		array
		(
			'code'=> 1, 
			'name' => 'Expert Inspections',
			'selected' => ''
		),
		
		array
		(
			'code'=> 2, 
			'name' => 'Engineer Reports',
			'selected' => ''
		)
	);
							
	public $is_edit = null;						
	
	protected $_m_workorders = null;
	

	public function __construct($is_admin = false, $is_edit = false, $m_workorders = null)
	{		
		parent::__construct();
		
		$this->is_admin = $is_admin;
		$this->is_edit = $is_edit;
		$this->_m_workorders = $m_workorders;
		
		$this->_set_links();
		$this->_set_variables();
		$this->_set_sidebar();
		
		if ($this->is_admin)
		{
			$this->_get_clients();
		}
		
		if ($this->is_edit)
		{
			$this->_load_data();
		}
	}
	
	/**
	 * Set links
	 */
	private function _set_links()
	{
		if ($this->is_admin)
		{
			if ($this->is_edit)
			{
				$this->post_url = Route::url('admin', array('controller' => 'workorders', 'action' => 'edit'));
			}
			else
			{
				$this->post_url = Route::url('admin', array('controller' => 'workorders', 'action' => 'submit'));
			}
		}
		else
		{
			$this->post_url = Route::url('default', array('controller' => 'workorder', 'action' => 'submit'));
		}
	}
	
	/**
	 * Set variables
	 */
	private function _set_variables()
	{
		// Pass the token for the form
		$this->csrf_token = Security::CSRF_token();
	}		
	
	/**
	 * Format and return the inspection types
	 */
	public function inspection_types()
	{
		$type = Request::current()->query('type');
		
		for ($i=0, $mi=count($this->types); $i<$mi; $i++)
		{
			if ( isset($this->data['type']) )
			{
				if ( $this->data['type'] == $this->types[$i]['code'] )
				{
					$this->types[$i]['selected'] = true;
				}	
			}
			else
			{
				if ( intval($type) == $this->types[$i]['code'] )
				{
					$this->types[$i]['selected'] = true;
				}	
			}
		}
		
		return $this->types;
	}
	
	/**
	 * Populate the client users ( only for admins )
	 */
	protected function _get_clients()
	{
		$m_users = new Model_Admin_Users;
		
		$this->clients = $m_users->get_by_role(4);
		
	}
	
	protected function _load_data()
	{
		$this->data = $this->_m_workorders->return_data();
		$this->data['date_of_loss'] = date('m-d-Y', strtotime($this->data['date_of_loss']));
		
		$this->repopulate_data();
	}
	
	
	/**
	 * Repopulate data after validation error
	 */
	public function repopulate_data()
	{
		if ( isset($this->data['user_id']) )
		{
			for ($i=0, $mi=count($this->clients); $i<$mi; $i++)
			{
				if ( $this->clients[$i]['id'] == $this->data['user_id'] )
				{
					$this->clients[$i]['selected'] = true;
				}
			}
		}	
	}
	
	public function selected_tarped()
	{
		if ( isset($this->data['tarped']) && $this->data['tarped'] == 1 )
		{
			return true;
		}

		return false;	
	}

	public function checked_is_expert()
	{
		if ( isset($this->data['is_expert']) && $this->data['is_expert'] )
		{
			return true;
		}
		
		return false;
	}
	
	private function _set_sidebar()
	{
		$this->_partials = array(
			'sidebar' => 'protected/sidebar'
		);
		
		if ( $this->is_admin )
		{
			$route = 'admin';
			$controller = 'workorders';
		}
		else
		{
			$route = 'client';
			$controller = 'workorder';
		}
		
		$this->has_sidebar = true;
		$this->sidebar_links[] = array(
			'url' => Route::url($route, array('controller' => $controller, 'action' => 'index')),
			'name' => 'Inspection Orders',
			'has_sublinks' => true,
			'current' => true,
			'sub_links' => array(
				array(
					'sub_url' => Route::url($route, array('controller' => $controller, 'action' => 'submit')),
					'sub_name' => 'Submit New Inspction',
					'sub_current' => true
				)
			)
		);
	}
	
}