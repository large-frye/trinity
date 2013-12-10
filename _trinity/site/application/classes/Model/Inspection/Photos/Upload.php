<?php

class Model_Inspection_Photos_Upload extends Model_Inspection_Photos
{
	/**
	 * @var Data container, holds data regarding inspection photos
	 */
	private $_file = null;
	
	private $_error_status = false;
		
	private $_thumbnail_size = array(61, 61);
	
	private $_report_size = array(500, 300);
	
	public function __construct ( $workorder_id = null )
	{
		parent::__construct($workorder_id);
	}
		
	/**
	 * Set the post data to be processed
	 *
	 * @param array Files key/value pair. Usually from $_FILES.
	 * @return void
	 *
	 */
	public function set_data ( Array $files )
	{		
		$this->_file = $files;
		
		$this->_convert_data();
	}
	
	/**
	 * Convert it to a more rich format
	 *
	 * @return void
	 *
	 */
	private function _convert_data()
	{		
		for ( $i = 0, $mi = count($this->_file['name']); $i < $mi; $i++ )
		{
			array_push($this->_data, array(
			
				'name' => $this->_file['name'][$i],
				'tmp' => $this->_file['tmp_name'][$i],
				'mime' => $this->_file['type'][$i],
				'error' => $this->_file['error'][$i]	
				
			));
		}		
	}
		
	/**
	 * Processes the uploaded photos, this function doesn't save the photos just yet.
	 *
	 * @return void
	 *
	 */
	public function process_upload()
	{
		$this->_validate_upload();
		$this->_move_uploaded_files();
		$this->_save_uploads();
	}
	
	
	/**
	 * Validate the uploaded photos
	 *
	 * @return void
	 *
	 */
	private function _validate_upload()
	{
		if ( empty($this->_data) )
		{
			$this->_error_status = 'You need to upload at least one photo.';
			
			return false;
		}
		
		for ( $i = 0, $mi = count($this->_data); $i < $mi; $i++ )
		{
			// First check for PHP upload errors and convert them into strings
			if ( $this->_data[$i]['error'] != 0 )
			{
				$this->_data[$i]['error'] = 'File upload error. Please re-upload it.';
				continue;
			}
			
			
			// Validate the file
			if 
			(
				(! File::is_file_type($this->_data[$i]['tmp'], 'jpg'))
				&& (! File::is_file_type($this->_data[$i]['tmp'], 'gif'))
				&& (! File::is_file_type($this->_data[$i]['tmp'], 'png'))
			)
			{
				$this->_data[$i]['error'] = 'Invalid file. Photo must be JPG, GIF or PNG.';
				continue;
			}
			
			$this->_data[$i]['error'] = false;
		}
	}
	
	
	/**
	 * Move the uploaded files into our application folder
	 */
	private function _move_uploaded_files()
	{
		
		if (! is_dir(MEDIAPATH .$this->_workorder_id) )
		{
			mkdir(MEDIAPATH .$this->_workorder_id, 0755);
		}
		
		for ( $i = 0, $mi = count($this->_data); $i < $mi; $i++ )
		{
			if ( $this->_data[$i]['error'] !== false ) { continue; }
			
			$tmp_md5 = md5(date('ymdhis') .$this->_data[$i]['name']);
			
			if ( rename($this->_data[$i]['tmp'], MEDIAPATH .$this->_workorder_id .'/' .$tmp_md5) )
			{
				$this->_data[$i]['tmp'] = $tmp_md5;
				
				// Also create the thumbnail for the moved file
				$this->_create_thumbnail($i);	
				$this->_create_for_report($i);	
			}
			else
			{
				$this->_data[$i]['error'] = 'Error moving uploaded file. Please re-upload.';
			}
		}
	}
	
	
	/**
	 * Create a thumbnail for the photo
	 *
	 * @return void
	 *
	 */
	private function _create_thumbnail ( $data_index )
	{		
		$image = Image::factory( 
			MEDIAPATH .$this->_workorder_id .'/' .$this->_data[$data_index]['tmp'] 
		);
		
		$thumbnail_file = $this->_thumbnail_size[0] .'x' .$this->_thumbnail_size[1] .'_' .md5(date('ymdhis') .$this->_data[$data_index]['name']);
		
		$image
			->resize(
				$this->_thumbnail_size[0],
				$this->_thumbnail_size[1],
				Image::INVERSE
			)
			->crop(
				$this->_thumbnail_size[0],
				$this->_thumbnail_size[1]
			)
			->save(
				MEDIAPATH .$this->_workorder_id .'/' .$thumbnail_file
			);
		
		$this->_data[$data_index]['thumbnail'] = $thumbnail_file;
	}
	
