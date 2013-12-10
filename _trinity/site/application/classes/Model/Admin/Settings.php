<?php
/**
 * Settings model for admin
 * Makes the settings prettier and usable for admin purposes - is project specific
 * @uses Model_Settings
 */
class Model_Admin_Settings extends Model_Settings
{
	/**
	 * @var array Inner post data holder
	 */
	protected $_post_data = array();
	
	/**
	 * Sets validation based on current settings names
	 * Uses the setting name for validation name and adds the base not_empty rule
	 * @param string $type Used to narrow down settings validation by using LIKE in the query
	 * @param array $post The incoming data
	 * @return boolean
	 */
	public function set_validation($type = null, Array $post = array())
	{
		$sql = 'SELECT * FROM '.$this->_table_name.' WHERE 1 =1 ';
		
		if ( $type != null )
		{
			$sql .= ' AND name LIKE "%'.(string)$type.'%"';
		}
		
		try
		{
			$q = DB::query(Database::SELECT, $sql)->execute();
			
			if ( $q->count() > 0 )
			{
				$q = $q->as_array();
			}
			else
			{
				$q = array();
			}
		}
		catch( Database_Exception $db_e )
		{
			throw $db_e;
		}
		
		$val = Validation::factory($post);
		
		for ( $i = 0, $max = count($q); $i < $max; $i++ )
		{
			$val->rule($q[$i]['name'], 'not_empty');
		}

		if ( $val->check() )
		{
			
			// We pass the data to the inner array
			for ( $i = 0, $max = count($q); $i < $max; $i++ )
			{
				$q[$i]['value'] = $post[$q[$i]['name']];
			}
			
			$this->_post_data = $q;
			
			return true;
		}
		
		$this->_errors = $val->errors();
		return false;
	}
	
	/**
	 * Save the validated and converted data
	 */
	public function save_data()
	{
		return $this->set_multi_data($this->_post_data);
	}
	
	/**
	 * Gets the settings
	 * Can be narrowed by type
	 * @param string $type Used to narrow down settings validation by using LIKE in the query
	 * @return array
	 */
	public function get_settings($type = null)
	{
		$m = new Model_Core();
		
		$sql = '';
		if ( $type != null )
		{
			$sql = ' AND name LIKE "%'.(string)$type.'%"';
		}
		
		try
		{
			return $m->get_table_data($this->_table_name, null, null, $sql);
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
}