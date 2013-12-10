<?php

class File extends Kohana_File
{
	
	/**
	 * Get the real file type
	 * Currently supports the following file types: zip, jpeg, png, gif, swf, flv
	 * 
	 * @param string The file path (ex. /home/files/test.zip)
	 * @param string The file type (zip, gif, jpeg, png, gif)
	 * @return bool
	 */
	
	protected static $types = array
	(
		'zip' => array('format' => 'H8', 'marker' => '504b0304'),
		
		'jpeg' => array('format' => 'H4', 'marker' => 'ffd8'),
		'jpg' => array('format' => 'H4', 'marker' => 'ffd8'),
		
		'png' => array('format' => 'H32', 'marker' => '89504e470d0a1a0a0000000d49484452'),
		
		'gif' => array
		(
			0 => array('format' => 'H8', 'marker' => '47494638'),
			1 => array('format' => 'H12', 'marker' => '474946383761'),
			2 => array('format' => 'H12', 'marker' => '474946383961')
		),
		
		'swf' => array('format' => 'H6', 'marker' => '465753'),
		'flv' => array('format' => 'H8', 'marker' => '464C5601'),
		'mp3' => array('format' => 'H2', 'marker' => 'FF'),
		'mp4' => array('format' => 'H6', 'marker' => '000000'),
		'm4v' => array('format' => 'H6', 'marker' => '000000'),
		'pdf' => array('format' => 'H14', 'marker' => '255044462D312E')
	);
	
	public static function is_file_type($file = null, $type = null)
	{
		// Nothing to work with
		if ( ($file === null) || ($type === null) || (! isset(self::$types[$type])) )
		{
			return false;
		}

		$type = self::$types[$type];

		// Determine the bytes to read from the file		
		$bytes_to_read = 0;
		
		// We have multiple formats / markers for the same file type
		if ( isset($type[0]) )
		{
			for ($i=0, $mi=count($type); $i<$mi; $i++)
			{
				if ( $bytes_to_read < (strlen($type[$i]['marker']) / 2) )
				{
					$bytes_to_read = (strlen($type[$i]['marker']) / 2);
				}
			}
		}
		else
		{
			$bytes_to_read = (strlen($type['marker']) / 2);
		}
		
		// Open the file and read 16 bytes
		$fp = fopen($file, 'r');
		$data = fread($fp, $bytes_to_read);
		fclose($fp);
			
		// We have multiple formats / markers for the same file type
		if ( isset($type[0]) )
		{
			for ($i=0, $mi=count($type); $i<$mi; $i++)
			{
				$x = unpack($type[$i]['format'], $data);
				if ( (isset($x[1])) && ($x[1] == strtolower($type[$i]['marker'])) )
				{
					return true;
				}
			}
		}
		else
		{
			$x = unpack($type['format'], $data);			
			if ( (isset($x[1])) && ($x[1] == strtolower($type['marker'])) )
			{
				return true;
			}
		}

		return false;
	}
	
	
	/**
	 * File type validation like a boss.
	 *
	 * @param array The file array from the Validation object
	 * @param string The type to validate against (e.g. png, jpg, pdf)
	 * @return bool
	 *
	 */
	public static function valid_type(array $file, $type = null)
	{
		if ( (! isset($file['tmp_name'])) || ($type === null) ) { return false; }
		
		return self::is_file_type($file['tmp_name'], $type);
	}
}
