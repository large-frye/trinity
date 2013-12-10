<?php

class View_Layout
{
	protected $_layout = 'layout/core';

	protected $_template = '';
	protected $_partials = array();		
	
	public $status_messages = null;
	
	/**
	 * Get the status messages (defaults to 'global' message group)
	 *
	 * @return array The messages array for the global message group
	 *
	 */
	public function is_alert()
	{
		if ( $this->status_messages === null )
		{
			$this->status_messages = Message::instance()->get_flat();
		}
		
		return (bool) $this->status_messages;
	}
	
}