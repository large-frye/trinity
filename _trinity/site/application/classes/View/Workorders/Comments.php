<?php

class View_Workorders_Comments
{
	protected $_layout = 'workorders/comments';
	protected $_partials = array();
	
	public $errors = null;
	
	public $messages = null;
	
	public $csrf_token = null;
	
	public function __construct($messages = null, $errors = null, $post_url = null)
	{		
		$this->messages = Security::decode($messages);
		
		$this->_format_messages();
		
		$this->errors = $errors;
		
		$this->csrf_token = Security::CSRF_token();
		
		$this->post_url = $post_url;
		
	}	
	
	public function _format_messages()
	{
		for ($i=0, $mi=count($this->messages); $i<$mi; $i++)
		{
			$this->messages[$i]['date_time_utc'] = date('m-d-Y / H:i', strtotime($this->messages[$i]['date_time_utc']));
		}
	}
	
}