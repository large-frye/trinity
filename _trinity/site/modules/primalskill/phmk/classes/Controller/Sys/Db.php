<?php
/**
 * This controller handles the actions belonging to database manipulation
 */
class Controller_Sys_Db extends Controller_Systemplate
{
	/**
	 * @var array $_updates This variable holds the updates so we do not have to always instantiate a model to get them
	 */
	protected $_updates = array();
	
	/**
	 * Getting the updates so we have them always at hand in any action
	 */
	public function before()
	{
		parent::before();
		
		// Init model
		$handler = new Model_Dbhandler();
		
		$this->_updates = $handler->get_updates();
	}
	
	/**
	 * Action for listing the existent updates
	 */
	public function action_index()
	{
		// Init view
		$view = View::factory('sys/db/main');
		
		// Init model
		$handler = new Model_Dbhandler();
		
		$view->updates = $this->_updates;
		
		if ( $this->request->method() == Request::POST )
		{
			$post = $this->request->post();
			try
			{
				$file = $handler->get_file($post['change-update']);
				$view->selected = $post['change-update'];
				$view->name = $file['name'];
				$view->description = $file['description'];
				$view->sql_up = $file['sql_up'];
				$view->sql_down = $file['sql_down'];
				$view->is_data = $file['has_data'];
			}
			catch(Exception $e)
			{
				$view->error = $e->getMessage();
			}
		}
		
		try
		{
			$view->current = $handler->get_current();
		}
		catch(Exception $e)
		{
			$view->error = $e->getMessage();
		}
		
		$this->_view->content = $view;
	}
	
	/**
	 * This action is responsable for adding an update
	 */
	public function action_new()
	{
		// Init view
		$view = View::factory('sys/db/new');
		
		// Init model
		$handler = new Model_Dbhandler();
		
		if ( $this->request->method() == Request::POST )
		{
			$post = $this->request->post();
			
			try
			{
				$is_data =  ( isset( $post['is-data'] ) )? true : false;
				
				if ( $handler->create_update($post['name'], $post['description'], $post['sql-up'], $post['sql-down'], $is_data) )
				{
					HTTP::redirect(Route::url('sys', array('controller' => 'db')));
				}
				else
				{
					$view->error = 'Please fill the required fields';
				}
			}
			catch(Exception $e)
			{
				$view->error = $e->getMessage();
			}
		}
		
		$this->_view->content = $view;
	}
	
	/**
	 * This action runs the sql command of the update on the current db
	 */
	public function action_upgrade()
	{
		// Get the param from url
		$update = $this->request->param('id');
		
		if ( !isset($update) || $update == '' )
		{
			$this->_view->content = 'You did not specify an update';
		}
		else
		{
			$update = str_replace('-','.',$update);
			// Init model
			$handler = new Model_Dbhandler();
			
			$current = $handler->get_current();
			
			// We check if the upgrade is after the current upgrade, if it is not, we do not run it
			$can_update = true;
			
			if ( $current == $update ) 
			{ 
				$can_update = false; 
			}
			else
			{
				if ( $current == '' )
				{
					if ( $this->_updates[0] != $update )
					{
						$can_update = false;
					}
				}
				else
				{
					foreach( $this->_updates as $key => $value )
					{	
						if ( $value == $current )
						{
							if ( $key == count($this->_updates) -1 )
							{
								$can_update = false;
								break;
							}
							if ( $this->_updates[$key+1] != $update )
							{
								$can_update = false;
								break;
							}
						}
					}
				}
			}
			
			if ( $can_update )
			{
				$check = false;
				
				try
				{
					$file = $handler->get_file($update);
					
					//$q = DB::query(Database::INSERT,$file['sql'])->execute();
					if ( $handler->run_query($file['sql_up']) )
					{
						$handler->set_current($update);
						$check = true;
					}
					else
					{
						$check = false;
						$this->_view->content = 'There is an error: Something went wrong when running the sql';
					}
				}
				catch(Exception $e)
				{
					$this->_view->content = 'There is an error: '.$e->getMessage();
				}
			
				if ( $check )
				{
					HTTP::redirect(Route::url('sys', array('controller' => 'db')));			
				}
			}
			else
			{
				HTTP::redirect(Route::url('sys', array('controller' => 'db')));
			}
		}
	}
	
	/**
	 * This action runs the sql command of the downgrade on the current db
	 */
	public function action_downgrade()
	{
		// Get the param from url
		$update = $this->request->param('id');
		
		if ( !isset($update) || $update == '' )
		{
			$this->_view->content = 'You did not specify an update';
		}
		else
		{
			$update = str_replace('-','.',$update);
			// Init model
			$handler = new Model_Dbhandler();
			
			$current = $handler->get_current();
			
			// We check if the upgrade is after the current upgrade, if it is not, we do not run it
			$can_update = true;
			
			if ( $current != $update ) 
			{ 
				$can_update = false; 
			}
			
			if ( $can_update )
			{
				$check = false;
			
				try
				{
					$file = $handler->get_file($update);
					
					//$q = DB::query(Database::INSERT,$file['sql'])->execute();
					if ( $handler->run_query($file['sql_down']) )
					{
						foreach( $this->_updates as $key => $value )
						{
							if ( $value == $update )
							{
								if ( $key == 0 )
								{
									$handler->set_current('');
								}
								else
								{
									$handler->set_current($this->_updates[$key-1]);
								}
							}
						}
						
						$check = true;
						
					}
					else
					{
						$check = false;
						$this->_view->content = 'There is an error: Something went wrong when running the sql';
					}
				}
				catch(Exception $e)
				{
					$this->_view->content = 'There is an error: '.$e->getMessage();
				}
				
				if ( $check )
				{
					HTTP::redirect(Route::url('sys', array('controller' => 'db')));			
				}		
			
			}
			else
			{
				HTTP::redirect(Route::url('sys', array('controller' => 'db')));
			}
		}
	}
	
	/**
	 * Function for running all upgrades - will run only the ones that do not manipulate data and only till the next update that has data
	 */
	public function action_runall()
	{
		// Init model
		$handler = new Model_Dbhandler();
		
		$current = $handler->get_current();
		
		$run = ( $current == '' )? true : false;
		
		$i = 0;
		foreach( $this->_updates as $update )
		{
			$file = $handler->get_file($update);
			
			if ( $file['has_data'] == true )
			{
				break;
			}
			
			if ( $run )
			{
				$query = $handler->run_query($file['sql_up']);
				if ( $query )
				{
					
				}
				else
				{
					break;
				}
			}
			
			if ( $current == $update )
			{
				$run = true;
			}
			
			$i++;
		}
		
		if ( $i > 0 )
		{
			$handler->set_current($this->_updates[$i-1]);
		}
		
		HTTP::redirect(Route::url('sys', array('controller' => 'db')));
	}
}