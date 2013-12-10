<?php

class Controller_Inspector_Get_Photos extends Controller_Protected
{
	/**
	 * @var array Variable holding the currently logged in user's data
	 */
	protected $_user = null;

	public function before()
	{
		parent::before();
		
		// Get the user model. (method has redirection)
		$this->_user = Auth::instance()->is_logged_in();
		
		if ( $this->_user != false && ! $this->_user->roles->has('inspector') )
		{
			Message::instance()->error(__('Not allowed.'));
			HTTP::redirect($this->_redirect_url);
		}		
	}
	
	/**
	 * Get the photo
	 */
	public function action_index()
	{
		$workorder_id = Security::sanitize($this->request->param('workorder_id'));
		$photo_id = Security::sanitize($this->request->param('photo_id'));
		$size = Security::sanitize($this->request->param('size'));
			
		$m_photos = new Model_Inspection_Photos($workorder_id);
		
		$photo = $m_photos->get_photo($photo_id, $size);

		if ($photo !== false)
		{
			$this->response->headers('Content-Type', $photo['mime']);
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