	/**
	 * Create with a size for report
	 *
	 * @return void
	 *
	 */
	private function _create_for_report( $data_index )
	{		
		$image = Image::factory( 
			MEDIAPATH .$this->_workorder_id .'/' .$this->_data[$data_index]['tmp'] 
		);
		
		$report_file =  $this->_report_size[0].'x' .$this->_report_size[1] .'_' .md5(date('ymdhis') .$this->_data[$data_index]['name']);
		
		$image
			->resize(
				$this->_report_size[0],
				$this->_report_size[1],
				Image::INVERSE
			)
			->save(
				MEDIAPATH .$this->_workorder_id .'/' .$report_file
			);
		
		$this->_data[$data_index]['report'] = $report_file;
	}	
	
	
	/**
	 * Persist the temp data into a DB table 
	 *
	 * @return void
	 *
	 */
	private function _save_uploads()
	{
		try
		{
			$this->_sql = 'INSERT INTO 
							inspection_photos
							(
								workorder_id, 
								original_name,
								filename,
								thumbnail_filename,
								report_filename,
								mime,
								error
							) 
							VALUES 
							(
								:workorder_id ,
								:original_name ,
								:filename ,
								:thumbnail_filename ,
								:report_filename ,
								:mime ,
								:error
							);';
			
			$this->_q = DB::query(Database::INSERT, $this->_sql);
						
			for ( $i = 0, $mi = count($this->_data); $i < $mi; $i++ )
			{
				if (! array_key_exists('thumbnail', $this->_data[$i]) )
				{
					$this->_data[$i]['thumbnail'] = '';
				}

				if (! array_key_exists('report', $this->_data[$i]) )
				{
					$this->_data[$i]['report'] = '';
				}
				
				$this->_q
					->parameters(array(
						':workorder_id' => $this->_workorder_id,
						':original_name' => $this->_data[$i]['name'],
						':filename' => $this->_data[$i]['tmp'],
						':thumbnail_filename' => $this->_data[$i]['thumbnail'],
						':report_filename' => $this->_data[$i]['report'],
						':mime' => $this->_data[$i]['mime'],
						':error' => $this->_data[$i]['error'],
					))
					->execute();
			}			
		}
		catch(Database_Exception $db_e)
		{
			throw $db_e;
		}
	}
	
	/**
	 * Finalize step 2 of the upload process.
	 */
	public function finalize_upload($post)
	{
		$data = Security::sanitize($post['meta']);
		
		// Gather the batch of photo ids which is to be removed
		$to_remove = array();

		foreach ( $data as $photo_id => $value )
		{
			if ( (array_key_exists('action', $value)) && ($value['action'] == 'remove') )
			{
				array_push($to_remove, $photo_id);
				unset($data[$photo_id]);
			}
		}
		
		try 
		{
			$this->remove_photos($to_remove);
			$this->_save_photos_meta( $data );
		
			return true;
					
		}
		catch (Database_Exception $e) 
		{
			throw $e;
		}
	
	}
	
	private function _save_photos_meta ( $data )
	{
		$this->_sql = '
			UPDATE 
				inspection_photos

			SET
				description = :description ,
				category_id = :cat_id ,
				published = 1
			
			WHERE
				workorder_id = :workorder_id
				AND id = :id ;
		';
		
		$this->_q = DB::query(Database::UPDATE, $this->_sql);
		
		foreach ( $data as $photo_id => $value )
		{
			$this->_q
				->parameters(array(
					':workorder_id' => (int)$this->_workorder_id,
					':id' => $photo_id,
					':description' => $value['description'],
					':cat_id' => $value['cat_id']
					
				))
				->execute();
		}
	}
	
	/**
	 * Remove one or more photos
	 */
	public function remove_photos(Array $ids)
	{
		if (empty($ids)) { return false; }
		
		// Get the data of the photos
		$this->_sql = '
			SELECT
				filename,
				thumbnail_filename,
				report_filename,
				error
				
			FROM
				inspection_photos
			
			WHERE 
				id IN :ids
				AND workorder_id = :workorder_id ;
		';
		
		$this->_q = DB::query(Database::SELECT, $this->_sql)
						->parameters(array(
							':workorder_id' => $this->_workorder_id,
							':ids' => $ids
						))
						->execute();
				
		$to_remove_data = $this->_get_results();
		
		if ($to_remove_data === false) { return false; }
		
		for ( $i = 0, $mi = count($to_remove_data); $i < $mi; $i++ )
		{
			if ( (int) $to_remove_data[$i]['error'] == 0 )
			{
				if (is_file(MEDIAPATH .$this->_workorder_id .'/' .$to_remove_data[$i]['filename']))
				{
					unlink(MEDIAPATH .$this->_workorder_id .'/' .$to_remove_data[$i]['filename']);
				}
				
				if (is_file(MEDIAPATH .$this->_workorder_id .'/' .$to_remove_data[$i]['thumbnail_filename']))
				{
					unlink(MEDIAPATH .$this->_workorder_id .'/' .$to_remove_data[$i]['thumbnail_filename']);
				}
				
				if (is_file(MEDIAPATH .$this->_workorder_id .'/' .$to_remove_data[$i]['report_filename']))
				{
					unlink(MEDIAPATH .$this->_workorder_id .'/' .$to_remove_data[$i]['report_filename']);
				}				
			}
		}
		
		$this->_sql = '
			DELETE FROM 
				inspection_photos 
			WHERE 
				workorder_id = :workorder_id
				AND id IN :ids ;';
		
		$this->_r = DB::query(Database::DELETE, $this->_sql)
						->parameters(array(
							':workorder_id' => $this->_workorder_id,
							':ids' => $ids
						))
						->execute();
	}
	
	
	
}