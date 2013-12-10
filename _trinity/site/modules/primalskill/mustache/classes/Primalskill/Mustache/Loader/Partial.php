<?php

class Primalskill_Mustache_Loader_Partial 
	extends Primalskill_Mustache_Loader_File 
	implements Mustache_Loader, Mustache_Loader_MutableLoader
{
	
	private $_aliases = array();
	
	public function __construct(array $aliases = array())
	{
		$this->setTemplates($aliases);
	}
	
	public function load($name)
	{
		if (! isset($this->_aliases[$name]) )
		{
			throw new Primalskill_Mustache_Exception(
				'Mustache template ":name" not found', array(':name' => $name)
			);
		}

		return parent::load($this->_aliases[$name]);
	}
	
	
	public function setTemplates(array $templates)
	{
		$this->_aliases = $templates;
	}
	
	public function setTemplate($name, $template)
	{
		$this->_aliases[$name] = $template;
	}

}
