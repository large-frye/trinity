<?php
/**
 * View model displaying a list with workorders (base class, will be extended)
 */
class View_Workorders_List extends View_Protected_Layout
{
	protected $_template = 'workorders/list';
	
	/**
	 * @var Model_Workorders A core model for getting data
	 */
	protected $_m_workorders = null;
	
	/**
	 * @var array Workorders
	 */
	public $workorders = array();
	
	/**
	 * @var string Add url
	 */
	public $add_url = false;
	
	/**
	 * @var string Edit url
	 */
	public $edit_url = false;
	
	/**
	 * @var string View url
	 */
	public $view_url = false;
	
	/**
	 * @var string The url to the inspection form
	 */
	public $inspection_form_url = false;
	
	/**
	 * @var Auth_User An instance of the logged in user
	 */
	protected $_user = null;
	
	/**
	 * @var array Mapping array holding the workorder statuses
	 */
	protected $work_order_statuses = array();
	
	/**
	 * @var array Mapping array holding inspection statuses
	 */
	protected $inspection_statuses = array();
	
	/**
	 * @var string Used in querying, set by children classes
	 */
	protected $list_type = '';
	
	public $show_add_new = true;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->_user = Auth::instance()->is_logged_in();
		
		$this->_m_workorders = new Model_Workorders();
	
		$this->_init_statuses();
	}
	
	/**
	 * Get and set the data into the variable using pagination and things
	 */
	protected function _fill_data()
	{	
		$workorders = $this->_m_workorders->get_workorders($this->list_type, $this->_user->id);
		
		for ( $i = 0, $max = count($workorders); $i < $max; $i++ )
		{
			$workorders[$i]['status_name'] = $this->work_order_statuses[$workorders[$i]['status']];
			$workorders[$i]['inspection_status_name'] = $this->inspection_statuses[$workorders[$i]['inspection_status']];
			$workorders[$i]['created_on_utc'] = date('m-d-Y', strtotime($workorders[$i]['created_on_utc']));
			$workorders[$i]['date_of_inspection'] = date('m-d-Y', strtotime($workorders[$i]['date_of_inspection']));
		}
		
		$this->workorders = $workorders;
	
	}
	
	/**
	 * Get the statuses and make mapping arrays
	 */
	private function _init_statuses()
	{
		$status = $this->_m_workorders->get_table_data('work_order_statuses');
		
		for ( $i = 0, $max = count($status); $i < $max; $i++ )
		{
			$this->work_order_statuses[$status[$i]['id']] = $status[$i]['name'];
		}
		
		$status = $this->_m_workorders->get_table_data('inspection_statuses');
		
		for ( $i = 0, $max = count($status); $i < $max; $i++ )
		{
			$this->inspection_statuses[$status[$i]['id']] = $status[$i]['name'];
		}
	}
}