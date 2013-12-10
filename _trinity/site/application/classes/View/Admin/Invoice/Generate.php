<?php
/**
 * Page that displays the full invoice and has links to send the invoice to the user
 */
class View_Admin_Invoice_Generate extends View_Protected_Admin_Layout
{
	protected $_template = 'admin/invoice/generate';
	
	/**
	 * @var array Holds the invoice meta
	 */
	public $invoice_meta = array();
	
	/**
	 * @var Model_Invoice 
	 */
	private $_m_invoice = null;
	
	/**
	 * @var array Holds teh data of the workorder
	 */
	public $workorder = array();
	
	/** 
	 * @var Model_Workorders
	 */
	protected $m_workorders = null;
	
	public $csrf_token = null;
	
	/**
	 * @var string The url where the post has to go
	 */
	public $post_url = '';
	
	/**
	 * @var float The total price
	 */
	public $total = 0;
	
	public $logo_url = '';
	
	public function __construct(Model_Invoice $m_invoice, Model_Workorders $m_workorder, $is_pdf = false)
	{
		parent::__construct();
		
		if ( $is_pdf )
		{
			$this->_template = '';
			$this->_layout = 'admin/invoice/pdf';
			$this->logo_url = DOCROOT.'assets/gfx/logo.png';
		}
		
		$this->_m_invoice = $m_invoice;
		$this->_m_invoice->load();
		
		$this->m_workorders = $m_workorder;
		
		$this->set_data();
		
		$this->_set_urls();
		$this->_set_sidebar();
		
		// Pass the token for the form
		$this->csrf_token = Security::CSRF_token();	
	}
	
	private function _set_urls()
	{
		$this->post_url = Route::url('admin', array('controller' => 'invoice', 'action' => 'generate', 'id' => $this->_m_invoice->the_workorder_id()));
	}
	
	/**
	 * Resets data from model to view model
	 */
	private function set_data()
	{
		$this->workorder[] = $this->m_workorders->return_data();
		
		$this->_m_invoice->load();
		$this->invoice_meta = $this->_m_invoice->return_invoice_meta();
		
		$total = 0;
		$total += (float)$this->workorder[0]['price'];
		
		foreach ( $this->invoice_meta as $meta )
		{
			$total += (float)$meta['amount'];
		}
		
		$this->total = $total;
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