<?php

class View_Protected_Inspector_Layout extends View_Protected_Layout
{
	
	/**
	 * Main navigation for administrators
	 *
	 * @return array The navigation items
	 */
	public function main_navigation()
	{
		return array
		(
			array
			(
				'name' => 'Dashboard',
				'url' => '/'
			)			
		);
	}	
}