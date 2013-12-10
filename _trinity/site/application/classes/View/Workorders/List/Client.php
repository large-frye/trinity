<?php
/**
 * Children class of View_Workorders_List
 */
class View_Workorders_List_Client extends View_Workorders_List
{
	public function __construct()
	{
		parent::__construct();
		
		$this->_set_links();
		
		$this->list_type = 'client';
		$this->_fill_data();
		
		$this->_fill_data_client();
	}
	
	private function _set_links()
	{
		$this->add_url = Route::url('client', array('controller' => 'workorder', 'action' => 'submit'));
		$this->view_url = Route::url('client', array('controller' => 'workorder', 'action' => 'view'));
		$this->report_url = Route::url('client', array('controller' => 'workorder', 'action' => 'report'));		
	}
	
	protected function _fill_data_client()
	{
		for ( $i = 0, $max = count($this->workorders); $i < $max; $i++ )
		{
			if ($this->workorders[$i]['inspection_status'] == 4)
			{
				$this->workorders[$i]['show_report'] = true;
			}
		}				
	}
	
	private function _set_sidebar()
	{
/*		$this->_partials = array(
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
		);*/
	}
}