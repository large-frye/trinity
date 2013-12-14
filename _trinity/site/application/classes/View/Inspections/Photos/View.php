<?php
/**
 * View model for handling estmates for an inspection
 */
class View_Inspections_Photos_View extends View_Protected_Inspector_Layout
{
	protected $_template = 'inspections/photos/view';
	protected $_partials = array(
		'categories' => 'inspections/photos/categories',
		'sidebar' => 'protected/sidebar'
	);
		
	protected $_workorder_id = null;
	
	private $_m_photos = null;
	private $_m_categories = null;
	
	public function __construct($workorder_id = null, $m_photos, $m_categories)
	{
		parent::__construct();
		
		$this->_workorder_id = $workorder_id;
		$this->_m_photos = $m_photos;
		$this->_m_categories = $m_categories;
				
		$this->_set_assets();
		
		$this->_set_sidebar();
	}
	
	private function _set_assets()
	{		
		Asset::instance()
			->css('core/inspection/photos')
			->js(
				'core/inspection/photos/view',
				'core/inspection/photos/categories'
			);
		
	}

	public function photo_thumbnails()
	{
		$photos = $this->_m_photos->get_published_data();
		
		if ( $photos === false ) { return false; }
				
		for ( $i = 0, $mi = count($photos); $i < $mi; $i++ )
		{
			$photos[$i]['thumb_url'] = Route::url('inspector/getphoto', array(
				'size' => 't',
				'workorder_id' => $photos[$i]['workorder_id'],
				'photo_id' => $photos[$i]['thumbnail_filename']
			));	
			
			$photos[$i]['orig_url'] = Route::url('inspector/getphoto', array(
				'size' => 'o',
				'workorder_id' => $photos[$i]['workorder_id'],
				'photo_id' => $photos[$i]['filename']
			));					
		
			$photos[$i]['title'] = $photos[$i]['original_name'];
			
			if ( $photos[$i]['error'] != false )
			{
				$photos[$i]['title'] .= ' (' .$photos[$i]['error'] .')';
			}
		}
			
		return $photos;
	}

	public function categories()
	{
		$categories = $this->_m_categories->get_categories();

		return $categories;
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