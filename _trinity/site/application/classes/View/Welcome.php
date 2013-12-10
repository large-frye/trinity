<?php

class View_Welcome extends View_Layout
{
	/**
	 * @var string Url to workorder submission
	 */
	public $workorder_submit_url = '';
	
	public $is_homepage = true;
	
	public function __construct()
	{		
		$this->_template = 'public/welcome';
		
		$this->_partials = array(
			'sidebar' => 'public/sidebar'
		);
		
		$this->_user = Auth::instance()->is_logged_in();
		
		$link = '/login';
		if ( $this->_user !== false )
		{
			$link = $this->_set_redirect();
			
			if ( $this->_user->roles->has('client') )
			{
				$link .= 'workorder/submit';
			}
		}
		
		$this->workorder_submit_url = $link;
	}
}