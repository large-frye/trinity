<?php
/**
 * View model for displaying prices
 */
class View_Admin_Prices extends View_Protected_Admin_Layout
{
	protected $_template = 'admin/prices';
	
	/**
	 * @var array Holds the prices
	 */
	public $prices = array();
	
	/**
	 * @var string The url of the form
	 */
	public $form_action_url = '';
	
	/**
	 * @var Model_Admin_Prices
	 */
	protected $_m_prices = null;
	
	public $csrf_token = '';
	
	public function __construct($m_prices)
	{
		parent::__construct();
		
		$this->_m_prices = $m_prices;
		
		$this->csrf_token = Security::CSRF_token();
		
		$this->_set_links();
		$this->_set_sidebar();
	}
	
	protected function _set_links()
	{
		$this->form_action_url = Route::url('admin', array('controller' => 'settings', 'action' => 'prices'));
	}
	
	/**
	 * Go trough the data and set it whether from db or incoming data
	 * @param array $incoming Can be post or other array with data
	 */
	public function fill_data($incoming = array())
	{
		$data = $this->_m_prices->get_prices();
		
		$errors = $this->_m_prices->return_errors();
		
		for ( $i = 0, $max = count($data); $i < $max; $i++ )
		{
			if ( array_key_exists($data[$i]['name'], $incoming) )
			{
				$data[$i]['value'] = $incoming[$data[$i]['name']];
			}
			
			if ( array_key_exists($data[$i]['name'], $errors) )
			{
				$data[$i]['error'] = $errors[$data[$i]['name']];
			}
		}
		
		$this->prices = $data;
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
					'sub_current' => true
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