<?php defined('SYSPATH') or die('No direct script access.');

class Model_Master extends Model {

	public $css;
	public $js;

	
    public function __construct() {
    	$this->get_css_files();
    	$this->get_js_files();
    }



    public function get_main_navigation() {
    	return array(array('name' => 'Home',
    		               'url'  => '/'),
    	             array('name' => 'About',
    	             	   'url'  => '/about'),
    	             array('name' => 'Services',
    	             	   'url'  => '/services'),
    	             array('name' => 'Damage Types',
    	             	   'url'  => '/damagetypes'),
    	             array('name' => 'Testimonials',
    	             	   'url'  => '/testimonials'),
    	             array('name' => 'Contact',
    	             	   'url'  => '/contact'));
    }



    public function get_css_files() {
		
        $css_files = scandir($_SERVER['DOCUMENT_ROOT'] . "/trinity/assets/css/" );

    	foreach($css_files as $css_file) {
    		$this->css[] = '/trinity/assets/css/' . $css_file;
    	}

        $_insepction_files = scandir($_SERVER['DOCUMENT_ROOT'] . "/trinity/assets/css/inspection/");

        foreach ($_insepction_files as $inspection_file) {
            $this->css[] = '/trinity/assets/css/inspection/' . $inspection_file;
        }
    }



    public function get_js_files() {
    	$js_files = array("/trinity/assets/js/jquery-1.7.1.min.js",
    		              "/trinity/assets/js/jquery.backgroundPosition.js",
    		              "/trinity/assets/js/jquery.placeholder.min.js",
    		              "/trinity/assets/js/jquery.ui.1.8.17.js",
    		              "/trinity/assets/js/jquery.ui.select.js",
    		              "/trinity/assets/js/jquery.ui.spinner.js",
    		              "/trinity/assets/js/superfish.js",
    		              "/trinity/assets/js/supersubs.js",
    		              "/trinity/assets/js/jquery.datatables.js",
    		              "/trinity/assets/js/fullcalendar.min.js",
    		              "/trinity/assets/js/jquery.smartwizard-2.0.min.js",
    		              "/trinity/assets/js/jquery.tipsy.js",
    		              "/trinity/assets/js/jquery.elastic.source.js",
    		              "/trinity/assets/js/jquery.jBreadCrumb.1.1.js",
    		              "/trinity/assets/js/jquery.customInput.js",
    		              "/trinity/assets/js/jquery.validate.min.js",
    		              "/trinity/assets/js/jquery.metadata.js",
    		              "/trinity/assets/js/jquery.filestyle.mini.js",
    		              "/trinity/assets/js/jquery.filter.input.js",
    		              "/trinity/assets/js/jquery.flot.js",
    		              "/trinity/assets/js/jquery.flot.pie.min.js",
    		              "/trinity/assets/js/jquery.flot.resize.min.js",
    		              "/trinity/assets/js/jquery.graphtable-0.2.js",
    		              "/trinity/assets/js/jquery.wysiwyg.js",
    		              "/trinity/assets/js/controls/wysiwyg.image.js",
    		              "/trinity/assets/js/controls/wysiwyg.link.js",
    		              "/trinity/assets/js/controls/wysiwyg.table.js",
    		              "/trinity/assets/js/plugins/wysiwyg.rmFormat.js",
    		              "/trinity/assets/vendor/fancybox/jquery.fancybox.pack.js",
    		              "/trinity/assets/js/pirobox.extended.min.js",
    		              "/trinity/assets/js/costum.js",
                          "/trinity/assets/js/inspection/form.js",
                          "/trinity/assets/js/inspection/dropzone.js",
                          "/trinity/assets/js/inspection/gridster.js",  
                          "/trinity/assets/js/jquery.collapsible.min.js",
                          "/trinity/assets/js/jquery.collapse_cookie_storage.js",
                          "/trinity/assets/js/jquery.collapse_storage.js",
                          // "/trinity/assets/js/jqueryUI.js",
                          "/trinity/assets/js/inspection/imgUploader.js",
                          );

    	foreach($js_files as $js_file) {
    		$this->js[] = $js_file;
    	}
    }
}