<?php

/**
 * Custom security class extends Kohana security.
 *
 * @author Primal Skill
 * @version 2.0
 * @copyright (c) 2011
 *
 */

class Psk_Security extends Kohana_Security
{
	/**
	 * Sanitize input, usually from form POSTs.
	 *
	 * @param string|array The data that needs to be sanitized.
	 * @param boolean Whether to use Kohana's entities or PHP's strip_tags. 
	 * @return string|array Returns array if array was supplied. Converts every type to string (including integers).
	 * 
	*/
	public static function sanitize($data, $use_entities = true)
	{
		if (! is_array($data) )
		{
			// Only sanitize strings
			if (! is_string($data) ) { return $data; }
			
			if ($use_entities !== false)
			{
				return HTML::entities(trim($data));
			}

			return strip_tags($data);
		}
		
		// data is an array
		return self::array_map_r($data, $use_entities);
	}

	/**
	 * Decode escaped data, usually from form POSTs.
	 *
	 * @param string|array The data that needs to be decoded.
	 * @return string|array Returns array if array was supplied. Converts every type to string (including integers).
	 * 
	*/
	public static function decode($data)
	{
		if (! is_array($data) )
		{
			// Only sanitize strings
			if (! is_string($data) ) { return $data; }
			
			return html_entity_decode($data, ENT_QUOTES, Kohana::$charset);
		}
		
		// data is an array
		return self::array_map_r_decode($data);
	}
	

	/**
	 * Used for decoding arrays.
	 * 
	 * @see self::decode()
	 */
	protected static function array_map_r_decode($arr)
	{
		$tmp = array();
		foreach ($arr as $key => $value)
		{
			if ( is_array($value) )
			{
				$tmp[$key] = self::array_map_r_decode($value);
			}
			else
			{
				$tmp[$key] = self::decode($value);				
			}
		}
		
		return $tmp;
	}

	

	
	
	/**
	 * Used for sanitizing arrays.
	 * 
	 * @see self::sanitize()
	 */
	protected static function array_map_r($arr, $use_entities)
	{
		$tmp = array();
		foreach ($arr as $key => $value)
		{
			if ( is_array($value) )
			{
				$tmp[$key] = self::array_map_r($value, $use_entities);
			}
			else
			{
				$tmp[$key] = self::sanitize($value, $use_entities);				
			}
		}
		
		return $tmp;
	}
	
	
	/**
	 * Returns the token in the session or generates a new one.
	 *
	 * @return  string
	 */
	public static function CSRF_token()
	{
		$token = Session::instance()->get('csrf-token');

		// Generate a new token if no token is found
		if ( ! $token)
		{
			$token = Text::random('alnum', rand(20, 30));
			Session::instance()->set('csrf-token', $token);
		}

		return $token;
	}

	/**
	 * Validation rule for checking a valid token
	 *
	 * @param   string  $token - the token string to check for
	 * @return  bool
	 */
	public static function CSRF_valid($token)
	{
		return $token === self::CSRF_token();
	}
	
}