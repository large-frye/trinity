<?php
/**
 * Extends View_Workorders_View
 */
class View_Workorders_View_Admin extends View_Workorders_View
{
	public function __construct($m_workorders = null)
	{
		$this->_m_workorders = $m_workorders;
		
		parent::__construct();
		
		$this->_set_links();

		$this->_set_mustache_variables();
		$this->_set_sidebar();
	}
	
	private function _set_links()
	{
		$this->post_url = Route::url('admin', array('controller' => 'workorders', 'action' => 'view', 'id' => $this->data['id']));
	}
	
	protected function _set_mustache_variables()
	{
		$this->show_general_status = true;		
		
		if ( isset($this->data['status']) && $this->data['status'] == 4 )
		{
			$this->show_inspection_status = true;
		}		
	}
	
	
	/**
	 * Return Work order statuses
	 */
	public function statuses()
	{
		$statuses = $this->_m_workorders->get_statuses();
		
		for ( $i=0, $mi=count($statuses); $i<$mi; $i++ )
		{
			if ( $statuses[$i]['id'] == $this->data['status'] )
			{
				$statuses[$i]['selected'] = true;
			}
		}
		
		return $statuses;
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
	 * Return the inspectors
	 */	
	public function inspectors()
	{
		$m_users = new Model_Admin_Users();
		
		$inspectors = $m_users->get_by_role(3);
		
		for ( $i=0, $mi=count($inspectors); $i<$mi; $i++ )
		{
			if ( $inspectors[$i]['id'] == $this->data['inspector_id'] )
			{
				$inspectors[$i]['selected'] = true;
			}
		}
		
		return $inspectors;		
	}
	
	/**
	 * Repopulate the status form after POST validation error
	 */
	public function repopulate_status_form($post)
	{
		$this->data['date_of_inspection'] = $post['date_of_inspection'];
		$this->data['time_of_inspection'] = $post['hour_of_inspection'].':'.$post['min_of_inspection'];
		$this->data['inspector_id'] = $post['inspector_id'];
		$this->data['status'] = $post['status'];
		$this->inspectors();
		$this->statuses();				
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
		);
	}

}