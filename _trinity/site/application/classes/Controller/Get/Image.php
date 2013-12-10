<?php
/**
 * Controller for handling images, returning them for given elements
 */
class Controller_Get_Image extends Controller_Protected
{

	public function action_index()
	{
	}
	/**
	 * This action returns the image of a profile
	 */
	public function action_workorder()
	{
		// Get the query param
		$media_type = Security::sanitize($this->request->param('type'));
		
		// Get the object id from url
		$id = Security::sanitize($this->request->param('id'));	

		$img_size = Security::sanitize($this->request->query('size'));	
		
		// Load the model
		$m_media = new Model_Psmedia();
		
	//uncomment this when the placeholer image will be added  !!!!!!!!!!!!!!!!	
		
/*		$file = APPPATH.'media/profile_placeholder.png';
		$type = 'image/png';
		$size = filesize(APPPATH.'media/profile_placeholder.png');
		$name = 'profile_placeholder.png';		
*/		
		$file = null;
		$type = null;
		$size = null;
		$name = null;	
		
		
		// See if the id is ok
		if ( is_numeric($id) )
		{
			$data = $m_media->load_by( array('object_id' => $id, 'object_type' => $media_type) );

			$file_data = null;
			
			for ($i=0, $mi=count($data); $i<$mi; $i++)
			{
				$exploded_name = explode('_', $data[$i]['name']);

				if ( $exploded_name[1] == $img_size )
				{
					$file_data = $data[$i];
					break;
				}
			}
			
			if ($file_data !== null)
			{
				$file = APPPATH.'media'.$file_data['path'].'/'.$file_data['name'];
				$type = $file_data['type'];
				$size = filesize($file);
				$name = $file_data['name'];	
			}
			
		}
		
		header('Content-Type: '.$type);
		header('Content-Disposition: inline;filename="' .$name .'"');
		header('Content-Length: ' .$size);
		
		echo file_get_contents($file);
		exit;
	}
	
}