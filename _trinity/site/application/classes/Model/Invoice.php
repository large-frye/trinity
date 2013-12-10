<?php
/**
 * This model is responsable for invoice data
 */
class Model_Invoice extends Model_Core
{
	/**
	 * @var string The name of the table we work with
	 */
	public $_invoice_meta_table = 'invoice_meta';
	
	/**
	 * @var array Holds the invoice_meta of an inspection
	 */
	protected $_invoice_meta = array();
	
	/**
	 * @var boolean Checks if data was validated
	 */
	protected $_is_validated = false;
	
	/**
	 * @var int Holds the inspection id
	 */
	protected $_workorder_id = null;
	
	/**
	 * @var array Holds errors occuring any time during processing
	 */
	protected $_errors = array();
	
	public function __construct($id = null)
	{
		if ( $id == null || !is_numeric($id) )
		{
			throw new Kohana_Exception('Work order ID has to be set to instantiate the invoice model');
		}
		
		$this->_workorder_id = (int)$id;
	}
	
	/**
	 * Validates the incoming data
	 * The description amount pairs have to be ok
	 * @param array POST
	 * @return boolean
	 */
	public function validate(Array $post)
	{
		if ( !array_key_exists('descriptions', $post) || !array_key_exists('amounts', $post) || count($post['descriptions']) != count($post['amounts']) )
		{
			$this->_errors['error'] = 'Data in post is not consistent';
			return false;
		}
		
		$descriptions = $post['descriptions'];
		$amounts = $post['amounts'];
		
		$are_errors = false;
		
		$this->_invoice_meta = array();
		
		// Start going trough the values and add them to the inner variable
		for ( $i = 0, $max = count($descriptions); $i < $max; $i++ )
		{
			$row = array();
			$row['workorder_id'] = $this->_workorder_id;
			$row['description'] = $descriptions[$i];
			$row['amount'] = $amounts[$i];
			
			if ( !Valid::not_empty($descriptions[$i]) )
			{
				$row['description_error'] = 'Description cannot be empty';
				$are_errors = true;
			}
			
			if ( !Valid::not_empty($amounts[$i]) || !is_numeric($amounts[$i]) )
			{
				$row['amount_error'] = 'Amount cannot be empty and has to be a number';
				$are_errors = true;
			}
			
			$this->_invoice_meta[] = $row;
		}
		
		if ( !$are_errors )
		{
			$this->_is_validated = true;
			return true;
		}
		
		return false;
	}
	
	/**
	 * Saves the passed data to db if validation was ok
	 * @return boolean
	 */
	public function save()
	{
		if ( !$this->_is_validated )
		{
			return false;
		}		
		
		try
		{
			Database::instance()->begin();
			
			// Start with deleting all the values for an ispection
			$this->_sql = 'DELETE FROM '.$this->_invoice_meta_table.' WHERE workorder_id = :id';
			
			$this->_q = DB::query(Database::DELETE, $this->_sql)
					->param(':id', $this->_workorder_id)
					->execute();
			
			for ( $i = 0, $max = count($this->_invoice_meta); $i < $max; $i++ )
			{
				$this->_insert_data($this->_invoice_meta_table, $this->_invoice_meta[$i]);
			}
			
			Database::instance()->commit();
			
			return true;
		}
		catch(Database_Exception $db_e)
		{
			Database::instance()->rollback();
			throw $db_e;
		}
	}
	
	/**
	 * Loads the invoice_meta for the instacianted inspection id
	 * @return boolean
	 */
	public function load()
	{
		try
		{
			$this->_sql = 'SELECT * FROM '.$this->_invoice_meta_table.' WHERE workorder_id = :id';
			
			$this->_q = DB::query(Database::SELECT, $this->_sql)
					->param(':id', $this->_workorder_id)
					->execute();
			
			$result = $this->_get_results();
			
			if ( $result !== false )
			{
				$this->_invoice_meta = $result;
				return true;
			}
			
			return false;
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	public function return_invoice_meta()
	{
		return $this->_invoice_meta;
	}
	
	public function return_errors()
	{
		return $this->_errors;
	}
	
	public function the_workorder_id()
	{
		return $this->_workorder_id;
	}
}