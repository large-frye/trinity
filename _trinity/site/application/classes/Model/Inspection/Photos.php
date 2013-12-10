<?php

class Model_Inspection_Photos extends Model_Core
{
	protected $_data = array();
	protected $_workorder_id = null;
	
	
	public function __construct ( $workorder_id = null )
	{			
		$this->_workorder_id = $workorder_id;
	}
	

	public function get_data()
	{
		$this->_sql = 'SELECT * 
					   FROM
							inspection_photos
					   WHERE
							workorder_id = :workorder_id ;';
		
		$this->_q = DB::query(Database::SELECT, $this->_sql)
						->param(':workorder_id', $this->_workorder_id)
						->execute();
		
		
		return $this->_get_results();
	}

	public function get_published_data()
	{
		$this->_sql = 'SELECT p.*, (c.slug = "sketch") AS is_sketch
					   FROM
							inspection_photos p
						LEFT JOIN categories c ON p.category_id = c.id	
					   WHERE
							p.workorder_id = :workorder_id 
							AND p.published = 1
						ORDER BY
							is_sketch DESC';
		
		$this->_q = DB::query(Database::SELECT, $this->_sql)
						->param(':workorder_id', $this->_workorder_id)
						->execute();
		
		return $this->_get_results();
	}

	public function get_unpublished_data()
	{
		$this->_sql = 'SELECT * 
					   FROM
							inspection_photos
					   WHERE
							workorder_id = :workorder_id 
							AND published = 0;';
		
		$this->_q = DB::query(Database::SELECT, $this->_sql)
						->param(':workorder_id', $this->_workorder_id)
						->execute();
		
		
		return $this->_get_results();
	}
	
	
	public function get_photo($photo_id, $size)
	{	
		switch ($size)
		{
			case 't':
			{
				$this->_sql = 'SELECT 
									thumbnail_filename AS filename,
									mime
							   FROM 
									inspection_photos

							   WHERE
									workorder_id = :workorder_id
									AND thumbnail_filename = :photo_id

							   LIMIT 1;';
				break;
			}
			case 'o':
			{
				$this->_sql = 'SELECT 
									filename,
									mime
							   FROM 
									inspection_photos

							   WHERE
									workorder_id = :workorder_id
									AND filename = :photo_id

							   LIMIT 1;';
				break;
			}
			case 'r':
			{
				$this->_sql = 'SELECT 
									report_filename AS filename,
									mime
							   FROM 
									inspection_photos

							   WHERE
									workorder_id = :workorder_id
									AND report_filename = :photo_id

							   LIMIT 1;';
				break;
			}			
		}
				
				
		$this->_q = DB::query(Database::SELECT, $this->_sql)
						->param(':workorder_id', $this->_workorder_id)
						->param(':photo_id', $photo_id);
		

		$this->_q = $this->_q->execute();
		$this->_get_results();
		

		if ( $this->_r === false ) { return false; }
		
		$file = MEDIAPATH .$this->_workorder_id .'/' .$this->_r[0]['filename'];
		
		if (! is_file($file) ) { return false; }

		$this->_r[0]['data'] = file_get_contents($file);
		
		return $this->_r[0];
	}
	
}