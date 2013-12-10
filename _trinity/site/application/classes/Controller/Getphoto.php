<?php
/**
 * Controller for handling images, returning them for given elements
 */
class Controller_Getphoto extends Controller_Protected
{

	public function action_index()
	{
	}
	
	public function action_inspection()
	{
		$workorder_id = Security::sanitize($this->request->param('workorder_id'));
		$photo_id = Security::sanitize($this->request->param('photo_id'));
		$size = Security::sanitize($this->request->param('size'));
			
		$m_photos = new Model_Inspection_Photos($workorder_id);
		
		$photo = $m_photos->get_photo($photo_id, $size);

		if ($photo !== false)
		{
			$this->response->headers('Content-Type', $photo['mime']);
			$this->response->headers('Content-Disposition', 'inline;filename="' .$photo['filename'] .'"');
			$this->response->headers('Content-Length:', filesize($photo['data']));

			$this->response->send_headers();
			
			echo $photo['data'];			
		}
		else
		{
			$this->response->headers('Content-Type', 'image/gif');
			$this->response->send_headers();
			
			echo file_get_contents(MEDIAPATH .'61x61_placeholder.gif');
		}
		
		exit;	
	}
}