<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Master extends Controller_Template {

	// We don't need any 'action_view' functions (shows a view).
	// Instead we can create a __construct() and a $template variable.
	// $template is inherited from Controller_Template
	public $template = null;

    public $request  = null;

    public $admin    = false;

	// I previously thought that you could insitaite $template outside of
	// our __construct, I was wrong. Let's go ahead and do that now.
	public function __construct(Kohana_Request $request, Kohana_Response $response) {
		parent::__construct($request, $response);

		// Master Model
		$this->masterModel = Model::factory('master');

        $this->request = Request::current();

        // Set current template
        $this->_set_template();
	} 



    public function before() {
    	parent::before();

    	$this->template->css = $this->load_css();
    	$this->template->js  = $this->load_js();
    	$this->template->nav = $this->masterModel->get_main_navigation();

        // Depending on what is being used, switch to admin menu
        $this->template->admin = false;
    }



    private function load_css() {
    	$_css = "";

    	foreach($this->masterModel->css as $css) {
            $_css .= $css . "\n";
    	} 

    	return $_css;
    }



    public function load_js() {
        $_js = "";

        foreach($this->masterModel->js as $js) {
        	$_js .= $js . "\n";
        }

        return $_js;
    }



    public function after() {
        parent::after();
    }



    private function _set_template() {
        $this->template = 'template';

        if (in_array($this->request->current()->controller(), array('Account', 'Users', 'Settings', 'Workorders')) && 
            !in_array($this->request->action(), array('login','signup'))){
            $this->template = 'admin/template';
        }
    }
} // End Master
