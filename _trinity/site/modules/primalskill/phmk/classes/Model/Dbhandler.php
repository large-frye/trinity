<?php
/**
 * Model for handling the database updates
 * 
 * These updates are small alter table commands or whole database changes
 * The sql code can reference only to the current database, set in config
 * The possible sql errors will be put out so the user can see if there is any problem
 */
class Model_Dbhandler extends Kohana_Model_Database
{
	/**
	 * Check the updates folder and see if it is writable
	 */
	public function __construct()
	{
		if ( !is_writable(MODPATH.'primalskill/phmk/updates') )
		{
			if ( !file_exists(MODPATH.'primalskill/phmk/updates') )
			{
				mkdir(MODPATH.'primalskill/phmk/updates', 0777);
			}
			else
			{
				chmod(MODPATH.'primalskill/phmk/updates', 0777);
			}
		}
	}
	
	/**
	 * Function for creating an update file
	 *
	 * The update file has a timestamp that is used to sort these files
	 * @param string $name The name of the update file
	 * @param string $description This will hold the description like the reason of the change or the issue it belongs to
	 * @param string $sql This is the sql command that needs to be run
	 * @return bool True if ok, false if something goes wrong
	 */
	public function create_update($name = '', $description = '', $sql_up = '', $sql_down = '', $has_data = false)
	{
		// Validate the name and the sql code for empty strings
		if ( $name == '' || $sql_up == '' || $sql_down == '' )
		{
			return false;
		}
		
		// Create the array from the given parameters
		$update = array(
			'name' => $name,
			'description' => $description,
			'sql_up' => $sql_up,
			'sql_down' => $sql_down,
			'has_data' => $has_data,
			'date' => time()
		);
		
		try
		{
			$f = fopen(MODPATH.'primalskill/phmk/updates/update_'.time().'.php','w');

			fwrite($f, '<?php return '.var_export($update,true).'?>' );
			fclose($f);
			
			return true;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}
	
	/**
	 * This function returns the current update of the db on this system 
	 * @return string The filename
	 */
	public function get_current()
	{
		if ( file_exists(MODPATH.'primalskill/phmk/updates/current.php') )
		{
			$file = include(MODPATH.'primalskill/phmk/updates/current.php');
			
			return $file['name'];
		}
		else
		{
			return '';
		}	
	}
	
	/**
	 * This function is for getting data from a file - based on filename
	 * @param string $name The name of the file
	 * @return array Returns the data contained in the file
	 */
	public function get_file($name)
	{
		try
		{
			return include(MODPATH.'primalskill/phmk/updates/'.$name);
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}
	
	/**
	 * Function for reading the content of the updates folder - get only names
	 * @return array The array with the filenames
	 */
	public function get_updates()
	{
		try
		{
			// Scan the updates folder
			$updates = scandir(MODPATH.'primalskill/phmk/updates');
			
			// Add only updates
			$tmp = array();
			foreach( $updates as $file )
			{	
				if ( $file != '.' && $file != '..' && $file != '.gitignore' && $file != 'current.php' && strpos($file,'update_') !== false )
				{
					$tmp[] = $file;
				}
			}
			
			return $tmp;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}
	
	/**
	 * Function for setting the current update into the current php file
	 * @param string $name The name of the file that is currently installed
	 * @return bool
	 */
	public function set_current($name)
	{
		try
		{
			if ( file_exists(MODPATH.'phmk/updates/current.php') && !is_writable(MODPATH.'phmk/updates/current.php') )
			{
				chmod(MODPATH.'phmk/updates/current.php', 0777);
			}
			
			$f = fopen(MODPATH.'phmk/updates/current.php','w');
			fwrite($f, '<?php return array("name" => "'.$name.'") ?>' );
			fclose($f);
			
			return true;
		}
		catch(Exception $e)
		{
			throw $e;
		}
	}
	
	/**
	 * This is a custom function, not using Kohana's DB, because we need to be able to run huge sql scripts, too.
	 * 
	 * Uses mysqli and its multi_query
	 * @param string $query The query that needs to be run
	 * @return bool True on success and false if the query did not run.
	 */
	public function run_query($query)
	{
		$config_db = Kohana::$config->load('database')->get('default');
		$config_db = $config_db['connection'];
		
		$mysqli = new mysqli($config_db['hostname'], $config_db['username'], $config_db['password'], $config_db['database']);

		/* check connection */
		if (mysqli_connect_errno()) 
		{
			printf("Connect failed: %s\n", mysqli_connect_error());
			return false;
		}

		/* execute multi query */
		if ($mysqli->multi_query($query)) 
		{
			/* close connection */
			$mysqli->close();
			return true;
		}
		else
		{
			$mysqli->close();
			return false;
		}
	}
}