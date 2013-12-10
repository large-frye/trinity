<?php
/**
 * Extends View_Workorders_List
 */
class View_Workorders_List_Admin extends View_Workorders_List
{
	public $invoice_url = '';
	public $generate_url = '';
	
	public function __construct()
	{
		parent::__construct();
		
		$this->_set_links();
		
		$this->list_type = 'admin';
		$this->_fill_data_admin();
	}
	
	private function _set_links()
	{
		$this->add_url = Route::url('admin', array('controller' => 'workorders', 'action' => 'submit'));
		$this->view_url = Route::url('admin', array('controller' => 'workorders', 'action' => 'view'));
		$this->edit_url = Route::url('admin', array('controller' => 'workorders', 'action' => 'edit'));

		$this->invoice_url = Route::url('admin', array('controller' => 'invoice')).'/index';
		$this->generate_url = Route::url('admin', array('controller' => 'invoice', 'action' => 'generate'));

		$this->report_url = Route::url('admin', array('controller' => 'workorders', 'action' => 'report'));

	}
	
	protected function _fill_data_admin()
	{
		$this->_fill_data();
		
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
			'url' => Route::url('admin', array('controller' => 'workorders', 'action' => 'index')),
			'name' => 'Inspection Orders',
			'has_sublinks' => true,
			'current' => true,
			'sub_links' => array(
				array(
					'sub_url' => Route::url('admin', array('controller' => 'workorders', 'action' => 'submit')),
					'sub_name' => 'Submit New Inspction'
				)
			)
		);*/
	}
}