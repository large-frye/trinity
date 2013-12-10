<?php
/**
 * Media model for handling media uploads, like pictures, text files, etc
 */
class Model_Psmedia extends Kohana_Model
{
	public $_media_table = 'psmedia';
	
	/**
	 * @var array A grouping of extensions by media type
	 */
	protected $_media_types = array(
		'image' => array('jpg', 'png', 'gif'),
		'text' => array('txt', 'doc', 'docx', 'pdf', 'rtf')
	);
	
	/**
	 * @var array Holds the file we need to work with
	 */
	private $_file = array();
	
	/**
	 * @var string The base type of file that is handled
	 */
	private $_type = 'image';
	
	/**
	 * @var array Holds any errors that occure during file handling
	 */
	private $_errors = array();
	
	/**
	 * @var array Holds the settings like image size, upload limit, etc
	 */
	private $_settings = array(
		'max_upload_size' => '5M', // This is the upper limit for a file size
		'sizes' => array(
			'normal' => array('width' => 120, 'height' => 120)
		) // Can set image sizes, if more given, the image will be cropped to every size, the "normal" size will be the validation size
	);
	
	/**
	 * The constructor
	 * Will create a table called psmedia if it does not exist already
	 * Also creates the media folder under APPPATH if that does not exist, this will be the base path
	 */
	public function __construct($table_name = 'psmedia')
	{
		if ( $table_name != '' )
		{
			$this->_media_table = ''.$table_name;
		}
		
		if ( !file_exists(APPPATH.'media') )
		{
			mkdir(APPPATH.'media', 0755);
		}
		
		$sql = 'SHOW TABLES LIKE "'.$this->_media_table.'"';
		try
		{
			$q = DB::query(Database::SELECT, $sql)->execute();
			
			if ( $q->count() == 0  )
			{
				$create_table = 'CREATE TABLE '.$this->_media_table.' (
						`id` INT UNSIGNED NULL AUTO_INCREMENT,
						`object_id` INT UNSIGNED NULL,
						`object_type` VARCHAR(250) NULL,
						`name` VARCHAR(250) NULL,
						`type` VARCHAR(60) NULL,
						`size` FLOAT UNSIGNED NULL,
						`path` TEXT NULL,
						`meta` TEXT NULL,
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
	 * Function for validating the uploaded file
	 * @param array $file The single file from the FILES array
	 * @param string $type The type of the uploaded file to validate against
	 * @param array $settings OPTIONAL an array with settings we want to modify
	 * @return boolean
	 */
	public function validate($file = array(), $type = 'image', $settings = array())
	{
		// See if there are settings provided and get them to the local settings
		if ( !empty($settings) )
		{
			foreach ( $this->_settings as $key => $value )
			{
				if ( array_key_exists($key, $settings) )
				{
					$this->_settings[$key] = $settings[$key];
				}
			}
		}
		
		// We check if the uploaded file has everything needed
		$val = Validation::factory(array('file' => $file))
				->rule('file', 'Upload::valid')
				->rule('file', 'Upload::size', array(':value', $this->_settings['max_upload_size']));
		
		if ( !$val->check() )
		{
			$this->_errors = $val->errors('file_validation');
			return false;
		}
		
		// Check if type of file is ok
		$type_check = false;
		if ( array_key_exists($type, $this->_media_types) )
		{
			foreach ( $this->_media_types[$type] as $t )
			{
				if ( $type == 'image' )
				{
					if ( File::is_file_type($file['tmp_name'], $t) )
					{
						$type_check = true;
						break;
					}
				}
				else
				{
					$parts = explode('.', $file['name']);
					if ( $parts[count($parts) -1] == $t )
					{
						$type_check = true;
						break;
					}
				}
			}
		}
		
		if ( !$type_check )
		{
			$this->_errors['type'] = __('The type of the file is incorrect.');
			return false;
		}
		
		// If we have an image, we check the size
		if ( $type == 'image' )
		{
			if ( !array_key_exists('normal', $this->_settings['sizes']) || !array_key_exists('width', $this->_settings['sizes']['normal']) || !array_key_exists('height', $this->_settings['sizes']['normal']) )
			{
				$this->_errors['size'] = __('No size set for relevance');
				return false;
			}
			
			$width = $this->_settings['sizes']['normal']['width'];
			$height = $this->_settings['sizes']['normal']['height'];
			
			$image = Image::factory($file['tmp_name']);
		
			if ( $image->width < $width || $image->height < $height )
			{
				$this->_errors['size'] = __('The size of the photo has to be at least').' '.$width.'x'.$height;
				return false;
			}
		}
		
		// If the file is ok, we pass it to the local variable
		$this->_file = $file;
		$this->_type = $type;
		
		return true;
	}
	
	/**
	 * Saves the file into the system and also into the table
	 * @param int $object_id The id of the object to link the media to - Optional 
	 * @param string $object_type The type of the object we link the media to - Optional, but if $object_id is set, this also needs to be set
	 * @param string $path Optional, can be a relative path that will come after APPPATH/media
	 * @param mixed $meta This can be anything that can be serialized and encoded
	 * @return boolean
	 */
	public function save($object_id = null, $object_type = '', $path = '', $meta = array())
	{
		if ( empty($this->_file) )
		{
			throw new Kohana_Exception('Incoming data was not validated');
		}
		
		if ( $object_id != null )
		{
			if ( !is_numeric($object_id) || $object_type == '' )
			{
				throw new Kohana_Exception('Inconsistent object data. Please provide both object ID and object type');
			}
		}
		
		$object_id = (int)$object_id;
		$object_type = ''.$object_type;
		
		// Start with creating the folder structure if that does not exist
		$path = str_replace('\\','/', $path);
		$folders = explode('/', $path);
		
		$base = APPPATH.'media';
		foreach ( $folders as $folder )
		{
			if ( !file_exists($base.'/'.$folder) )
			{
				mkdir($base.'/'.$folder, 0755);
			}
			$base .= '/'.$folder;
		}
		
		// Initialize the database query
		$size = 0;
		$filename = '';
		$type = $this->_file['type'];
		$extra = base64_encode(serialize($meta));
		
		$sql = 'INSERT INTO '.$this->_media_table.'(object_id, object_type, name, path, size, type, meta) VALUES(:object_id, :object_type, :name, :path, :size, :type, :meta)';
				
		$q = DB::query(Database::INSERT, $sql)
				->bind(':object_id', $object_id)
				->bind(':object_type', $object_type)
				->bind(':name', $filename)
				->bind(':path', $path)
				->bind(':size', $size)
				->bind(':type', $type)
				->bind(':meta', $extra);
		
		// Differenciate image handling from other media types
		if ( $this->_type == 'image' )
		{
			try
			{
				Database::instance()->begin();
				
				// Save original first
				$base_filename = time().'_'.$this->_file['name'];
				
				$image = Image::factory($this->_file['tmp_name']);
				$filename = 'original_'.$base_filename;
				$image->save($base.'/'.$filename);
				$size = filesize($base.'/'.$filename);
				$q->execute();
				
				// Now save all the sizes cropped
				foreach( $this->_settings['sizes'] as $key => $size )
				{
					$image = Image::factory($this->_file['tmp_name']);
					
					$filename = $size['width'].'x'.$size['height'].'_'.$key.'_'.$base_filename;
					
					$image->resize($size['width'],$size['height'], Image::INVERSE)
							->crop($size['width'],$size['height'])
							->save($base.'/'.$filename);
					
					$size = filesize($base.'/'.$filename);
					$q->execute();
				}
				
				Database::instance()->commit();
			}
			catch(Exception $e)
			{
				Database::instance()->rollback();
				throw $e;
			}
		}
		else
		{
			try
			{
				Database::instance()->begin();
				
				$filename = time().'_'.$this->_file['name'];
				
				if ( !move_uploaded_file($this->_file['tmp_name'], $base.'/'.$filename) )
				{
					@copy($this->_file['tmp_name'], $base.'/'.$filename);
				}
				$size = filesize($base.'/'.$filename);
				$q->execute();
				
				Database::instance()->commit();
			}
			catch(Exception $e)
			{
				Database::instance()->rollback();
				throw $e;
			}
		}
		
		return true;
	}
	
	/**
	 * Function for loading media
	 * Can load one or more elements based on more things
	 * Things media can be loaded by:
	 * - array('object_id' => 0, 'object_type' => '')
	 * - array('id' => 0)
	 * - array('name' => '')
	 * - array('path' => '')
	 * - array('type' => '')
	 * @param array $by An associative array with params to laod the media by
	 * @return array
	 */
	public function load_by(Array $by)
	{
		if ( empty($by) )
		{
			throw new Kohana_Exception('Parameter array cannot be empty');
		}
		
		$correct_keys = array('object_id', 'object_type', 'id', 'name', 'path', 'type');
		
		// Build query
		$sql = 'SELECT * FROM '.$this->_media_table.' WHERE 1 = 1 ';
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
					$q->param(':'.$key, $value);
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
	 * Deletes media by a given parameter
	 * The params can be the following: path, media_id, object_id, object_type(used together with object_id), name
	 * If "all" is passed as an array key along with a path, everything in that folder will be deleted - this can be used for rollbacks and cleanups
	 * @param array $by
	 * @return boolean
	 */
	public function delete_by(Array $by)
	{	
		if ( in_array('all', array_keys($by)) )
		{
			if ( !in_array('path', array_keys($by)) )
			{
				$this->_errors['params'] = __('A path has to be provided for cleanup');
				return false;
			}
			
			try
			{
				$temp = scandir(APPPATH.'media/'.$by['path']);
				
				foreach( $temp as $file )
				{
					if ( $file != '.' && $file != '..' )
					{
						@unlink(APPPATH.'media/'.$by['path'].'/'.$file);
					}
				}
				
				$sql = 'DELETE FROM '.$this->_media_table.' WHERE path = :path';
				$q = DB::query(Database::DELETE, $sql)
						->param(':path', $by['path'])
						->execute();
				
				return true;
			}
			catch(Exception $e)
			{
				throw $e;
			}
		}
		
		$for_delete = array();
		// We load the elements from db first
		try
		{
			$for_delete = $this->load_by($by);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
		$delete_ids = array(0);
		for ( $i = 0, $max = count($for_delete); $i < $max; $i++ )
		{
			@unlink(APPPATH.'media/'.$for_delete[$i]['path'].'/'.$for_delete[$i]['name']);
			$delete_ids[] = $for_delete[$i]['id'];
		}
		
		try
		{
			$sql = 'DELETE FROM '.$this->_media_table.' WHERE id IN ('.implode(',', $delete_ids).')';
			$q = DB::query(Database::DELETE, $sql)->execute();
			
			return true;
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
		
		return false;
	}
	
	public function return_errors()
	{
		return $this->_errors;
	}
}