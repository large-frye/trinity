<?php

/**
 * Primal Skill Mustache implementation.
 *
 * @version 1.0
 *
 */
class Primalskill_Mustache_Engine
{
	private $_mustache_engine = null;
	private $_view_model = null;
	
	private $_layout = null;
	private $_partials = array();
	
	public function __construct( $view_model )
	{
		$this->_view_model = $view_model;
		
		$this->_get_template_variables();
		$this->_load_engine();
	}
	
	
	private function _load_engine()
	{
		$this->_mustache_engine = new Mustache_Engine(
			array(
				'loader' => new Primalskill_Mustache_Loader_File(),
				'partials_loader' => new Primalskill_Mustache_Loader_Partial(),
				
				'partials' => $this->_partials,

				'escape' => function($value) 
				{
					return HTML::chars($value);
				},

				'cache' => APPPATH .'cache/mustache'
			)
		);
	}
	

	public function render()
	{						
		return $this->_mustache_engine->loadTemplate($this->_layout)->render($this->_view_model);
	}

	
	private function _get_template_variables()
	{
		// Accessing view model class protected properties.

		$r_view = new ReflectionClass($this->_view_model);
	
		$this->_layout = $r_view->getProperty('_layout');
		$this->_layout->setAccessible(true);
		$this->_layout = $this->_layout->getValue($this->_view_model);
	
		$this->_partials = $r_view->getProperty('_partials');
		$this->_partials->setAccessible(true);
		$this->_partials = $this->_partials->getValue($this->_view_model);
		
		if ( $r_view->hasProperty('_template') )
		{
			$content = $r_view->getProperty('_template');
			$content->setAccessible(true);
			$content = $content->getValue($this->_view_model);
						
			$this->_partials = array_merge($this->_partials, array('content' => $content));
		}
	}
}
