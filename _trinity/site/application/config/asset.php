<?php

// Constants in modules/asset/init.php

// Load the assets

Asset::instance()
	
	/* Core */
	
	->register_css('core/base', ASSETS_CSS .'style.css')
	->register_css('core/text', ASSETS_CSS .'style_text.css')
	->register_css('core/menu', ASSETS_CSS .'menu.css')
	
	->register_css('core/inspection/form', ASSETS_CSS .'inspection/form.css')
	->register_css('core/inspection/photos', ASSETS_CSS .'inspection/photos.css')
	
	->register_css('core/inspection/photos/upload', ASSETS_CSS .'inspection/photos/upload.css')
	->register_js('core/inspection/photos/upload', ASSETS_JS .'inspection/photos/upload.js')
	->register_js('core/inspection/photos/view', ASSETS_JS .'inspection/photos/view.js')
	->register_js('core/inspection/photos/categories', ASSETS_JS .'inspection/photos/categories.js')
	
	->register_css('forms', ASSETS_CSS .'forms.css')
	->register_css('forms/btn', ASSETS_CSS .'forms-btn.css')
	->register_css('datatables', ASSETS_CSS .'datatables.css')
	->register_css('fullcalendar', ASSETS_CSS .'fullcalendar.css')
	->register_css('modalwindow', ASSETS_CSS .'modalwindow.css')
	->register_css('statics', ASSETS_CSS .'statics.css')
	->register_css('tabs-toggle', ASSETS_CSS .'tabs-toggle.css')
	->register_css('system-message', ASSETS_CSS .'system-message.css')
	->register_css('tooltip', ASSETS_CSS .'tooltip.css')
	->register_css('wizard', ASSETS_CSS .'wizard.css')
	
	->register_css('wysiwyg', ASSETS_CSS .'wysiwyg.css')
	->register_css('wysiwyg/modal', ASSETS_CSS .'wysiwyg.modal.css')
	->register_css('wysiwyg/editor', ASSETS_CSS .'wysiwyg-editor.css')
	
	->register_css('handheld', ASSETS_CSS .'handheld.css')
	->register_css('pirebox', ASSETS_CSS .'pirebox.css')
	
	
	
	->register_js('core/base', ASSETS_JS .'costum.js')
	
	->register_js('jquery', ASSETS_JS .'jquery-1.7.1.min.js')

	->register_js('jquery/ui', ASSETS_JS .'jquery.ui.1.8.17.js')
	->register_js('jquery/ui/select', ASSETS_JS .'jquery.ui.select.js')
	->register_js('jquery/ui/spinner', ASSETS_JS .'jquery.ui.spinner.js')
	
	->register_js('jquery/background-position', ASSETS_JS .'jquery.backgroundPosition.js')
	->register_js('jquery/placeholder', ASSETS_JS .'jquery.placeholder.min.js')
	->register_js('jquery/datatables', ASSETS_JS .'jquery.datatables.js')
	->register_js('jquery/smartwizard2', ASSETS_JS .'jquery.smartwizard-2.0.min.js')
	->register_js('jquery/tipsy', ASSETS_JS .'jquery.tipsy.js')
	->register_js('jquery/elastic-source', ASSETS_JS .'jquery.elastic.source.js')
	->register_js('jquery/breadcrumb', ASSETS_JS .'jquery.jBreadCrumb.1.1.js')
	->register_js('jquery/custom-input', ASSETS_JS .'jquery.customInput.js')
	->register_js('jquery/validate', ASSETS_JS .'jquery.validate.min.js')
	->register_js('jquery/metadata', ASSETS_JS .'jquery.metadata.js')
	->register_js('jquery/filestyle', ASSETS_JS .'jquery.filestyle.mini.js')
	->register_js('jquery/filter-input', ASSETS_JS .'jquery.filter.input.js')
	->register_js('jquery/flot', ASSETS_JS .'jquery.flot.js')
	->register_js('jquery/flot/pie', ASSETS_JS .'jquery.flot.pie.min.js')
	->register_js('jquery/flot/resize', ASSETS_JS .'jquery.flot.resize.min.js')
	->register_js('jquery/graphtable', ASSETS_JS .'jquery.graphtable-0.2.js')
	->register_js('jquery/wysiwyg', ASSETS_JS .'jquery.wysiwyg.js')
	
	->register_js('superfish', ASSETS_JS .'superfish.js')
	->register_js('supersubs', ASSETS_JS .'supersubs.js')	
	->register_js('fullcalendar', ASSETS_JS .'fullcalendar.min.js')
	
	->register_js('controls/wysiwyg/image', ASSETS_JS .'controls/wysiwyg.image.js')
	->register_js('controls/wysiwyg/link', ASSETS_JS .'controls/wysiwyg.link.js')
	->register_js('controls/wysiwyg/table', ASSETS_JS .'controls/wysiwyg.table.js')
	->register_js('controls/wysiwyg/rmformat', ASSETS_JS .'plugins/wysiwyg.rmFormat.js')
	
	->register_js('admin/multi-row', ASSETS_JS.'admin/multi-row.js')
	->register_js('workorders/alert', ASSETS_JS.'workorders/alert.js')
	->register_js('admin/users', ASSETS_JS.'admin/users.js')
	
	
	->register_js('core/inspection/form', ASSETS_JS .'inspection/form.js')
	->register_js('core/inspection/print', ASSETS_JS .'inspection/print.js')
	
	->register_css('vendor/fancybox', ASSETS_VENDOR .'fancybox/jquery.fancybox.css')
	->register_js('vendor/fancybox', ASSETS_VENDOR .'fancybox/jquery.fancybox.pack.js')
	
	->register_js('pirobox', ASSETS_JS .'pirobox.extended.min.js')
	
	
	// Autoload common assets
	->css(
		'core/base',
		'core/text',
		'core/menu',
		'forms',
		'forms/btn',
		'datatables',
		'fullcalendar',
		'modalwindow',
		'statics',
		'tabs-toggle',
		'system-message',
		'tooltip',
		'wizard',
		'wysiwyg',
		'wysiwyg/modal',
		'wysiwyg/editor',
		'handheld',
		'vendor/fancybox',
		'pirebox'
		
	)
	
	->js(
		'jquery',
		'jquery/background-position',
		'jquery/placeholder',
		'jquery/ui',
		'jquery/ui/select',
		'jquery/ui/spinner',
		'superfish',
		'supersubs',
		'jquery/datatables',
		'fullcalendar',
		'jquery/smartwizard2',
		'jquery/tipsy',
		'jquery/elastic-source',
		'jquery/breadcrumb',
		'jquery/custom-input',
		'jquery/validate',
		'jquery/metadata',
		'jquery/filestyle',
		'jquery/filter-input',
		'jquery/flot',
		'jquery/flot/pie',
		'jquery/flot/resize',
		'jquery/graphtable',
		'jquery/wysiwyg',
		'controls/wysiwyg/image',
		'controls/wysiwyg/link',
		'controls/wysiwyg/table',
		'controls/wysiwyg/rmformat',
		'vendor/fancybox',
		'pirobox',
		
		'core/base'
	);
	
	