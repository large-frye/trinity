<?php
/**
 * Invoice page
 */
class View_Admin_Invoice extends View_Protected_Admin_Layout
{
	protected $_template = 'admin/invoice';
	
	/**
	 * @var array Holds the invoice meta
	 */
	public $invoice_meta = array();
	
	/**
	 * @var Model_Invoice 
	 */
	private $_m_invoice = null;
	
	public $csrf_token = null;
	
	/**
	 * @var string The url where the post has to go
	 */
	public $post_url = '';
	
	public function __construct(Model_Invoice $m_invoice, Model_Workorders $m_workorder)
	{
		parent::__construct();
		
		$this->_m_invoice = $m_invoice;
		$this->_m_invoice->load();
		
		$this->set_data();
		
		$this->_set_urls();
		
		$this->set_assets();
		$this->_set_sidebar();
		
		// Pass the token for the form
		$this->csrf_token = Security::CSRF_token();	
	}
	
	private function set_assets()
	{
		Asset::instance()
				->js('admin/multi-row');
	}
	
	private function _set_urls()
	{
		$this->post_url = Route::url('admin', array('controller' => 'invoice', 'action' => 'index', 'id' => $this->_m_invoice->the_workorder_id()));
	}
	
	/**
	 * Resets data from model to view model
	 */
	public function set_data()
	{
		$this->invoice_meta = $this->_m_invoice->return_invoice_meta();
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
					'sub_name' => 'Submit New Inspection'
				)
			)
		);
	}
}