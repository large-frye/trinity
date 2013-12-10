<?php
/**
 * Activity Stream class for handling the activity on the site (only major ones)
 */
class Activity_Stream
{	
	/**
	 * @var Activity_Stream The instance for singleton pattern
	 */
	protected static $_instance = null;

	/**
	 * Singleton pattern
	 */
	public static function instance()
	{
		if ( self::$_instance == null )
		{
			self::$_instance = new Activity_Stream();
		}
		
		return self::$_instance;
	}
	
	/**
	 * @var string The name of teh table the class works with
	 */
	protected $_table_name = 'activity_stream';
	
	/**
	 * @var string The name of the users table
	 */
	protected $_users_table = 'auth_users';
	
	/**
	 * Constructor
	 * Creates the table if not exists
	 */
	public function __construct()
	{
		$sql = 'SHOW TABLES LIKE "'.$this->_table_name.'"';
		try
		{
			$q = DB::query(Database::SELECT, $sql)->execute();
			
			if ( $q->count() == 0  )
			{
				$create_table = 'CREATE TABLE '.$this->_table_name.' (
						`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
						`actor_id` INT(11) UNSIGNED NULL DEFAULT NULL,
						`verb` VARCHAR(150) NULL DEFAULT NULL,
						`object` VARCHAR(150) NULL DEFAULT NULL,
						`target_id` INT(11) UNSIGNED NULL DEFAULT NULL,
						`actor_string` VARCHAR(50) NULL DEFAULT NULL,
						`created_on_utc` DATETIME NULL DEFAULT NULL,
						PRIMARY KEY (`id`)
					)';
				
				$query = DB::query(Database::INSERT, $create_table)->execute();
			}
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	/**
	 * Adds an activity to DB
	 * @param int $actor_id The id of the actor (who does the action)
	 * @param string $verb The action done by the actor
	 * @param string $object The object the action is performed upon
	 * @param int $target_id The id of the target the action is done for
	 * @param string $actor_string If no actor id is present, actor string is taken instead
	 * @return boolean
	 */
	public function add($actor_id, $verb, $object, $target_id = null, $actor_string = null)
	{
		try
		{
			$q = DB::query(Database::INSERT, 'INSERT INTO activity_stream (actor_id, verb, object, target_id, actor_string, created_on_utc) VALUES (:actor_id, :verb, :object, :target_id, :actor_string, :created_on_utc)');
			
			$r = $q
				->param(':actor_id', $actor_id)
				->param(':verb', $verb)
				->param(':object', $object)
				->param(':target_id', $target_id)
				->param(':actor_string', $actor_string)
				->param(':created_on_utc', date('Y-m-d H:i:s'))
				->execute();
			
			return true;
		}
		catch(Database_Exception $e)
		{
			Log::instance()
			->add(Log::INFO, '[ Activity_Stream ] - error: '.$e->getMessage())
			->write();
		}
		
		return false;
	}
	
	
	/**
	 * Uses templates to to add an activity
	 * @param string $template The name of the template to use
	 * @param int $actor_id The actor id
	 * @param int $target_id The target id
	 * @param string $template_file Optional, the name of the config file to load the templates from
	 */
	public function template($template, $actor_id = null, $target_id = null, $template_file = 'activity_stream_template')
	{
		try
		{
			$conf = new Kohana_Config_File_Reader();
			$conf = $conf->load($template_file);
			
			if ( array_key_exists($template, $conf) )
			{
				$action = $conf[$template];
				return $this->add($actor_id,$action['verb'],$action['object'],$target_id,$action['actor_string']);
			}
			
			Log::instance()
				->add(Log::INFO, '[ Activity_Stream ] - error: Template does not exist')
				->write();
			
			return false;
		}
		catch(Exception $e)
		{
			Log::instance()
				->add(Log::INFO, '[ Activity_Stream ] - error: '.$e->getMessage())
				->write();
		}
         
	}
	
	/**
	 * Pagination compatible function that gets activity streams
	 * @param array $by Associative array with the parameters to laod the streams by
	 * @param int $limit Pagination limit
	 * @param int $offset Pagination offset
	 * @return array
	 */
	public function get_by(Array $by, $limit = null, $offset = null)
	{	
		$correct_keys = array('id', 'actor_id', 'target_id', 'actor_string', 'created_on_utc');
		
		// Build query
		$sql = 'SELECT as.*, u.username 
				FROM '.$this->_table_name.' as
				LEFT JOIN '.$this->_users_table.' u ON u.id = as.actor_id
				WHERE 1 = 1 ';
				
		foreach ( $by as $key => $value )
		{
			if ( in_array($key, $correct_keys) )
			{
				$sql .= ' AND '.$key.' = :'.$key;
			}
		}
		
		try
		{
			$q = DB::query(Database::SELECT, $sql);
			foreach ( $by as $key => $value )
			{
				if ( in_array($key, $correct_keys) )
				{
					$q->param(':'.$key, (string)$value);
				}
			}
			
			$q = $q->execute();
			
			if ( $q->count() > 0 )
			{
				return $q->as_array();
			}
			
			return array();
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	/**
	 * Used for pagination mainly,  gets the total number of streams by the given parameters
	 * @param array $by Associative array with the parameters to laod the streams by
	 * @return int
	 */
	public function get_total_by(Array $by)
	{
		$correct_keys = array('id', 'actor_id', 'target_id', 'actor_string', 'created_on_utc');
		
		// Build query
		$sql = 'SELECT COUNT(id) AS nr FROM '.$this->_table_name.' WHERE 1 = 1 ';
		foreach ( $by as $key => $value )
		{
			if ( in_array($key, $correct_keys) )
			{
				$sql .= ' AND '.$key.' = :'.$key;
			}
		}
		
		try
		{
			$q = DB::query(Database::SELECT, $sql);
			foreach ( $by as $key => $value )
			{
				if ( in_array($key, $correct_keys) )
				{
					$q->param(':'.$key, (string)$value);
				}
			}
			
			$q = $q->execute();
			
			return intval($q[0]['nr']);
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	/**
	 * Function for deleting activity stream entries older than 3 months
	 */
	public function flush_stream()
	{
		try
		{
			$q = DB::query(Database::DELETE,'DELETE FROM activity_stream WHERE DATE(created_on_utc) < :date')
					->param(':date',date('Y-m-d', strtotime('-3 months')))
					->execute('write');
		}
		catch(Database_Exception $e)
		{
			Log::instance()
				->add(Log::INFO, '[ Activity_Stream ] - error: '.$e->getMessage())
				->write();
		}
	}
}



