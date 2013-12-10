<?php

class Model_Core extends Kohana_Model
{
	protected $_sql = null;
	protected $_q = null;
	protected $_r = null;
	protected $_last_insert_id = null;
	
	protected $_db = 'default';
	protected function _get_db_instance()
	{
		if (is_string($this->_db))
		{
			$this->_db = Database::instance($this->_db);
		}
		
		return $this->_db;
	}
	
	protected function _get_results()
	{
		if ($this->_q->count() > 0)
		{
			$this->_r = $this->_q->as_array();
			return $this->_r;
		}

		return false;
	}
	
	protected function is_exist()
	{
		if ($this->_q->count() > 0) { return true; }
		return false;
	}
	
	protected function _is_inserted()
	{
		if ($this->_r[1] > 0)
		{
			$this->_last_insert_id = $this->_r[0];
			return true;
		}
		
		return false;
	}
	
	protected function _is_updated()
	{
		if ($this->_r > 0) { return true; }
		
		return false;
	}
	
	public function get_last_insert_id()
	{
		return $this->_last_insert_id;
	}
	
	/**
	 * Returns the data from a table
	 * It is pagination capable
	 * @param string $table_name The name of the table we want to get data from
	 * @param int $limit Used for pagination
	 * @param int $offset Used for pagination
	 * @param string $extra_sql If the query needs any extra sql, we put it here - we already have WHERE 1 = 1
	 * @return array
	 */
	public function get_table_data($table_name = '', $limit = null, $offset = null, $extra_sql = '')
	{
		if ( $table_name == '' ) { return array(); }
		
		$this->_sql = 'SELECT * FROM '.$table_name.' WHERE 1 = 1 '.$extra_sql;
		
		if ( $limit !== null )
		{
			$this->_sql .= ' LIMIT '.$limit;
			if ( $offset !== null )
			{
				$this->_sql .= ' OFFSET '.$offset;
			}
		}
		
		try
		{
			$this->_q = DB::query(Database::SELECT, $this->_sql)->execute();
			
			$result = $this->_get_results();
			
			if ( $result !== false )
			{
				return $result;
			}
			
			return array();
		}
		catch(Database_Exception $e)
		{
			throw $e;
		}
	}
	
	/**
	 * Returns the total number of elements from a table
	 * @param string $table_name The name of the table we want the total from
	 * @param string $extra_sql Any extra sql we want to insert - we already have WHERE 1 = 1
	 * @param string $total_field Optional parameter, sets the field we use in COUNT() - default is id
	 * @return int
	 */
	public function get_table_total($table_name = '', $extra_sql = '', $total_field = 'id')
	{
		if ( $table_name == '' ) { return 0; }
		
		$this->_sql = 'SELECT COUNT('.$total_field.') AS total FROM '.$table_name.' WHERE 1 = 1 '.$extra_sql;
		
		try
		{
			$this->_q = DB::query(Database::SELECT, $this->_sql)->execute();
			
			$result = $this->_get_results();
			
			return $result[0]['total'];
		}
		catch(Database_Exception $e)
		{
			throw $e;
		}
	}
	
	/**
	 * Helper function that zips the insert process into a function
	 * Gets the table name and the data in the form of an array
	 * @param string $table Name of the table we want to insert to
	 * @param array $data Data to iterate through and insert
	 * @return bool | int If successful, returns the insert ID, otherwise false
	 */
	public function _insert_data($table = '', $data = array())
	{
		if ( $table == '' || empty($data) || !is_array($data) )
		{
			return false;
		}
		
		try
		{
			$cols = implode('`,`',array_keys($data));
			$vals = implode(',:',array_keys($data));
			$this->_sql = 'INSERT INTO '.$table.'(`'.$cols.'`) VALUES(:'.$vals.')';
			
			$this->_q = DB::query(Database::INSERT, $this->_sql);
			
			foreach( $data as $key => $value )
			{
				$this->_q->param(':'.$key, $value);
			}
			
			$q = $this->_q->execute();
			
			// Add the insert id
			if ( $q[0] > 0 )
			{
				return $q[0];
			}
			
			return false;
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	/**
	 * Helper function that iterates through an array and updates the table with the data
	 * This function is only capable of updating one table at a time, a simple query
	 * @param string $table The name of the table to update
	 * @param array $data The data to work with - must have elements
	 * @param string $column The name of the column we want to update by - default "id"
	 * @return boolean
	 */
	public function _update_data($table = '', $data = array(), $column = 'id')
	{
		if ( $table == '' || empty($data) || !is_array($data) || !in_array($column,array_keys($data)) )
		{
			return false;
		}
		
		try
		{
			$this->_sql = 'UPDATE '.$table.' SET ';
			
			// Iterate through and build the query string
			foreach ( $data as $key => $value )
			{
				$this->_sql .= '`'.$key.'` = :'.$key.',';
			}
			
			// Cut the trailing ","
			$this->_sql = rtrim($this->_sql, ',');
			
			$this->_sql .= ' WHERE `'.$column.'` = :'.$column;
			
			// Build query and pass data
			$this->_q = DB::query(Database::UPDATE, $this->_sql);
			
			foreach ( $data as $key => $value )
			{
				$this->_q->param(':'.$key, $value);
			}			
			
			$this->_q->execute();
			
			return true;
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
}