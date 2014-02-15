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
		
        $css_files = scandir($_SERVER['DOCUMENT_ROOT'] . "/assets/css/" );

    	foreach($css_files as $css_file) {
            if (!is_dir($css_file)) {
    		    $this->css[] = '/assets/css/' . $css_file;
            }
    	}

        $_insepction_files = scandir($_SERVER['DOCUMENT_ROOT'] . "/assets/css/inspection/");

        foreach ($_insepction_files as $inspection_file) {
            if (!is_dir($inspection_file)) {
                $this->css[] = '/assets/css/inspection/' . $inspection_file;
            }
        }
    }



    public function get_js_files() {
    	$js_files = array("/assets/js/jquery-1.7.1.min.js",
    		              "/assets/js/jquery.backgroundPosition.js",
    		              "/assets/js/jquery.placeholder.min.js",
    		              "/assets/js/jquery.ui.1.8.17.js",
    		              "/assets/js/jquery.ui.select.js",
    		              "/assets/js/jquery.ui.spinner.js",
    		              "/assets/js/superfish.js",
    		              "/assets/js/supersubs.js",
    		              "/assets/js/jquery.datatables.js",
    		              "/assets/js/fullcalendar.min.js",
    		              "/assets/js/jquery.smartwizard-2.0.min.js",
    		              "/assets/js/jquery.tipsy.js",
    		              "/assets/js/jquery.elastic.source.js",
    		              "/assets/js/jquery.jBreadCrumb.1.1.js",
    		              "/assets/js/jquery.customInput.js",
    		              "/assets/js/jquery.validate.min.js",
    		              "/assets/js/jquery.metadata.js",
    		              "/assets/js/jquery.filestyle.mini.js",
    		              "/assets/js/jquery.filter.input.js",
    		              "/assets/js/jquery.flot.js",
    		              "/assets/js/jquery.flot.pie.min.js",
    		              "/assets/js/jquery.flot.resize.min.js",
    		              "/assets/js/jquery.graphtable-0.2.js",
    		              "/assets/js/jquery.wysiwyg.js",
    		              "/assets/js/controls/wysiwyg.image.js",
    		              "/assets/js/controls/wysiwyg.link.js",
    		              "/assets/js/controls/wysiwyg.table.js",
    		              "/assets/js/plugins/wysiwyg.rmFormat.js",
    		              "/assets/vendor/fancybox/jquery.fancybox.pack.js",
    		              "/assets/js/pirobox.extended.min.js",
    		              "/assets/js/costum.js",
                          "/assets/js/inspection/form.js",
                          "/assets/js/inspection/dropzone.js",
                          "/assets/js/inspection/gridster.js",  
                          "/assets/js/jquery.collapsible.min.js",
                          "/assets/js/jquery.collapse_cookie_storage.js",
                          "/assets/js/jquery.collapse_storage.js",
                          // "/trinity/assets/js/jqueryUI.js",
                          "/assets/js/inspection/imgUploader.js",
                          "/assets/js/admin/multi-row.js",
                          "https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false",
                          "/assets/js/maps.js",

                          );

    	foreach($js_files as $js_file) {
    		$this->js[] = $js_file;
    	}
    }
}