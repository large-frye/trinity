<?php

class View_Workorders_View extends View_Protected_Layout
{
	protected $_template = 'workorders/view';

	/**
	 * @var Array The Workorder data
	 */	
	public $data = null;

	/**
	 * @var Object Model Workorders
	 */		
	protected $_m_workorders = null;
	
	/**
	 * @var Array Errors
	 */	
	public $errors = null;
	
	/**
	 * @var String Form POST Url
	 */
	public $post_url = null;
	
	/*
	 * @var Bool Mustache variables
	 */
	public $show_general_status = false;
	
	public $show_inspection_status = false;


	public function __construct()
	{		
		parent::__construct();	
		
		$this->_load_data();
	
		$this->_set_variables();	
		
		$this->load_comments();
		
		Asset::instance()
				->js('workorders/alert');
	}
	
	/**
	 * Load the data
	 */
	protected function _load_data()
	{
		$this->data = $this->_m_workorders->return_data();
		
		if ( isset($this->data['date_of_inspection']) )
		{
			$this->data['date_of_inspection'] = date('m-d-Y', strtotime($this->data['date_of_inspection']));
		}

		$this->data['created_on_utc'] = date('m-d-Y  /   H:i', strtotime($this->data['created_on_utc']));
		$this->data['date_of_loss'] = date('m-d-Y', strtotime($this->data['date_of_loss']));
	
	}

	/**
	 * Set variables
	 */
	protected function _set_variables()
	{
		$this->csrf_token = Security::CSRF_token();
	}
	
	/**
	 * Loading comments into comments section
	 */
	public function load_comments()
	{
		$m_messages = new Model_Messages();
		
		$messages = $m_messages->get( array('work_order_id' => $this->data['id']) );
	
		$v_comments = new View_Workorders_Comments($messages, $this->errors, $this->post_url);
		
		$this->v_comments = $this->_render_comments($v_comments);
	}
	
	/**
     * Rendering a View Object
	 *
	 * @param Object View
	 * @return String The rendered view
	 */
	protected function _render_comments($comments)
	{
		$engine = new Primalskill_Mustache_Engine( $comments );

		return $engine->render();
	}	
	
	/**
	 * Return Tarped value for mustache template
	 */
	public function tarped()
	{
		if ( isset($this->data['tarped']) )
		{
			if ( $this->data['tarped'] == 1 )
			{
				return 'Yes';
			}
			else
			{
				return 'No';
			}
		}
	}
	
	
	public function hours()
	{
		for ($i=0; $i < 24; $i++)
		{
			$this->hours[$i]['hour'] = ($i<10) ? '0'.$i :$i;
			
			if ( isset($this->data['time_of_inspection']) )
			{
				$hour = explode(':',$this->data['time_of_inspection']);
				
				if ($hour[0] == $i)
				{
					$this->hours[$i]['selected'] = true;
				}
			}
		}

		return $this->hours;
	}
	
	public function mins()
	{
		for ($i=0; $i < 60; $i++)
		{
			$this->mins[$i]['min'] = ($i<10) ? '0'.$i :$i;
			
			if ( isset($this->data['time_of_inspection']) )
			{
				$min = explode(':',$this->data['time_of_inspection']);
				
				if ($min[1] == $i)
				{
					$this->mins[$i]['selected'] = true;
				}
			}			
		}
		
		return $this->mins;		
	}
}