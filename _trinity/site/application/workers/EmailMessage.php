<?php

require_once(realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR.'../../public_html/worker_index.php');

class EmailMessage
{
	public function run($job, &$log)
	{
		Log::instance()
			->add(Log::INFO, '[ Worker - email_message() ] - serving load')
			->write();
		
		$data = json_decode($job->workload(), true);
		
		try
		{
			$e = Email::instance('email');	
				
			$e->set_subject($data['subject']);
			$e->set_message($data['message']);
			$e->set_recipients($data['email']);
			
			if ( array_key_exists('attachment', $data) && file_exists($data['attachment']) )
			{
				$e->set_attachment($data['attachment']);
			}
			
			$e->send();	
			
			Log::instance()
				->add(Log::INFO, '[ Worker - email_message() ] - load served')
				->write();
			
			$log[] = 'load served';
		}
		catch(Exception $e)
		{
			Log::instance()
				->add(Log::INFO, '[ Worker - email_message() ] - error: '.$e->getMessage())
				->write();
		}
		
		return true;
	}
}