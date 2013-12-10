<?php

/**
 * This class represents a setting row as an object. It uses settings table to retrieve the data.
 *
 * @version 1.0
 *
 */
class Model_Settings extends Model_Database
{
	/**
	 * @var string The table name
	 */
	protected $_table_name = 'settings';
	
	/**
	 * @var Table columns available in the table.
	 */
	protected $_table_columns = array
	(
		'id',
		'name',
		'value',
		'nice_name',
		'description'
	);
	
	/**
	 * @var array Which data should the Settings object hold that's needed.
	 */
	protected $_data = array
	(
		'id' => null,
		'name' => null,
		'value' => null,
		'nice_name' => null,
		'description' => null,
		
		'is_loaded' => false
	);
	
	/**
	 * @var array Holds any errors occuring during valdiation
	 */
	protected $_errors = array();
	
	/**
	 * Validates the incoming data
	 * @param array $data The incoming data
	 * @return boolean
	 */
	public function validate(Array $data = array())
	{
		$val = Validation::factory($data)
				->bind(':model', $this)
				->rule('name', 'not_empty')
				->rule('name', array(':model', '_unique_name'))
				->rule('value', 'not_empty');
		
		if ( $val->check() )
		{
			foreach ( $this->_table_columns as $column )
			{
				if ( array_key_exists($column, $data) )
				{
					$this->_data[$column] = $data[$column];
				}
			}
			
			return true;
		}
		
		$this->_errors = $val->errors('settings');
		return false;
	}
	
	/**
	 * Validation function to check if a name is unique
	 * @param string $name The name to check
	 * @return boolean
	 */
	public function _unique_name($name)
	{
		// This has to work for edit and add, too, so we use the id in the query
		$sql = 'SELECT COUNT(name) AS nr FROM '.$this->_table_name.' WHERE name = :name AND id != :id';
		
		try
		{
			$q = DB::query(Database::SELECT, $sql)
					->param(':name', $name)
					->param(':id', (int)$this->_data['id'])
					->execute();
			
			$q = $q->as_array();
			
			return ( intval($q[0]['nr']) == 0 );
		}
		catch(Database_Exception $db_e)
		{
			return false;
		}
	}
	
	/**
	 * Save the data in the database
	 *
	 * @throws Database_Exception If the query isn't correct.
	 * @return bool TRUE on success.
	 */
	public function save()
	{
		try 
		{
			// First check to see if the data already exists in the DB.
			$is_exists = DB::select( array(DB::expr('COUNT(name)'), 'is_exists') )
							->from($this->_table_name)
							->where('name', '=', $this->_data['name'])
							->execute()
							->get('is_exists');
			
			
			// Update if exists, insert otherwise
			if ( $is_exists )
			{
				$this->_update();
			}
			else
			{
				$this->_insert();
			}
			
			
			return true;
		} 
		catch (Database_Exception $e) 
		{
			throw $e;
		}
	}


	/**
	 * Update one row in the table.
	 * 
	 * @throws Database_Exception If the query isn't correct.
	 * @return bool TRUE on success.
	 */	 
	protected function _update()
	{
		try 
		{
			$sql = 'UPDATE settings SET value = :value, nice_name = :nice_name, description = :description WHERE name = :name ;';
			
			$r = DB::query(Database::UPDATE, $sql)
					->parameters(array(
						':name' => $this->_data['name'],
						':value' => $this->_data['value'],
						':nice_name' => $this->_data['nice_name'],
						':description' => $this->_data['description']
					))
					->execute();
				
			return true;
		} 
		catch (Database_Exception $e) 
		{
			throw $e;
		}
	}
	
	
	/**
	 * Insert one row in the table
	 * 
	 * @throws Database_Exception If the query isn't correct.
	 * @return bool TRUE on success.
	 */	 
	protected function _insert()
	{
		try 
		{
			$sql = 'INSERT INTO settings
					(
						name,
						value,
						nice_name,
						description
					)
					VALUES
					(
						:name ,
						:value,
						:nice_name,
						:description
					);';
			
			
			$r = DB::query(Database::INSERT, $sql)
					->parameters(array(
						':name' => $this->_data['name'],
						':value' => $this->_data['value'],
						':nice_name' => $this->_data['nice_name'],
						':description' => $this->_data['description']
					))
					->execute();
				
			return true;
		} 
		catch (Database_Exception $e) 
		{
			throw $e;
		}		
	}


