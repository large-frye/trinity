<?php

class View_Workorders_Report_Admin extends View_Workorders_Report
{
	public $data_pages = null;
	public $photo_pages = null;

	public function __construct($m_workorders = null, $m_inspection = null, $action = null, $part = null)
	{		
		parent::__construct($m_workorders, $m_inspection);	
		
		$this->_set_admin_variables();
		$this->_set_sidebar();
		
		if ( $action == 'generate_pdf' )
		{
			//$this->_generate_pdf();
			
			$this->_template = '';
			$this->_layout = 'workorders/reportpdf';			
			
			$this->_generate_images();
			
			if ($part == 'data')
			{
				$this->data_pages = true;
			}
			
			if ($part == 'photo')
			{
				$this->photo_pages = true;
			}			
		}		
	}
	
	protected function _set_admin_variables()
	{
		if ($this->workorder_data['inspection_status'] == 4)
		{
			$this->show_generate_pdf = true;
		}
		
		if ($this->workorder_data['is_generated_pdf'] == 1)
		{
			$this->show_send_pdf = true;
		}

		if ($this->workorder_data['generate_report_status'] == 'generating')
		{
			$this->show_send_pdf = false;
			$this->show_generate_pdf = false;
			$this->show_download_pdf = false;
			$this->show_generating_pdf = true;
		}

		if ($this->workorder_data['generate_report_status'] == 'error')
		{
			$this->show_generate_pdf = true;			
		}
		
		$this->generate_pdf_url = Route::url('admin', array('controller' => 'workorders', 'action' => 'generate', 'id' => $this->workorder_data['id']));
		$this->send_pdf_url = Route::url('admin', array('controller' => 'workorders', 'action' => 'sendreport', 'id' => $this->workorder_data['id']));
	}
	
	
	protected function _generate_images()
	{
		$this->logo_url = DOCROOT.'assets/gfx/logo.png';		
		
		$m_photos = new Model_Inspection_Photos($this->workorder_data['id']);
		
		$nr_skatches = 0;
		$set_end = false;
		for ( $i = 0, $mi = count($this->photos); $i < $mi; $i++ )
		{
			if ( $this->photos[$i]['is_sketch'] )
			{
				$nr_skatches++;
				$this->photos[$i]['filedata'] = $m_photos->get_photo($this->photos[$i]['filename'], 'o');
				$this->photos[$i]['filedata'] = $this->_rotate($this->photos[$i]['filedata']);
				
				$this->photos[$i]['big'] = true;
			}
			else
			{
				if ( !$set_end )
				{
					$this->photos[$i]['endsketches'] = true;
					$set_end = true;
				}
				$this->photos[$i]['filedata'] = $m_photos->get_photo($this->photos[$i]['report_filename'], 'r');
				
				if ( $nr_sketches%2 == 1 && $i%2 != 1 )
				{
					$this->photos[$i]['page_break'] = true;
				}
				
				if ( $nr_sketches%2 != 1 && $i%2 == 1 )
				{
					$this->photos[$i]['page_break'] = true;
				}
			}
			
			$this->photos[$i]['content'] = base64_encode($this->photos[$i]['filedata']['data']);		
		}
	}	
	
	protected function _set_sidebar()
	{
		$this->sidebar_links = array();
		
		$sublinks = array();
		
		if ( $this->show_generate_pdf )
		{
			$sublinks[] = array(
				'sub_url' => $this->generate_pdf_url,
				'sub_name' => 'Generate PDF Report'
			);
		}
		
		if ( $this->show_send_pdf )
		{
			$sublinks[] = array(
				'sub_url' => $this->send_pdf_url,
				'sub_name' => 'Send PDF Report'
			);
		}
		
		if ( $this->show_generating_pdf )
		{
			$sublinks[] = array(
				'sub_url' => '#',
				'sub_name' => 'Generating Report...'
			);
		}		
		
		$this->_partials = array(
			'sidebar' => 'protected/sidebar'
		);
		
		$this->has_sidebar = true;
		
		if ( $this->show_download_pdf() )
		{
			$date = '';
			
			if ( isset($this->workorder_data['last_generated']) )
			{
				$date = '<br>'.date('m/d/Y H:i');
			}	
		
			$sublinks[] = array(
				'sub_url' => $this->download_pdf_url,
				'sub_name' => 'Download Report'.$date
			);
		}
		
		$this->sidebar_links[] = array(
			'url' => '#',
			'name' => 'Report',
			'has_sublinks' => true,
			'current' => true,
			'sub_links' => $sublinks
		);
	}
	
	/**
	 * Check if width is larger than height and rotate if necessary
	 */
	private function _rotate($file_data)
	{	
		$file_data['data'] = rotateImage(imagecreatefromjpeg(MEDIAPATH .$this->workorder_data['id'] .'/'.$file_data['filename']), 90);
		
		return $file_data;
	}
}

function rotateImage($img, $rotation) {
	$width = imagesx($img);
	$height = imagesy($img);
	switch($rotation) 
	{
		case 90: $newimg= @imagecreatetruecolor($height , $width );break;
		case 180: $newimg= @imagecreatetruecolor($width , $height );break;
		case 270: $newimg= @imagecreatetruecolor($height , $width );break;
		case 0: return $img;break;
		case 360: return $img;break;
	}
	
	if($newimg) 
	{
		for($i = 0;$i < $width ; $i++) 
		{
			for($j = 0;$j < $height ; $j++) 
			{
				$reference = imagecolorat($img,$i,$j);
				switch($rotation) 
				{
					case 90: if(!@imagesetpixel($newimg, ($height - 1) - $j, $i, $reference )){return false;}break;
					case 180: if(!@imagesetpixel($newimg, $width - $i, ($height - 1) - $j, $reference )){return false;}break;
					case 270: if(!@imagesetpixel($newimg, $j, $width - $i, $reference )){return false;}break;
				}
			}
		}

		$output = '';

		ob_start();
		imagejpeg($newimg);
		$output =  ob_get_contents();
		ob_end_clean();
		imagedestroy($newimg);

		return $output;
	}
	return false;
}