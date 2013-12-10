<?php
/**
 * View model for handling static pages
 */
class View_Static extends View_Layout
{
	public $is_schedule_claim_page = false;
	public $is_homepage = false;
	
	public function __construct(Array $page)
	{
		$this->_template = $page['template'];
		
		if ( array_key_exists('title', $page) )
		{
			$this->title = $page['title'].' |';
		}
		
		if ( (array_key_exists('layout', $page)) && ($page['layout'] == 'schedule-claim') )
		{
			$this->is_schedule_claim_page = true;
			$this->is_homepage = true;
		}
		
		
	}
	
	/**
	 * Set the workorder submit url
	 */
	public function schedule_claim()
	{
		if ( !$this->is_logged_in() )
		{
			$redirect = Route::url('authentication', array('action' => 'login'));
		}
		else
		{
			$subdomain = 'www';
			$subdomains = array('admin', 'client', 'inspector', 'www');
			
			if ( $this->_user->roles->has('admin') )
			{
				$subdomain = 'admin';
				
				$url = str_replace('http://', '', Route::url('admin', array('controller' => 'workorders')));
			}
			
			if ( $this->_user->roles->has('client') )
			{
				$subdomain = 'client';
				
				$url = str_replace('http://', '', Route::url('client', array('controller' => 'workorder', 'action' => 'submit')));
			}

			
			
			if ( $this->_user->roles->has('inspector') )
			{
				$subdomain = 'inspector';
				
				$url = str_replace('http://', '', Route::url('inspector', array('controller' => 'inspections')));
			}		
			
			
			$exploded = explode('.', $url);
			
			if ( in_array($exploded[0], $subdomains) )	
			{
				$exploded[0] = $subdomain;
				$redirect = implode('.', $exploded);
			}
			else
			{
				$redirect = $subdomain.'.'.implode('.', $exploded);
			}
			
			$redirect = 'http://'.$redirect;
		}
		
		return $redirect;
	}
	
}