<?php

class Email
{	
	protected $_config;
	
	protected $_transport;
	protected $_mailer;
	
	protected $_subject = 'No Subject';
	protected $_message = '';
	protected $_message_type = '';
	
	protected $_recipients = null;
	protected $_failed_recipients = null;
	
	protected $_attachment = '';
	
	protected $_from = null;
	
	static $_instances;
	
	//singleton pattern	
	public static function instance($_name = 'email', $_default_config = 'default')
	{		
		if (! isset($_instances[$_name]))
		{
			$_instances[$_name] = new Email($_default_config);			
		}

		return $_instances[$_name];
	}
	
	protected function __construct($_default_config = 'default')
	{		
		// We can pass an array as a config file 
		if (! is_array($_default_config) )
		{
			$this->_config = new Kohana_Config_File_Reader();
			$this->_config = $this->_config->load('email');
			$this->_config = $this->_config[$_default_config];			
		}
		else
		{
			$this->_config = $_default_config;			
		}
		
		// Set from, if exists
		if ( isset($this->_config['outgoing']['from']) )
		{
			$this->set_from($this->_config['outgoing']['from']);
		}
		
		// Load SwiftMailer if it's not already loaded
		if ( ! class_exists('Swift_Mailer', FALSE))
		{
			require Kohana::find_file('vendor', 'swift/swift_required');
		}		
	}
	
	public function set_from($from)
	{
		$this->_from = $from;
	}

	public function set_subject($subj)
	{
		$this->_subject = $subj;
	}
	
	public function set_message($msg, $type = 'text/html')
	{
		$this->_message = $msg;
		$this->set_type($type);
	}
	
	public function set_type($mime_type)
	{
		$this->_message_type = $mime_type;
	}
	
	public function set_recipients($to)
	{
		$this->_recipients = $to;
	}
	
	public function set_attachment($attachment_url)
	{
		$this->_attachment = $attachment_url;
	}

	public function can_connect()
	{
		try
		{
			$this->_connect();
		}
		catch (Exception $e)
		{
			return false;
		}
	
		return true;		
	}

	protected function _connect()
	{
		try
		{
			$this->_transport = Swift_SmtpTransport::newInstance($this->_config['outgoing']['host'], $this->_config['outgoing']['port'])
				->setUsername($this->_config['outgoing']['username'])
				->setPassword($this->_config['outgoing']['password'])
				->setTimeout(5);
				
			if (! empty($this->_config['outgoing']['type']))
			{
				$this->_transport->setEncryption($this->_config['outgoing']['type']);
			}
			
			$this->_transport->start();			
		}
		catch (Exception $e)
		{
			$this->_disconnect();
			throw $e;
		}
	}
	
	protected function _disconnect()
	{
		if ( is_object($this->_transport) )
		{
			$this->_transport->stop();
		}
	}

	public function send()
	{
		if ( empty($this->_message) )
		{
			throw new Email_Exception('Message is not specified.');
		}
		if ( empty($this->_recipients) )
		{
			throw new Email_Exception('You need to set at least one recipient.');
		}

		try
		{
			$this->_connect();
			
			$mailer = Swift_Mailer::newInstance($this->_transport);

			$message = Swift_Message::newInstance($this->_subject, $this->_message, $this->_message_type, 'utf-8')
				->setFrom($this->_from)
				->setTo($this->_recipients);
			
			if ( $this->_attachment != '' )
			{
				$parts = explode('/', $this->_attachment);

				$message->attach(Swift_Attachment::fromPath($this->_attachment)->setFilename($parts[count($parts)-1]));
			}
			
				$result = $mailer->send($message, $this->_failed_recipients);

			// All emails were sent
			if ( $result == count($this->_recipients) )
			{
				$this->_disconnect();
				return true;
			}
			else
			{
				$this->_disconnect();
				return false;
			}
		}
		catch (Exception $e)
		{
			throw $e;
		}	
	}	
}