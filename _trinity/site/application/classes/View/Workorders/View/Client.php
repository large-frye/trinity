<?php
/**
 * Extends View_Workorders_View
 */
class View_Workorders_View_Client extends View_Workorders_View
{
	public function __construct($m_workorders = null)
	{
		$this->_m_workorders = $m_workorders;
		
		parent::__construct();
		
		$this->_set_links();
		$this->_set_sidebar();
	}
	
	private function _set_links()
	{
		$this->post_url = Route::url('client', array('controller' => 'workorder', 'action' => 'view', 'id' => $this->data['id']));
	}
	
	private function _set_sidebar()
	{
		$this->_partials = array(
			'sidebar' => 'protected/sidebar'
		);
		
		$this->has_sidebar = true;
		$this->sidebar_links[] = array(
			'url' => Route::url('client', array('controller' => 'workorder', 'action' => 'index')),
			'name' => 'Inspection Orders',
			'has_sublinks' => true,
			'current' => true,
			'sub_links' => array(
				array(
					'sub_url' => Route::url('client', array('controller' => 'workorder', 'action' => 'submit')),
					'sub_name' => 'Order New Inspction'
				)
			)
		);
	}
}