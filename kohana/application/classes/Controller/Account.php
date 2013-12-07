<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Account extends Controller_Master {



    protected $_auth = null;

    protected $_user = null;

    protected $_post = null;

    protected $_homepage = false;

    public static $logged_in = false;

    public function __construct(Kohana_Request $request, Kohana_Response $response) {
    	parent::__construct($request, $response);

    	// Account Model
    	$this->account_model = Model::factory('account');
    }


    public function before() {
    	parent::before();
    	
    	$this->_auth = Auth::instance();

    	$this->_user = $this->_auth->get_user();

        $this::$logged_in = !$this->_user ? false : true;
        
        if (!$this::$logged_in) {
            if ($this->request->action() != 'login') {
                $this->request->redirect('/account/login');
            }
        } else {
            if ($this->request->action() === 'login') {
                $this->request->redirect('/account');
            }

            $this->template->admin = true;
        }

        if ($this->request->controller() === 'Account' && $this->request->action() === 'index') {
            $this->_homepage = true;
        }

        $this->template->homepage = $this->_homepage;
    }



    public function action_index() {
        // Need to hide right side bar
        $this->template->hide_right_side = true;

        $view = View::factory('account/index');

        $view->orders = $this->account_model->get_work_orders($this->_user->id);

        $this->template->content = $view;
    }



    public function action_login() {
        $this::$logged_in ? $this->request->redirect('/account') : null;

    	$view = View::factory('account/login');
    	$view->csrf_token = Text::random('alnum', rand(20, 30));

    	if ($this->request->current()->method() === HTTP_Request::POST) {
    		$this->_post = $this->request->post();

    		// Sanitize user_name and password with Validation class
    		if($this->account_model->validate_login_post($this->_post)['status']) {
    			if(!$this->_auth->login($this->_post['username'], $this->_post['password'])) {
                    $view->login_failed = true;
                } else {
                    $this->request->redirect('/account/');
                }
    		}
    	}

        $this->template->content = $view;
    }



    public function action_logout() {
        $this->_auth->logout();

        $this->request->redirect('/account/login');
    }



    public function action_users() {
        $view = View::factory('users/index');
        $view->users = $this->account_model->get_user_list(0);
        $view->deleted_users = $this->account_model->get_user_list(1);
        $this->template->content = $view;
    }



    public function after() {
        parent::after();
    }

    public function new_account(){
        $view = View::factory('account/signup');
        $this->template->content = $view;
    }
}