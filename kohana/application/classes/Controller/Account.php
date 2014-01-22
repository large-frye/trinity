<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Account extends Controller_Master {

    protected $_auth = null;

    protected $_user = null;

    protected $_post = null;

    protected $_homepage = false;

    public static $logged_in = false;



    /**
     * Construct method, inherit from Controller_master
     *
     * @param Kohana_Request  $request
     * @param Kohana_Response $response
     */
    public function __construct(Kohana_Request $request, Kohana_Response $response) {
        parent::__construct($request, $response);

        // Account Model
        $this->account_model = Model::factory('account');
        $this->_users_model = Model::factory('users');
        $this->mailer_model = Model::factory('mailer');
    }


    
    /**
     * Before method, inherited from parent
     *
     */
    public function before() {
        parent::before();
        
        $this->_auth = Auth::instance();
        $this->_post= $this->request->post();
        $this->_user = $this->_auth->get_user();

        $this::$logged_in = !isset($this->_user->id) ? false : true;
        
            
        if (!$this::$logged_in) { 
            if (!in_array($this->request->action() , array('login','signup', 'forgotpassword'))) {
                //echo "<pre>";
                //print_r($_SERVER);
                if (preg_match('/\/workorders\/submit/', $_SERVER['REQUEST_URI'])) {
                    Session::instance()->set('_redirect', $_SERVER['REQUEST_URI']);
                }
                $this->request->redirect('/account/login');
            }
        } else {
            if ($this->request->action() === 'login') {
                $this->request->redirect('/account');
            }

             // Determine the type of the user
            $this->user_type = $this->account_model->get_user_type($this->_user->id);
            $this->template->admin = true;
            $this->_set_admin_menu();
        }

        if ($this->request->controller() === 'Account' && $this->request->action() === 'index') {
            $this->_homepage = true;
        }

        $this->template->homepage = $this->_homepage;


        // Need to check Session::instance to see if a recent order was added. 
        $session_variables = array('add_new_work_order'  => Session::instance()->get('add_new_work_order'),
                                   'edit_new_work_order' => Session::instance()->get('edit_new_work_order'),
                                   'invoice_does_not_exist' => array('type' => 'error', 'msg' => Session::instance()->get('invoice_does_not_exist')),
                                   'create_user_success' => Session::instance()->get('create_user_success'));

        foreach($session_variables as $key => $var) {
            if (isset($var)) {
                if (is_array($var) && $var['type'] === 'error') {
                    $this->template->error = $var['msg'];
                } else {
                    $this->template->success_message = $var;
                }
                
                Session::instance()->delete($key);
            }
        }
    }



    /**
     * Action: index
     *
     */
    public function action_index() {
        $this->template->hide_right_side = true;
        $view = View::factory('account/index');
        $view->admin = $this->user_type == 2 ? true : false;
        $view->client = $this->user_type == 4 ? true : false;
        $view->inspector = $this->user_type == 3 ? true : false;
        $view->orders = $this->account_model->get_work_orders($this->_user->id, $this->user_type);
        $view->options = $this->_get_options($view->orders);
        $view->statuses = array('New' => 'yellow', 'Called PH' => 'blue', 'Alert' => 'red', 'Scheduled' => 'green');
        $this->template->content = $view;
    }



    /**
     * Action: login
     *
     */
    public function action_login() {
        $redirect = Session::instance()->get('_redirect');
        $this::$logged_in ? $this->request->redirect('/account') : null;

        $view = View::factory('account/login');
        $view->csrf_token = Text::random('alnum', rand(20, 30));

        if ($this->request->current()->method() === HTTP_Request::POST) {
            $this->_post = $this->request->post();

            // Sanitize user_name and password with Validation class
            if($this->account_model->validate_login_post($this->_post)['status']) {
                // Need to check if user has a status of 2. 
                if ($this->_users_model->check_if_user_is_deleted($this->_post['username'])) {
                    $view->user_doesnt_exist = true;
                } else if(!$this->_auth->login($this->_post['username'], $this->_post['password'])) {
                    $view->login_failed = true;
                } else {
                    if (isset($redirect)) {
                        Session::instance()->delete('_redirect');
                        $this->request->redirect($redirect);
                    }

                    $this->request->redirect('/account/');
                }
            }
        }

        $this->template->content = $view;
    }



    /**
     * Action: logout
     *
     */
    public function action_logout() {
        $this->_auth->logout();
        $this->request->redirect('/account/login');
    }



    /**
     * Action: forgot password
     *
     */
    public function action_forgotpassword(){
        $view = View::factory('account/forgotpassword');
         if ($this->request->method() === 'POST') {  
            $validate_result= $this->account_model->validate_lost_password($this->_post);
            if (!$validate_result['error']) {

                $this->email= $this->account_model->get_user_name($this->_post);
                $this->pass= $this->account_model->generateRandomString();
                $this->account_model->send_forgotpassword($this->pass, $this->email->current()->id, $this->mailer_model, $this->email->current()->email, $this->email->current()->username);
                $this->request->redirect('/account');
            } else { 
                $view->errors=$validate_result['errors'];
                $view->post = $this->_post;   
            }
        }
        
        $this->template->content = $view;
    }



    /** 
     * Action: Signup view
     *
     */
    public function action_signup(){
        $view = View::factory('account/signup');
        if ($this->request->method() === 'POST') {    
            $validate_result= $this->account_model->validate_new_user($this->_post);
            if (!$validate_result['error']) {
                $this->_post['role_id']=4;
                $this->_users_model->create_user($this->_post, $this->mailer_model);
                $view->success = 'Your account has been created successfully. Please click <a href="/account">here</a> to sign in.';
              //  $body = $this->get_template(DB::query(Database::SELECT, "SELECT value FROM settings WHERE name = 'email_template_rcovery_password'");
                // $this->mailer_model->send_mail('dholmblad@gmail.com', 'a.frye4@gmail.com', 'test', 'rest');
                // $this->request->redirect('/account/login');
            } else {
                $view->errors=$validate_result['errors'];
                $view->post = $this->_post;   
            }
        }

        $this->template->homepage=true;
        $this->template->hide_right_side = false;
        $this->template->content = $view;
    }



    /**
     * Action: Users view
     *
     */
    public function action_users() {
        $view = View::factory('users/index');
        $view->users = $this->account_model->get_user_list(0);
        $view->deleted_users = $this->account_model->get_user_list(1);
        $this->template->content = $view;
    }



    public function action_profile() {
        $view = View::factory('account/profile');
        $view->user_types = $this->account_model->get_roles();
        $view->user_type = $this->user_type;
        $this->template->homepage = true;

        if ($this->request->method() === 'POST') {
            $validation_result = $this->_users_model->validate_create_user_form($this->_post);
            if (!$validation_result['error']) {
                if($this->_users_model->edit_profile($this->_post, $this->_user->id)) {
                    $view->success = "Your account information has been updated successfully.";
                }
            } else {
                $view->errors = $validation_result['errors'];
            }
        }

        $view->user = $this->_users_model->get_user(Auth::instance()->get_user()->id, $this->_post);
        $this->template->content = $view;
    }



    /**
     * After method, inherit from parent. 
     *
     */
    public function after() {
        parent::after();
    }



    /**
     * Set admin menu
     *
     */
    private function _set_admin_menu() {
        $view = View::factory('admin/admin_menu');
        $view->user_type = $this->user_type;
        $this->template->admin_menu = $view;
    }

    

    /**
     * Get options for admin dashboard dropdowns
     *
     * @param  MySQL_Result Object
     * @return array
     */
    private function _get_options($orders) {
        $options = array();
        foreach($orders as $_order) {
            switch ($this->user_type) {
                case Model_Account::ADMIN : 
                    $options[$_order->id] = array('/workorders/view/' . $_order->id => 'View',
                                                  '/workorders/edit/' . $_order->id => 'Edit',
                                                  '/invoice/index/' . $_order->id   => 'Edit Invoice',
                                                  '/invoice/generate/' . $_order->id => 'Generate Invoice',
                                                  '/workorders/report/' . $_order->id => 'Report');
                    break;
                case Model_Account::INSPECTOR :
                    $options[$_order->id] = array('/inspections/view/' . $_order->id         => 'View',
                                                  '/inspections/form/' . $_order->id        => 'Inspection Form',
                                                  '/inspections/estimates/' . $_order->id   => 'Estimates',
                                                  '/inspections/viewphotos/' . $_order->id  => 'Photos');
                    break;
                case Model_Account::CLIENT :
                    $options[$_order->id] = array('/workorders/view/' . $_order->id => 'View');
                    break;
            }
        }

        return $options;
    }
}













