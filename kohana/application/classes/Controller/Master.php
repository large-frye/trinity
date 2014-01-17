<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Master extends Controller_Template {

	// We don't need any 'action_view' functions (shows a view).
	// Instead we can create a __construct() and a $template variable.
	// $template is inherited from Controller_Template
	public $template = null;

    public $request  = null;

    public $admin    = false;

    protected $_exception_controllers = null;

    protected $_exception_actions = null;

	// I previously thought that you could insitaite $template outside of
	// our __construct, I was wrong. Let's go ahead and do that now.
	public function __construct(Kohana_Request $request, Kohana_Response $response) {
		parent::__construct($request, $response);

		// Master Model
		$this->masterModel = Model::factory('master');

        // Users Model
        $this->users_model = Model::factory('users');

        // Create a property to use instead of Kohana's static function;
        $this->request = Request::current();

        $this->_exception_controllers = array('Account', 'Users', 'Settings', 'Workorders', 'Inspections', 'Invoice');
        $this->_exception_actions = array('login','signup', 'forgotpassword');

        // Set current template
        $this->_set_template();
	} 



    public function before() {
    	parent::before();

    	$this->template->css = $this->load_css();
    	$this->template->js  = $this->load_js();
    	$this->template->nav = $this->masterModel->get_main_navigation();

        // Check if user is logged in.
        $this->_check_logged_in();

        // Depending on what is being used, switch to admin menu
        $this->template->admin = false;
    }



    private function load_css() {
        $_css = "";

    	foreach($this->masterModel->css as $key => $css) { 
            $_css .= HTML::style($css) . "\n";
    	} 

    	return $_css;
    }



    public function load_js() {
        $_js = "";

        foreach($this->masterModel->js as $js) {
        	$_js .= HTML::script($js) . "\n";
        }

        return $_js;
    }



    public function after() {
        parent::after();
    }



    private function _set_template() {
        $this->template = 'template';
        
        if (in_array($this->request->current()->controller(), $this->_exception_controllers) && 
            !in_array($this->request->action(), $this->_exception_actions)){
            $this->template = 'admin/template';
        }
    }




    private function _check_logged_in() {
        $user = Auth::instance();

        if (!isset($user->get_user()->id)) {
            $this->template->logged_in = "<a href=\"/account\">Login</a>";
        } else {
            $view = View::factory('logged-in');
            $view->user = $this->users_model->get_user($user->get_user()->id); // Return current user object. 
            $this->template->logged_in = $view;
        }
    }
} // End Master
