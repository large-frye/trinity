<?php
/**
 * Controller for handling pdf files, returning them for given elements
 */
class Controller_Get_Pdf extends Controller_Public
{

	public function action_index()
	{
	}
	/**
	 * This action returns the image of a profile
	 */
	public function action_workorder()
	{
		$file_name = null;
		
		// Get the object id from url
		$id = Security::sanitize($this->request->param('id'));	
		$type = Security::sanitize($this->request->param('type'));	
		
		$path = APPPATH.'media/inspections/'.$id;		
		
		if ( $type == 'report' )
		{
			$file_name = 'Report.pdf';
		}
		
		if ( $type == 'invoice' )
		{
			$file_name = 'invoice.pdf';
		}
		
		if ( $file_name == null ||  !file_exists($path.'/'.$file_name) )
		{
			throw new Kohana_HTTP_Exception_404('This doesn`t exists');
		}
		
		$filetype = filetype($path.'/'.$file_name);
		$filesize = filetype($path.'/'.$file_name);

		header("Cache-Control: public, must-revalidate");
		header("Pragma: hack");		
		header('Content-Type: '.$filetype.';charset=utf-8');
		header('Content-Disposition:attachment;filename="' .$file_name .'"');
		header('Content-Length: ' .$filesize);
		header("Content-Transfer-Encoding: binary\n");		
		
		echo file_get_contents($path.'/'.$file_name);
		exit;
	}
}