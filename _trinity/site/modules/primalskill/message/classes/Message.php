<?php

/**
 * Simple messaging class which handles multiple types os messages (info, error), putting in multiple groups.
 *
 * @author Primal Skill
 * @copyright (c) 2011
 * @version 3.5
 */
class Message
{	
	/**
	 * @var array The queue which holds all the messages, grouped together
	 *
	 * Example:
	 * (Global is the default group, if no group was set when the message was added)
	 * $_queue = array
	 * (
	 * 		'global' => array
	 *		(
	 *			'error' => array(0 => 'message1', 1 => 'message2'),
	 *			'info' => array(0 => 'message1', 1 => 'message2')
	 * 		),
	 *		'group1' => array
	 *		(
	 *			'error' => array(0 => 'message1', 1 => 'message2'),
	 *			'info' => array(0 => 'message1', 1 => 'message2')
	 *		)
	 * );
	 *
	 */
	protected $_queue = null;
	
	
	/**
	 * Singleton pattern for the class
	 *
	 * @return object The class object
	 *
	 */
	protected static $_instance = null;
	public static function instance()
	{
		if ( Message::$_instance === null ) { Message::$_instance = new Message(); }
		return Message::$_instance;
	}
	
	
	/**
	 * Class constructor, which gets the notifications session.
	 *
	 * @return none
	 *
	 */
	protected function __construct()
	{
		$this->_queue = Session::instance()->get('notifications');
		
		if ( $this->_queue === null )
		{
			$this->_queue = array('global' => array());
		}		
	}


	/**
	 * PHP 5.3+ function
	 * Allows the creation of notices using the short syntax: `Message::error('message', 'group1');`
	 * 
	 * @param string $method Method name (ex. error, warning, info)
	 * @param array $args Method arguments ([0] - message, [1] - group)
	 * @return boolean
	 */
	public function __call($method, $args)
	{
		// No message was set, move along, nothing to see here.
		if (! isset($args[0]) ) { return false; }
				
		// Select the group in which to add the message.
		$cur_group = 'global';
		
		// If a group is set, use that to add the message, instead of the 'global' group.
		if ( isset($args[1]) ) { $cur_group =& $args[1]; }
		
		// Check if the group exists in the queue
		if (! array_key_exists($cur_group, $this->_queue) )
		{
			$this->_queue[$cur_group] = array();
		}
		
		// Check if the method already exists in the queue under the current group.
		if (! array_key_exists($method, $this->_queue[$cur_group]) )
		{
			$this->_queue[$cur_group][$method] = array();						
		}
		
		array_push($this->_queue[$cur_group][$method], $args[0]);
		
		Session::instance()->set('notifications', $this->_queue);
		
		// Make it chainable
		return $this;
	}
		
			
	/**
	 * Get a message queue, either a group or the whole queue.
	 *
	 * @param string The group's name.
	 * @param string The method (e.g. info, warning, error).
	 * @return array|null Return the queue for that specific group or null if nothing was found.
	 *
	 */
	public function get($group = null, $method = null)
	{
		// Check if the queue is empty or not
		if ( empty($this->_queue) ) { return null; }

		// Select group to work with
		$cur_group = 'global';
		if ( ($group !== null) && (array_key_exists($group, $this->_queue)) ) 
		{
			$cur_group =& $group; 
		}

		// Send back the group if method is not set
		if ( $method === null )
		{
			if ( array_key_exists($cur_group, $this->_queue) )
			{
				$r = $this->_queue[$cur_group];
				unset($this->_queue[$cur_group]);

				Session::instance()->set('notifications', $this->_queue);				
			}
			else
			{
				$r = null;
			}
						
			return $r;
		}

		// Explicitly send back null if the method was set, but not found in the queue
		if ( ($method !== null) && (! array_key_exists($method, $this->_queue[$cur_group])) )
		{
			return null;
		}

		$r = $this->_queue[$cur_group][$method];
		unset($this->_queue[$cur_group][$method]);
		
		Session::instance()->set('notifications', $this->_queue);
		
		return $r;
	}
	
	/**
	 * Get a message queue, either a group or the whole queue and return a flat index array.
	 *
	 * @param string The group's name.
	 * @param string The method (e.g. info, warning, error).
	 * @return array|null Return the queue for that specific group or null if nothing was found.
	 *
	 */
	public function get_flat($group = null, $method = null)
	{
		$data = $this->get($group, $method);
		if ( $data === null ) { return null; }
		
		$tmp = array();
		
		foreach($data as $key => $value)
		{
			for ($i=0, $mi=count($value); $i<$mi; $i++)
			{
				array_push($tmp, array(
					'message_type' => $key,
					'message_content' => $value[$i]
				));
			}
		}
		
		unset($data);
		
		return $tmp;
	}
}
