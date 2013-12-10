<?php
/**
 * View model for handling estmates for an inspection
 */
class View_Inspections_Photos extends View_Protected_Inspector_Layout
{
	protected $_template = 'inspections/photos/form';
	
	protected $_partials = array(
		'sidebar' => 'protected/sidebar'
	);
	
	public $csrf_token = null;
	
	public $post_url = null;
	
	protected $_workorder_id = null;
	
	private $_m_photos = null;
	
	public function __construct($workorder_id = null, $m_photos)
	{
		parent::__construct();
		
		$this->_workorder_id = $workorder_id;
		
		$this->_m_photos = $m_photos;
		
			
		$this->_set_links();
		$this->_set_assets();
		$this->_set_sidebar();
		
		$this->csrf_token = Security::CSRF_token();
	}
	
	private function _set_links()
	{
		$this->post_url = Route::url('inspector', array(
		
			'controller' => 'inspections',
			'action' => 'photos',
			'id' => $this->_workorder_id
			
		));
	}
	
	private function _set_assets()
	{
		
		Asset::instance()
			->css('core/inspection/photos');
		
	}

	private function _set_sidebar()
	{
		$this->has_sidebar = true;
		
		$this->sidebar_links = array(
			array(
				'url' => Route::url('inspector', array('controller' => 'inspections', 'action' => 'index')),
				'name' => 'Work Orders',
				'has_sublinks' => false
				
			),
			array(
				'url' => Route::url('inspector', array(
					'controller' => 'inspections',
					'action' => 'viewphotos',
					'id' => $this->_workorder_id
				)),
				'name' => 'Photos',
				'has_sublinks' => true,
				'sub_links' => array(
					array(
						'sub_url' => Route::url('inspector', array(
							'controller' => 'inspections',
							'action' => 'editphotos',
							'id' => $this->_workorder_id
						)),
						'sub_name' => 'Edit Current Photos'						
					),
					array(
						
						'sub_url' => Route::url('inspector', array(
							'controller' => 'inspections',
							'action' => 'photos',
							'id' => $this->_workorder_id
						)),
						
						'sub_name' => 'Upload New Photos'
					)
				)	
			)
		);
	}
}