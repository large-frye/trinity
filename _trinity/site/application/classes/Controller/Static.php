<?php
/**
 * Controller for handling static pages
 * Such pages are the FAQ, Terms and Conditions, etc.
 */
class Controller_Static extends Controller_Public
{
	/**
	 * @var array Holds the static pages with their info we need to pass to the view model
	 */
	protected $pages = array(
		'about' => array(
			'template' => 'static/about',
			'title' => 'About'
		),
		'services' => array(
			'template' => 'static/services',
			'title' => 'Services'
		),
		'damage-types' => array(
			'template' => 'static/damage_types',
			'title' => 'Damage Types'
		),
		'testimonials' => array(
			'template' => 'static/testimonials',
			'title' => 'Testimonials'
		),
		'contact' => array(
			'template' => 'static/contact',
			'title' => 'Contact'
		),
		'wind-damage' => array(
			'template' => 'static/damage_types/wind_damage',
			'title' => 'Wind Damage'
		),
		'hail-damage' => array(
			'template' => 'static/damage_types/hail_damage',
			'title' => 'Hail Damage'
		),
		'manufacturer-defects' => array(
			'template' => 'static/damage_types/manufacturer_defects',
			'title' => 'Manufacturer Defects'
		),
		'schedule-claim' => array(
			'template' => 'static/schedule-claim',
			'title' => 'Schedule New Claim',
			'layout' => 'schedule-claim'
		)
	);
	
	public function action_index()
	{
		// Get the page name from url
		$page = Security::sanitize($this->request->param('page_name'));
		$subpage = Security::sanitize($this->request->param('subpage_name'), '');
		
		if ( !array_key_exists($page, $this->pages) )
		{
			throw new HTTP_Exception_404();
			exit;
		}
		
		$param = $this->pages[$page];
		
		if ( $subpage != '' )
		{
			if ( !array_key_exists($subpage, $this->pages) )
			{
				throw new HTTP_Exception_404();
				exit;
			}
			
			$param = $this->pages[$subpage];
		}
		
		$this->_view = new View_Static($param);
	}
}
