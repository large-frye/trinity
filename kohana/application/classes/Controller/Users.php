<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Users extends Controller_Account {

	private $_user_model = null;

	protected $_post = null;

    protected $_user_id = null;
    
    public function __construct(Kohana_Request $request, Kohana_Response $response) {
    	parent::__construct($request, $response);

    	$this->_user_model = Model::factory('users');
        $this->_user_id = $this->request->param('id');
    }



    public function before() {
    	parent::before();

    	$this->_post = $this->request->post();
    }



    public function action_index() {
    	$view = View::factory('users/index');
        $view->users = $this->account_model->get_user_list(1);
        $view->deleted_users = $this->account_model->get_user_list(2);

        // Session specific messages
        $messages = array('delete_user_success' => Session::instance()->get('delete_user_success'),
                          'delete_user_failed' => Session::instance()->get('delete_user_failed'));

        foreach ($messages as $key => $message) {
            if (preg_match('/failed/', $key)) {
                $view->errors = $message;
            } else {
                $view->success = $message;
            }

            Session::instance()->delete($key);
        }
        $this->template->content = $view;
    }



    public function action_new() {
        $view = View::factory('users/new');
        $view->user_types = $this->account_model->get_roles();

        if ($this->request->method() === 'POST') {
        	$validation_result = $this->_user_model->validate_create_user_form($this->_post);
            if(!$validation_result['error']){
                if($this->_user_model->create_user($this->_post, $this->mailer_model)) {
                    $view->success = "New user was created.";
                } else {
                    $view->errors = array("Error processing user. It's possible this user already exists.");
                }
                
            } else {
                $view->errors = $validation_result['errors'];
            	$view->user = (object) $this->_post;
            }
        }
        $this->template->content = $view;
    }



    public function action_edit() {
    	$view = View::factory('users/new');
        $view->user_types = $this->account_model->get_roles();

        if ($this->request->method() === 'POST') {
            $validation_result = $this->_user_model->validate_create_user_form($this->_post);
        	if (!$validation_result['error']) {
                $this->_user_model->edit_user($this->_post, $this->request->param('id'));
            } else {
                $view->errors = $validation_result['errors'];
                $view->user = (object) $this->_post;
            }
        }

        $view->user = $this->_user_model->get_user($this->request->param('id'));

        $this->template->content = $view;
    }



    public function action_delete() {
        if ($this->_user_id === null) {
            throw new Exception("Error, you seem to be missing something.");
        }

        if ($this->_user_model->delete_user($this->_user_id, $this->mailer_model)) {
            Session::instance()->set('delete_user_success', 'User was deleted successfully.');
        } else {
            Session::instance()->set('delete_user_failed', Model_Users::$errors);
        }

        $this->request->redirect('/users');
    }



    public function action_activate() {
        if ($this->_user_id === null) {
            throw new Exception("Error, you seem to be missing something.");
        }

        if ($this->_user_model->activate_user($this->_user_id, $this->mailer_model)) {
            Session::instance()->set('delete_user_success', 'User was activated successfully.');
        } else {
            Session::instance()->set('delete_user_failed', Model_Users::$errors);
        }

        $this->request->redirect('/users');
    }



    public function after() {
    	parent::after();
    }
}