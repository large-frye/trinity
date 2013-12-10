<?php
/**
 * Child class of View_Workorders_List
 */
class View_Workorders_List_Inspector extends View_Workorders_List
{
	/**
	 * @var string The url to the estimates
	 */

	public $estimates_url = null;
	public $photos_url = null;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->_set_links();
		
		$this->list_type = 'inspector';
		$this->_fill_data();
		
		$this->show_add_new = false;
	}
	
	private function _set_links()
	{
		$this->view_url = Route::url('inspector', array('controller' => 'inspections', 'action' => 'view'));
		$this->inspection_form_url = Route::url('inspector', array('controller' => 'inspections', 'action' => 'form'));
		$this->estimates_url = Route::url('inspector', array('controller' => 'inspections', 'action' => 'estimates'));
		
		$this->photos_url = Route::url('inspector', array(
			'controller' => 'inspections',
			'action' => 'viewphotos'
	));
		
		
	}
	
	private function _set_sidebar()
	{
/*		$this->_partials = array(
			'sidebar' => 'protected/sidebar'
		);
		
		$this->has_sidebar = true;
		$this->sidebar_links[] = array(
			'url' => Route::url('inspector', array('controller' => 'inspections', 'action' => 'index')),
			'name' => 'Inspection Orders',
			'has_sublinks' => false
		);*/
	}
}