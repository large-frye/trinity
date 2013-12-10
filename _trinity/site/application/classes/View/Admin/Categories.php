<?php
/**
 * View model that handles categories for admin
 */
class View_Admin_Categories extends View_Protected_Admin_Layout
{
	protected $_template = 'admin/categories';
	
	/**
	 * @var Model_Categories
	 */
	protected $_m_categories = null;
	
	/**
	 * @var array Holds the categories
	 */
	public $categories = array();
	
	/**
	 * @var string Url of the form
	 */
	public $post_action_url = '';
	
	public $csrf_token = '';
	
	protected $is_list = false;
	
	public function __construct($m_categories, $is_list = false)
	{
		parent::__construct();
		
		$this->is_list = $is_list;
		if ( $is_list )
		{
			$this->_template = 'admin/categories_view';
		}
		
		$this->_m_categories = $m_categories;
		
		$this->_set_urls();
		
		$this->_set_data();
		
		$this->_set_sidebar();
		
		$this->csrf_token = Security::CSRF_token();
	}
	
	private function _set_urls()
	{
		$this->post_action_url = Route::url('admin', array('controller' => 'categories', 'action' => 'edit'));
	}
	
	private function _set_data()
	{
		$this->categories = $this->_m_categories->get_categories();
		
		for ( $i = 0, $max= count($this->categories); $i < $max; $i++  )
		{
			if ( count($this->categories[$i]['children']) > 0 )
			{
				$this->categories[$i]['has_children'] = true;
			}
		}
	}
	
	private function _set_sidebar()
	{
		$this->_partials = array(
			'sidebar' => 'protected/sidebar'
		);
		
		$this->has_sidebar = true;
		
		$this->sidebar_links[] = array(
			'url' => Route::url('admin', array('controller' => 'settings', 'action' => 'index')),
			'name' => 'Settings',
			'has_sublinks' => true,
			'current' => true,
			'sub_links' => array(
				array(
					'sub_url' => Route::url('admin', array('controller' => 'settings', 'action' => 'email')),
					'sub_name' => 'Email Templates'
				),
				array(
					'sub_url' => Route::url('admin', array('controller' => 'settings', 'action' => 'prices')),
					'sub_name' => 'Work Order Prices',
				),
				array(
					'sub_url' => Route::url('admin', array('controller' => 'categories', 'action' => 'index')),
					'sub_name' => 'Categories',
					'sub_current' => ($this->is_list)? true : false
				),
				array(
					'sub_url' => Route::url('admin', array('controller' => 'categories', 'action' => 'edit')),
					'sub_name' => 'Edit categories',
					'sub_current' => ($this->is_list)? false : true
				)
			)
		);
		
	}
}