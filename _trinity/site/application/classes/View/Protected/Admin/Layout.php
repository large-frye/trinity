<?php

class View_Protected_Admin_Layout extends View_Protected_Layout
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
				'name' => 'Work Orders',
				'url' => Route::url('admin', array('controller' => 'workorders')),
				'is_sub_navigation' => true,
				'sub_navigation' => array
				(
					array
					(
						'name' => 'Submit New',
						'url' => Route::url('admin', array(
									'controller' => 'workorders',
									'action' => 'submit'
								))
					)
				)
			),

			array
			(
				'name' => 'Settings',
				'url' => Route::url('admin', array('controller' => 'settings')),
				'is_sub_navigation' => true,
				'sub_navigation' => array
				(
					array
					(
						'name' => 'Email Templates',
						'url' => Route::url('admin', array(
									'controller' => 'settings',
									'action' => 'email'
								))
					),
					array
					(
						'name' => 'Work Order Prices',
						'url' => Route::url('admin', array(
									'controller' => 'settings',
									'action' => 'prices'
								))
					),
					array
					(
						'name' => 'Categories',
						'url' => Route::url('admin', array('controller' => 'categories'))
					)
				)
			),
			
			array
			(
				'name' => 'Users',
				'url' => Route::url('admin', array('controller' => 'users')),
				'is_sub_navigation' => true,
				'sub_navigation' => array
				(
					array
					(
						'name' => 'Create New',
						'url' => Route::url('admin', array(
									'controller' => 'users',
									'action' => 'create'
								))
					)
				)
			)			
			
		);
	}
	
	
}