	/**
	 * Adds multiple settings data to database
	 * The incoming array has to contain arrays with name and value pairs like
	 * $arr = array(
	 * 	0 => array(
	 * 		'name' => '',
	 * 		'value' => '',
	 *			'nice_name' => 'OPTIONAL',
	 * 		'description' => 'OPTIONAL'
	 * 	)
	 * )
	 * For the sake of simplicity this function uses the inner functions for saving
	 * 
	 * @param array The multiple key => value pairs to set
	 * @return boolean
	 */
	public function set_multi_data(Array $data)
	{
		if ( empty($data) )
		{
			return false;
		}
		
		try
		{
			Database::instance()->begin();
			
			$data = array_values($data);
			
			for ( $i = 0, $m = count($data); $i < $m; $i++ )
			{
				if ( is_array($data[$i]) && count( array_intersect(array('name', 'value'), array_keys($data[$i])) ) == 2 )
				{
					foreach ( $this->_table_columns as $column )
					{
						if ( array_key_exists($column, $data[$i]) )
						{
							$this->_data[$column] = $data[$i][$column];
						}
					}
					
					$this->save();
				}
			}
			
			Database::instance()->commit();
			
			return true;
		}
		catch(Database_Exception $e)
		{	
			Database::instance()->rollback();
			throw $e;
		}
	}

	/**
	 * Get a row from the table given by specific columns such as id, name, etc. and load it into the object.
	 * Example:
	 * load_by( array('name' => 'email_activation') );
	 *
	 * @param array Where clause by which to filter the table rows.
	 * @return object Returns the Model_Settings so it's chainable.
	 *
	 */
	public function load_by(Array $by)
	{
		$this->_data['is_loaded'] = false;
		
		$q = DB::select_array($this->_table_columns)
				->from($this->_table_name)
				->limit(1);
		
		if (! empty($by) )
		{
			foreach ($by as $key => $value)
			{
				$q = $q->where($key, '=', $value);
			}
		}
		
		$q = $q->execute();
		
		if ( $q->count() > 0 )
		{
			$r = $q->as_array();
			$r = $r[0];
			
			foreach ($r as $key => $value)
			{
				if ( array_key_exists($key, $this->_data) )
				{			
					$this->_data[$key] = $value;
				}
			}
			
			$this->_data['is_loaded'] = true;
		}
	
		return $this;
	}
	
	/**
	 * Deletes a loaded setting from DB
	 * @return boolean
	 */
	public function delete()
	{
		if ( !$this->_data['is_loaded'] )
		{
			return false;
		}
		
		try
		{
			$q = DB::query(Database::DELETE, 'DELETE FROM '.$this->_table_name.' WHERE id = :id')
					->param(':id', $this->_data['id'])
					->execute();
			
			$this->_data = array
			(
				'id' => null,
				'name' => null,
				'value' => null,
				
				'is_loaded' => false
			);
			
			return true;
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	public function return_errors()
	{
		return $this->_errors;
	}
		
	/**
	 * PHP Magic method for getting dynamic class properties
	 * Example:
	 * $settings = Model_Settings::factory();
	 * echo $settings->name;
	 * 
	 * @param string The key which must exist in $this->_data.
	 * @return string Returns the _data array item if exists.
	 */
	public function __get($key)
	{
		if ( array_key_exists($key, $this->_data) )
		{
			$value = html_entity_decode($this->_data[$key], ENT_QUOTES, Kohana::$charset);
			
			return $value;
		}
		
		throw new Model_Settings_Exception('Object property :key does not exist in :class', array(':key' => $key, ':class' => get_class($this)));
	}
	

	/**
	 * PHP Magic method for setting dynamic class properties
	 * Example:
	 * $settings = Model_Settings::factory();
	 * echo $settings->name = 'test';
	 * 
	 * @param string The key which must exist in $this->_data.
	 * @param string The value to which you want to set the data.
	 * @return void
	 */	
	public function __set($key, $value)
	{
		if ( array_key_exists($key, $this->_data) ) 
		{
			$value = Security::sanitize($value);
			Security::htmlpurifier()->purify($value);
			
			$this->_data[$key] = $value;
			return;
		}

		throw new Model_Settings_Exception('Object property :key does not exist in :class', array(':key' => $key, ':class' => get_class($this)));
	}
	
	
	/**
	 * PHP Magic method for verifying dynamic class properties.
	 *
	 * @return boolean True if exists, False is not.
	 *
	 */
	public function __isset($key)
	{
		return isset($this->_data[$key]);
	}
	
	
	/**
	 * Sleep method for serialization
	 *
	 * @return array
	 */
	public function __sleep()
	{
		// Store only information about the object without db property
		return array_diff(array_keys(get_object_vars($this)), array('_db'));
	}
}