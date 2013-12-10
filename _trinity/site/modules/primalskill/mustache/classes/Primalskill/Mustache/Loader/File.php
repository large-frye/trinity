<?php

class Primalskill_Mustache_Loader_File implements Mustache_Loader, Mustache_Loader_MutableLoader
{
	private $_base_dir = 'templates';
	private $_extension = 'mustache';
	private $_templates = array();


	public function load($name)
	{		
		if (! isset($this->_templates[$name]) )
		{
			$this->_templates[$name] = $this->_load_file($name);
		}

		return $this->_templates[$name];
	}

	protected function _load_file($name)
	{
		$filename = Kohana::find_file($this->_base_dir, strtolower($name), $this->_extension);

		if (! $filename )
		{			
			throw new Primalskill_Mustache_Exception(
				'Mustache template ":name" not found', array(':name' => $name)
			);
		}

		return file_get_contents($filename);
	}

	/**
	 * Set an associative array of Template sources for this loader.
	 *
	 * @param array $templates
	 */
	public function setTemplates(array $templates)
	{
		$this->_templates = array_merge($this->_templates, $templates);
	}

	/**
	 * Set a Template source by name.
	 *
	 * @param string $name
	 * @param string $template Mustache Template source
	 */
	public function setTemplate($name, $template)
	{
		$this->_templates[$name] = $template;
	}
}
