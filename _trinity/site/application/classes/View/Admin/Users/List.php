<?php
/**
 * View model for settings
 */
class View_Admin_Users_List extends View_Protected_Admin_Layout
{
	protected $_template = 'admin/users/list';
	
	/**
	 * @var Object Model
	 */
	protected $_m_users = null;
	
	/**
	 * @var Array active users
	 */
	public $active_users = null;
	
	/**
	 * @var Array soft deleted users
	 */
	public $deleted_users = null;
	
	/**
	 * @var String URL
	 */
	public $edit_url = null;
	public $create_url = null;
	public $delete_url = null;
	
	public function __construct($m_users = null)
	{
		parent::__construct();
		
		$this->_m_users = $m_users;
		
		$this->_load_data();
		
		$this->_set_variables();
		$this->_set_sidebar();
	}
	
	/**
	 * Load the data
	 */
	protected function _load_data()
	{
		$this->active_users = $this->_m_users->get_userlist(array('deleted' => 0));
		$this->deleted_users = $this->_m_users->get_userlist(array('deleted' => 1));

		for ( $i=0, $mi = count($this->active_users); $i<$mi; $i++ )
		{
			$this->active_users[$i]['created_on_utc'] = date('m-d-Y / H:i', strtotime($this->active_users[$i]['created_on_utc'] ));
		}
		
		for ( $i=0, $mi = count($this->deleted_users); $i<$mi; $i++ )
		{
			$this->deleted_users[$i]['created_on_utc'] = date('m-d-Y / H:i', strtotime($this->deleted_users[$i]['created_on_utc'] ));
		}		
	}
	
	/**
	 * Setup variables
	 */
	protected function _set_variables()
	{
		$this->edit_url = Route::url('admin', array('controller' => 'users', 'action' => 'edit'));
		$this->create_url = Route::url('admin', array('controller' => 'users', 'action' => 'create'));
		$this->softdelete_url = Route::url('admin', array('controller' => 'users', 'action' => 'softdelete'));
		$this->delete_url = Route::url('admin', array('controller' => 'users', 'action' => 'delete'));
	}
	
	private function _set_sidebar()
	{
		$this->_partials = array(
			'sidebar' => 'protected/sidebar'
		);
		
		$this->has_sidebar = true;
		$this->sidebar_links[] = array(
			'url' => Route::url('admin', array('controller' => 'users', 'action' => 'index')),
			'name' => 'Users',
			'has_sublinks' => true,
			'current' => true,
			'sub_links' => array(
				array(
					'sub_url' => $this->create_url,
					'sub_name' => 'Add new User'
				)
			)
		);
	}
}