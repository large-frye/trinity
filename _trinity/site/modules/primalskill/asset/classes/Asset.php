<?php

/**
 * Asset loading class, separated from View. 
 * PHP 5.3+
 * 
 * @author Primal Skill Ltd.
 * @copyright (c) 2012
 * @version 3.1
 */
class Asset
{
	/**
	 * @var array Holds the various asset paths.
	 */
	protected $_paths = array();
	
	
	/**
	 * @var array Holds the assets which needs to be loaded for the request.
	 */
	protected $_to_load = array();
	
	
	/**
	 * @var string Holds the Javascript options container if any.
	 */
	protected $_js_options = array();
	
	/**
	 * Singleton pattern for loading the Assets.
	 *
	 * @return object The Asset instance
	 *
	 */
	protected static $_instance = null;
	public static function instance()
	{
		if ( Asset::$_instance === null ) { Asset::$_instance = new Asset(); }
		return Asset::$_instance;
	}
	protected function __construct() {}
	
		
	/**
	 * PHP 5.3+ function
	 * Allows the creation of assets using the short syntax: `Asset::css('reset', 'forms', 'style', ...);`
	 * Also acts as an asset register and setter / getter
	 * Example: `->register_css('css_name', '/path/to/css', 'additional options');`
	 * To get an asset group don't pass anything in the arguments: `->css();`
	 * 
	 * @param string $method Method name (ex. css, js)
	 * @param array $args Method assets ([0] - reset, [1] - forms, [2] - style, ...)
	 * @return object|array Returns the Asset object for register and setter, returns the asset group from _to_load.
	 *
	 */
	public function __call($method, $args)
	{	
		// Handle asset registration too
		if ( stristr($method, 'register_') !== false )
		{
			/*
				Get the type of registration
				Example: register_css(<name>, <path>, <additional>);
			*/
			$this->_register(ltrim($method, 'register_'), $args);
			
			return $this;	
		}
		
		// Act as a setter
		if (! empty($args) )
		{
			$this->_load_assets($method, $args);
			return $this;
		}
	
		// Act as a getter
		if ( array_key_exists($method, $this->_to_load) )
		{
			return $this->_to_load[$method];
		}
		
		return false;
//		throw new Asset_Exception('Asset group :grp does not exists.', array(':grp' => $method));
	}


	/**
	 * Register an asset
	 *
	 * @param string The type of the asset (e.g. css, js, flash).
	 * @param array Arguments past along. [0] -> asset name, [1] -> asset path, [2] -> optional, asset options
	 * @return none
	 *
	 */
	protected function _register($type, $args)
	{
		if (count($args) < 2) 
		{
			throw new Asset_Exception('Asset method :method_name needs at least 2 arguments, :cnt given.', array(':method_name' => 'register_' .$type, ':cnt' => count($args)));
		}
		
		if (! isset($this->_paths[$type]) ) { $this->_paths[$type] = array(); }
		
		$this->_paths[$type][$args[0]] = array('path' => $args[1]);
		if ( isset($args[2]) )
		{
			$this->_paths[$type][$args[0]]['options'] = $args[2];
		}
	}


	/**
	 * Loads one or more assets into _to_load array
	 *
	 * @param string The type of the asset (e.g. css, js, flash).
	 * @param array Arguments past along. [0] -> asset name 1, [1] -> asset name 2, ...
	 * @return none
	 *
	 */
	protected function _load_assets($type, Array $asset_keys)
	{		
		if ( is_array($asset_keys[0]) )
		{
			if (empty($asset_keys[0])) { return $this; }

			$asset_keys = $asset_keys[0];
		}

		// Verify if the asset group is registered in _paths
		if (! array_key_exists($type, $this->_paths) )
		{
			throw new Asset_Exception('Asset group :asset_group is not registered.', array(':asset_group' => $type));
		}

		// If the array group does not exists in _to_load then create it
		if (! array_key_exists($type, $this->_to_load) ) { $this->_to_load[$type] = array(); }
	
		for ($i=0, $mi=count($asset_keys); $i<$mi; $i++)
		{
			if (! isset($this->_paths[$type][$asset_keys[$i]]) )
			{
				throw new Asset_Exception('Trying to load an unregistered asset: :asset_item.', array(':asset_item' => $asset_keys[$i]));
			}
			else
			{
				$this->_to_load[$type][$asset_keys[$i]] =& $this->_paths[$type][$asset_keys[$i]];
			}			
		}
	}
	
	/**
	 * Create Javascript options in a specified namespace. Uses the base.js which uses JS.namespace()
	 *
	 * @param string Dot delimited namespace. E.g. admin.dashboard
	 * @param array Array of options that will be converted to JSON
	 * @return object Asset
	 *
	 */		
	public function add_js_option($namespace, array $options)
	{
		if (! array_key_exists($namespace, $this->_js_options) )
		{
			$this->_js_options[$namespace] = array();
		}
		
		$this->_js_options[$namespace] = Arr::merge($this->_js_options[$namespace], $options);
	
		return $this;
	}
	

	/**
	 * Get the Javascript options back. 
	 *
	 * @return array The Javascript options container array.
	 *
	 */
	public function get_js_options() { return $this->_js_options; }
}

/*
class Asset
{

	/* TODO: to be implemented
	public function render_css()
	{
		$t = &$this->{'_' .$type .'_to_load'};
		
	
		// Move the files to the docroot and set up initial folders
		if (! is_dir(DOCROOT .'assets-gen')) { mkdir(DOCROOT .'assets-gen', 0755, true); }
		
		// Generate unique directory for the asset files
		$uid = md5(json_encode($this->_css_to_load));		
		if (! is_dir(DOCROOT .'assets-gen/' .$uid)) { mkdir(DOCROOT .'assets-gen/' .$uid, 0755, true); }
		
		$public_paths = array();
		for ($i=0, $mi=count($this->_css_to_load); $i<$mi; $i++)
		{
			if ( (is_file($t[$i]['path'])) && ($t[$i]['additional'] === false) )
			{
				file_put_contents()
			}	
		}
		
		
		
		var_dump($this->_css_to_load);exit;
				
	}
	
	private function _concatenate($type)
	{
		$t = &$this->{'_' .$type .'_to_load'};
		
		if ( empty($t) )
		{
			throw new Asset_Exception($type .' Array is empty.');
		}
		
		$asset_content = '';
		for ($i=0, $mi=count($t); $i<$mi; $i++)
		{			
			if ( (is_file($t[$i]['path'])) && ($t[$i]['additional'] === false) )
			{
				$asset_content .= file_get_contents($t[$i]['path']);
			}
		}
	}
	
}
*/



