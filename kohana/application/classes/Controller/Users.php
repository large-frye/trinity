<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Users extends Controller_Account {

	private $_user_model = null;

	protected $_post = null;
    
    public function __construct(Kohana_Request $request, Kohana_Response $response) {
    	parent::__construct($request, $response);

    	$this->_user_model = Model::factory('users');
    }



    public function before() {
    	parent::before();

    	$this->_post = $this->request->post();
    }



    public function action_index() {
    	$view = View::factory('users/index');
        $view->users = $this->account_model->get_user_list(0);
        $view->deleted_users = $this->account_model->get_user_list(1);
        $this->template->content = $view;
    }



    public function action_new() {
        $view = View::factory('users/new');
        $view->user_types = $this->account_model->get_roles();

        if ($this->request->method() === 'POST') {
        	if ($this->_user_model->validate_create_user_form($this->_post)) {
                $this->_user_model->create_user($this->_post);
            } else {
            	$view->user = (object) $this->_post;
            }
        }
        $this->template->content = $view;
    }



    public function action_edit() {
    	$view = View::factory('users/new');
    	$view->user = $this->_user_model->get_user($this->request->param('id'));
        $view->user_types = $this->account_model->get_roles();

        if ($this->request->method() === 'POST') {
        	if ($this->_user_model->validate_create_user_form($this->_post)) {
                $this->_user_model->create_user($this->_post);
            } else {
                $view->user = (object) $this->_post;
            }
        }
        $this->template->content = $view;
    }



    public function after() {
    	parent::after();
    }
}