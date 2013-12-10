<?php
/**
 * View model for settings
 */
class View_Admin_Users_Single extends View_Protected_Admin_Layout
{
	protected $_template = 'admin/users/single';
	
	/**
	 * @var Object Model
	 */	
	protected $_m_users = null;	
	protected $_m_roles = null;
	protected $_m_profile = null;
	
	/**
	 * @var Bool Flag (add or edit)
	 */
	public $is_edit = false;
	
	/**
	 * @var String CSRF Token
	 */
	public $csrf_token = null;
	
	/**
	 * @var Bool|Array Errors
	 */
	public $errors = null;
	
	/**
	 * @var Array The data
	 */
	public $data = null;
	
	public function __construct($m_roles = null, $m_users = null, $m_profile = null, $is_edit = false)
	{
		parent::__construct();
		
		$this->is_edit = $is_edit;
		
		$this->_m_users = $m_users;
		$this->_m_profile = $m_profile;
		
		$this->_m_roles = $m_roles;

		$this->_populate_data();		
	
		$this->_set_variables();
		$this->_set_sidebar();
		
		Asset::instance()
				->js('admin/users');
	}
	
	/**
	 * Bulid and populate the form
	 */
	protected function _populate_data()
	{
		$this->roles = $this->_m_roles->load_values_by(array('type' => 2));
		
		if ($this->is_edit)
		{
			$this->data = $this->_m_users->return_data();
			
			$role = $this->_m_roles->load_mapping($this->data['id']);
			
			$profile = $this->_m_profile->return_data();
			unset($profile['id']);
			
			$this->data['role_id'] = $role[0]['role_id'];
			$this->data = array_merge($this->data, $profile);
		}
		
		$this->_select_roles();
		
	}
	
	/**
	 * Setup variables
	 */
	protected function _set_variables()
	{
		if ($this->is_edit)
		{
			$this->post_url = Route::url('admin', array('controller' => 'users', 'action' => 'edit', 'id' => $this->data['id']));
		}
		else
		{
			$this->post_url = Route::url('admin', array('controller' => 'users', 'action' => 'create'));		
		}
		
		$this->csrf_token = Security::CSRF_token();		
	}	
	
	/**
	 * Repopulate the form with the POST data (in case of validation error)
	 */
	public function repopulate_data($post)
	{
		$this->data = $post;

		$this->_select_roles();
	}
	
	/**
	 * Setup Roles dropdown for mustache
	 */
	protected function _select_roles()
	{
		if ( isset($this->data['role_id']) )
		{
			for ($i=0, $mi=count($this->roles); $i<$mi; $i++)
			{
				if ($this->roles[$i]['id'] == $this->data['role_id'])
				{
					$this->roles[$i]['selected'] = true;
				}
			}
		}	
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
					'sub_url' => Route::url('admin', array('controller' => 'users', 'action' => 'create')),
					'sub_name' => 'Add new User',
					'sub_current' => (!$this->is_edit)
				)
			)
		);
	}
}