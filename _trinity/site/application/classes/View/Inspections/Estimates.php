<?php
/**
 * View model for handling estmates for an inspection
 */
class View_Inspections_Estimates extends View_Protected_Layout
{
	protected $_template = 'inspections/estimates';
	
	/**
	 * @var array Holds the estimates
	 */
	public $estimates = array();
	
	/**
	 * @var Model_Estimates 
	 */
	private $_m_estimates = null;
	
	public $csrf_token = null;
	
	/**
	 * @var string The url where the post has to go
	 */
	public $post_url = '';
	
	public function __construct(Model_Estimates $m_estimates)
	{
		parent::__construct();
		
		$this->_m_estimates = $m_estimates;
		$this->_m_estimates->load();
		$this->set_data();
		
		$this->_set_urls();
		$this->_set_assets();
		$this->_set_sidebar();
		
		// Pass the token for the form
		$this->csrf_token = Security::CSRF_token();		
	}
	
	private function _set_urls()
	{
		$this->post_url = Route::url('inspector', array('controller' => 'inspections', 'action' => 'estimates', 'id' => $this->_m_estimates->the_workorder_id()));
	}
	
	private function _set_assets()
	{
		Asset::instance()
				->js('admin/multi-row');
	}
	
	/**
	 * Resets data from model to view model
	 */
	public function set_data()
	{
		$this->estimates = $this->_m_estimates->return_estimates();
	}
	
	private function _set_sidebar()
	{
		$this->_partials = array(
			'sidebar' => 'protected/sidebar'
		);
		
		$this->has_sidebar = true;
		$this->sidebar_links[] = array(
			'url' => Route::url('inspector', array('controller' => 'inspections', 'action' => 'index')),
			'name' => 'Work Orders',
			'has_sublinks' => true,
			'current' => true,
			'sub_links' => array(
				array(
					'sub_url' => Route::url('inspector', array('controller' => 'inspections', 'action' => 'view', 'id' => $this->_m_estimates->the_workorder_id())),
					'sub_name' => 'View Work Order'
				),
				array(
					'sub_url' => Route::url('inspector', array('controller' => 'inspections', 'action' => 'form', 'id' => $this->_m_estimates->the_workorder_id())),
					'sub_name' => 'Inspection Form'
				),
				array(
					'sub_url' => Route::url('inspector', array('controller' => 'inspections', 'action' => 'estimates', 'id' => $this->_m_estimates->the_workorder_id())),
					'sub_name' => 'Estimates',
					'sub_current' => true
				)
			)
		);
	}
}