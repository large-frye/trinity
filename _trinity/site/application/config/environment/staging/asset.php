<?php

// Constants in modules/asset/init.php

// Load the assets
Asset::instance()
	
	/* Core */
	
	->register_css('core/base', CSS_CORE .'core.css')
	->register_css('core/forms', CSS_CORE .'forms.css')
	->register_css('core/tables', CSS_CORE .'tables.css')
	->register_css('core/html5bp', CSS_CORE .'html5bp.css')
	->register_css('core/normalize', CSS_CORE .'normalize.min.css')
	
	->register_js('core/base', JS_CORE .'core.js')
	->register_js('core/jquery', JS_CORE .'jquery-1.8.2.min.js')
	
	->register_css('core/mobile/base', CSS_CORE .'mobile/core.css')
	
	->register_css('core/authentication', CSS_CORE .'authentication.css')
	
	->register_js('core/generate-random', JS_CORE .'genrandom.js')
	
	->register_js('admin/users', JS_PROTECTED .'admin/users/pw_reset.js')
	
	
	->register_css('core/admin/qualifications', CSS_CORE .'admin/qualifications.css')
	->register_js('core/admin/qualifications', JS_CORE .'admin/qualifications.js')
	
	->register_css('core/admin/students', CSS_CORE .'admin/students.css')
	->register_css('core/admin/users', CSS_CORE .'admin/users.css')
	
	->register_css('core/consultant/dashboard', CSS_CORE .'consultant/dashboard.css')
	
	
	->register_css('core/admin/programmes', CSS_CORE .'admin/programmes.css')
	->register_js('core/admin/programmes', JS_CORE .'admin/programmes.js')

	->register_css('core/admin/programmes/sessions', CSS_CORE .'admin/programmes/sessions.css')

	->register_css('core/admin/programmes/students', CSS_CORE .'admin/programmes/students.css')
	->register_js('core/admin/programmes/students', JS_CORE .'admin/programmes/students.js')

	->register_css('core/admin/groups', CSS_CORE .'admin/groups.css')
	->register_js('core/admin/groups', JS_CORE .'admin/groups.js')
	
	->register_js('core/admin/timetables', JS_CORE .'admin/timetables.js')

	->register_js('core/admin/students', JS_CORE .'admin/students.js')
	->register_js('admin/print', JS_CORE .'admin/print.js')		
	

	->register_css('core/admin/reports/overview', CSS_CORE .'admin/reports/overview.css')
	->register_css('core/admin/reports/students', CSS_CORE .'admin/reports/students.css')

	->register_css('core/admin/reports/programmes', CSS_CORE .'admin/reports/programmes.css')
	->register_js('core/admin/reports/programmes', JS_CORE .'admin/reports/programmes.js')
	
	->register_css('core/admin/reports/summary', CSS_CORE .'admin/reports/summary.css')

	->register_js('core/admin/tests/results', JS_CORE .'admin/tests/results.js')
	->register_js('core/admin/notifications', JS_CORE .'admin/notifications.js')

	/* Trainer section */

	->register_css('core/trainer/dashboard', CSS_CORE .'trainer/dashboard.css')
	->register_js('core/trainer/dashboard', JS_CORE .'trainer/dashboard.js')

	->register_js('core/trainer/session', JS_CORE .'trainer/session.js')

	/* Application specific components */
	
	->register_css('fonts/avantgarde-gothic', 'http://fast.fonts.com/cssapi/b09ef402-6f51-4b05-96e7-f6833b0760bc.css')

	->register_js('fonts/avantgarde-gothic', 'http://fast.fonts.com/jsapi/b09ef402-6f51-4b05-96e7-f6833b0760bc.js')
	
	
	
	/* 3rd party Plugins / Components */

	->register_js('ckeditor', ASSETS .'ckeditor/ckeditor.js')
	->register_js('ckeditor/jquery-adapter', ASSETS .'ckeditor/adapters/jquery.js')
	
	->register_css('jquery/select2', ASSETS .'jquery-select2/select2.css')
	->register_js('jquery/select2', ASSETS .'jquery-select2/select2.min.js')
	
	->register_css('jquery/ui/datepicker', ASSETS .'jquery-ui-datepicker/f2l-theme/jquery-ui-1.8.22.custom.css')
	->register_js('jquery/ui/datepicker', ASSETS .'jquery-ui-datepicker/jquery-ui-1.8.22.datepicker.min.js')



	->register_css('jquery/mobiscroll2', ASSETS .'mobiscroll/mobiscroll-2.1.custom.min.css')
	->register_js('jquery/mobiscroll2', ASSETS .'mobiscroll/mobiscroll-2.1.custom.min.js')

/*
	->register_css('jquery/mobiscroll2', ASSETS .'mobiscroll/mobiscroll.core-2.1.css')
	->register_js('jquery/mobiscroll2', ASSETS .'mobiscroll/mobiscroll.core-2.1.js')
	->register_js('jquery/mobiscroll2/datetime', ASSETS .'mobiscroll/mobiscroll.datetime-2.1.js')
*/
	
	->register_css('bootstrap', ASSETS .'bootstrap/css/bootstrap.min.css')
	->register_js('bootstrap', ASSETS .'bootstrap/js/bootstrap.min.js')
	
	->register_js('admin/programmes', JS_PROTECTED .'admin/programmes/add.js')	
	->register_js('admin/groups', JS_PROTECTED .'admin/groups/add.js')	
	
	
	
	->register_js('admin/programmes/instances', JS_PROTECTED .'admin/programmes/instances/add.js')		
	
	->register_css('jquery-ui', ASSETS.'jquery-ui-1.9.2.custom/css/south-street/jquery-ui-1.9.2.custom.min.css')
	->register_js('jquery-ui', ASSETS.'jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js')
	
	
	// Autoload common assets
	->css(
		'core/normalize',
		'core/html5bp',
		'bootstrap',
		'fonts/avantgarde-gothic',
		'core/base'
	)
	->js(
		'core/jquery',
		'bootstrap',
		'core/base'
	);