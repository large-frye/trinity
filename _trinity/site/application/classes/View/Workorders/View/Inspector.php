<?php
/**
 * Extends View_Workorders_View
 */
class View_Workorders_View_Inspector extends View_Workorders_View
{
	public function __construct($m_workorders = null)
	{
		$this->_m_workorders = $m_workorders;
		
		parent::__construct();
		
		$this->_set_links();

		$this->_set_mustache_variables();
		$this->_set_sidebar();
		$this->_set_assets();
	}
	
	private function _set_assets()
	{	
		Asset::instance()
			->js(
				'core/inspection/print'
			);
	}	
	
	private function _set_links()
	{
		$this->post_url = Route::url('inspector', array('controller' => 'inspections', 'action' => 'view', 'id' => $this->data['id']));
	}
	
	protected function _set_mustache_variables()
	{
		$this->show_inspection_status = true;
	}

	/**
	 * Return Work order statuses
	 */
	public function inspection_statuses()
	{
		$i_statuses = $this->_m_workorders->get_inspection_statuses();
		
		for ( $i=0, $mi=count($i_statuses); $i<$mi; $i++ )
		{
			if ( $i_statuses[$i]['id'] == $this->data['inspection_status'] )
			{
				$i_statuses[$i]['selected'] = true;
			}
		}
		
		return $i_statuses;
	}	

	/**
	 * Repopulate the status form after POST validation error
	 */
	public function repopulate_inspection_status_form($post)
	{	
		$this->inspection_statuses();	
	}		
	
	private function _set_sidebar()
	{
		$this->_partials = array(
			'sidebar' => 'protected/sidebar'
		);
		
		$this->has_sidebar = true;
		$this->sidebar_links[] = array(
			'url' => Route::url('inspector', array('controller' => 'inspections', 'action' => 'index')),
			'name' => 'Inspection Orders',
			'has_sublinks' => true,
			'current' => true,
			'sub_links' => array(
				array(
					'sub_url' => Route::url('inspector', array('controller' => 'inspections', 'action' => 'view', 'id' => $this->data['id'])),
					'sub_name' => 'View Work Order',
					'sub_current' => true
				),
				array(
					'sub_url' => Route::url('inspector', array('controller' => 'inspections', 'action' => 'form', 'id' => $this->data['id'])),
					'sub_name' => 'Inspection Form'
				),
				array(
					'sub_url' => Route::url('inspector', array('controller' => 'inspections', 'action' => 'estimates', 'id' => $this->data['id'])),
					'sub_name' => 'Estimates'
				)
			)
		);
		
		$this->sidebar_links[] = array(
			'url' => 'javascript:void(0)',
			'name' => 'Print',
			'extraclass' => 'btn-print',
			'has_sublinks' => false,
			'current' => false
		);		
	}
	
}