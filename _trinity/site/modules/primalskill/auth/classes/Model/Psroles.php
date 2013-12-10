<?php
/**
 * Model for handling auth permissions and roles, also the mapping between them
 */
abstract class Model_Psroles extends Kohana_Model
{
	public $_permissions_table = 'auth_permissions';
	public $_roles_table = 'auth_roles';
	public $_users_table = 'auth_users';
	public $_roles_users_table = 'auth_roles_users';
	public $_roles_permissions_table = 'auth_roles_permissions';
	
	const DRIVER_PERMISSION = 1;
	const DRIVER_ROLE = 2;
	const DRIVER_USER = 3;
	
	
	/**
	 * @var array Holds the post data after validation
	 */
	protected $_post_data = array();
	
	/**
	 * @var array Errors occuring during data processing
	 */
	protected $_errors = array();
	
	/**
	 * @var array Holds the role or permission data upon edit
	 */
	protected $_data = array();
	
	/**
	 * @var array The valid columns in the table called by the driver
	 */
	protected $_valid_columns = array();
	
	/**
	 * @var string The table set by the driver
	 */
	protected $_main_table = '';
	
	/**
	 * @var string The mapping table used by the driver
	 */
	protected $_mapping_table = '';
	
	protected $_slug_required = '';
	
	public static function factory($driver = Model_Psroles::DRIVER_ROLE)
	{
		switch($driver)
		{
			case self::DRIVER_ROLE:
				return new Model_Psroles_Role();
			case self::DRIVER_PERMISSION: 
				return new Model_Psroles_Permission();
			case self::DRIVER_USER: 
				return new Model_Psroles_User();
			default:
				return new Model_Psroles_Role();
		}
	}
	
	/**
	 * Loads permissions or roles by given parameters
	 * @param array $by Associative array with column name and value
	 * @param string $from Decides from where to get the values - can be permissions, roles or users
	 * @return array
	 */
	public function load_values_by(Array $by)
	{
		try
		{
			$sql = 'SELECT * FROM '.$this->_main_table.' WHERE 1 = 1 ';
			foreach( $by as $key => $value )
			{
				if ( in_array($key, $this->_valid_columns) )
				{
					$sql .= ' AND '.$key.' = :'.$key;
				}
			}
			
			$query = DB::query(Database::SELECT, $sql);
			foreach( $by as $key => $value )
			{
				if ( in_array($key, $this->_valid_columns) )
				{
					$query->param(':'.$key, $value);
				}
			}
			
			$query = $query->execute();
			
			if ( $query->count() > 0 )
			{
				$result = $query->as_array();
				
				$this->_data = $result[0];
				
				return $result;
			}
			
			return array();
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	/**
	 * Inserts or updates incoming values into DB
	 * @param string $type Decides the table in which we work
	 * @return boolean
	 */
	public function save()
	{
		$data = array();
		
		foreach( $this->_valid_columns as $column )
		{
			if ( $column != 'id' )
			{
				$data[$column] = (array_key_exists($column, $this->_post_data))? $this->_post_data[$column] : null;
			}
		}
		
		if ( empty($this->_data) )
		{
			try
			{
				$q = DB::insert($this->_main_table, array_keys($data))->values(array_values($data))->execute();
				return true;
			}
			catch(Database_Exception $db_e)
			{
				throw $db_e;
			}
		}
		else
		{
			try
			{
				$q = DB::update($this->_main_table)->set($data)
						->where('id', '=', $this->_data['id'])
						->execute();
				return true;
			}
			catch(Database_Exception $db_e)
			{
				throw $db_e;
			}
		}
		
	}
	
	/**
	 * Generate slug that will be unique
	 * Works for roles and permissions
	 * @param string $str The code or variable to create the slug for
	 * @param string $type The type of the variable to create the slug for
	 * @return string
	 */
	protected function generate_slug($str)	
	{
		$str = strtolower(trim($str));
		$str = preg_replace('/[^a-z0-9-]/', '-', $str);
		$str = preg_replace('/-+/', "-", $str);
		
		try
		{
			if ( !array_key_exists($this->_slug_required, $this->_data) || ( array_key_exists($this->_slug_required, $this->_data) && $this->_data[$this->_slug_required] != $str ) )
			{
				$unique = false;
				$i = 0;
				$chk_slug = $str;
				while( !$unique )
				{
					$q = DB::query(Database::SELECT, 'SELECT * FROM '.$this->_main_table.' WHERE '.$this->_slug_required.' = :slug')
							->param(':slug', $chk_slug)
							->execute();
					
					if ( $q->count() > 0 )
					{
						$chk_slug = $str.'-'.$i;
					}
					else
					{
						$unique = true;
						$str = $chk_slug;
					}
					
					$i++;
				}
			}
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
		
		return $str;
	}
	
	public function return_errors()
	{
		return $this->_errors;
	}
}