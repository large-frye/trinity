<?php
/**
 * View model for settings
 */
class View_Admin_Settings extends View_Protected_Admin_Layout
{
	protected $_template = 'admin/settings';
	
	/**
	 * @var Model_Core For getting the settings
	 */
	protected $m_settings = null;
	
	/**
	 * @var array Holds the settings that need to be put out
	 */
	public $settings = array();
	
	/**
	 * @var string Holds the url where the post is sent
	 */
	public $post_url = '';
	
	public $are_settings = false;
	
	public $csrf_token = '';
	
	public function __construct()
	{
		parent::__construct();
		
		$this->m_settings = new Model_Admin_Settings();
		
		$this->_set_settings();
		$this->_set_urls();
		$this->_set_sidebar();
		
		$this->csrf_token = Security::CSRF_token();
	}
	
	private function _set_settings()
	{
		$this->settings = $this->m_settings->get_settings('general');
		
		if ( count($this->settings) > 0 )
		{
			$this->are_settings = true;
		}
	}
	
	private function _set_urls()
	{
		$this->post_url = Route::url('admin', array('controller' => 'settings', 'action' => 'index'));
	}
	
	/**
	 * Used to pass post data and errors from controller
	 */
	public function pass_data(Array $post, Array $errors)
	{
		for ( $i = 0, $max = count($this->settings); $i < $max; $i++ )
		{
			if ( array_key_exists($this->settings[$i]['name'], $errors) )
			{
				$this->settings[$i]['error'] = $this->settings[$i]['nice_name'].' - Cannot be empty';
			}
			
			if ( array_key_exists($this->settings[$i]['name'], $post) )
			{
				$this->settings[$i]['value'] = $post[$this->settings[$i]['name']];
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
					'sub_name' => 'Email Templates',
				),
				array(
					'sub_url' => Route::url('admin', array('controller' => 'settings', 'action' => 'prices')),
					'sub_name' => 'Work Order Prices',
				),
				array(
					'sub_url' => Route::url('admin', array('controller' => 'categories', 'action' => 'index')),
					'sub_name' => 'Categories'
				),
				array(
					'sub_url' => Route::url('admin', array('controller' => 'categories', 'action' => 'edit')),
					'sub_name' => 'Edit categories'
				)
			)
		);
	}
}