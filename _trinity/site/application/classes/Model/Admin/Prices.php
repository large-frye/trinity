<?php
/**
 * Model for editing the prices of workorder types
 */
class Model_Admin_Prices extends Model_Core
{
	/**
	 * @var array The prices built for settings table
	 */
	protected $prices = array(
		0 => array(
			'name' => 'workorder_type_price_0',
			'value' => 0,
			'nice_name' => 'Work order type price - Basic Inspections',
			'description' => ''
		),
		1 => array(
			'name' => 'workorder_type_price_1',
			'value' => 0,
			'nice_name' => 'Work order type price - Expert Inspections',
			'description' => ''
		),
		2 => array(
			'name' => 'workorder_type_price_2',
			'value' => 0,
			'nice_name' => 'Work order type price - Engineer Reports',
			'description' => ''
		)
	);
	
	/**
	 * @var Model_Settings
	 */
	protected $m_settings = null;
	
	/**
	 * @var array Holds any errors
	 */
	protected $_errors = array();
	
	/**
	 * @var array Holds the POST data
	 */
	protected $_post_data = array();
	
	public function __construct()
	{
		$this->m_settings = new Model_Settings();
		
		try
		{
			$this->m_settings->load_by(array('name' => 'workorder_type_price_0'));
			
			if ( !$this->m_settings->is_loaded )
			{
				$this->m_settings->set_multi_data($this->prices);
			}
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	/**
	 * Function for validating the incoming data
	 * Prices need to be numeric and not empty
	 * @param array $post The POST data
	 * @return boolean
	 */
	public function validate(Array $post)
	{
		$this->_post_data = $post;
		$val = Validation::factory($this->_post_data);
		
		foreach( $this->prices as $price )
		{
			$val->rule($price['name'], 'not_empty');
			$val->rule($price['name'], 'numeric');
		}
		
		if ( $val->check() )
		{
			$this->_set_data();
			return true;
		}
		
		$this->_errors = $val->errors('validation/prices');
		
		return false;
	}
	
	/**
	 * Pass the post data into our array
	 */
	protected function _set_data()
	{
		foreach( $this->prices as $key => $price )
		{
			$this->prices[$key]['value'] = $this->_post_data[$price['name']];
		}
	}
	
	/**
	 * Saves the data into settings table
	 * @return boolean
	 */
	public function save()
	{
		try
		{
			return $this->m_settings->set_multi_data($this->prices);
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	/**
	 * Gets the price from db
	 * @return array
	 */
	public function get_prices()
	{
		return $this->get_table_data('settings', null, null, ' AND name LIKE "%workorder_type_price%"');
	}
	
	/**
	 * Pass a type number and get the price back
	 * @param int $type
	 * @return float
	 */
	public function get_price_by_type($type = null)
	{
		$result = $this->get_table_data('settings', null, null, ' AND name LIKE "%workorder_type_price_'.(int)$type.'%"');
		
		if ( !empty($result) )
		{
			return floatval($result[0]['value']);
		}
		
		return 0;
	}
	
	public function return_errors()
	{
		return $this->_errors;
	}
}