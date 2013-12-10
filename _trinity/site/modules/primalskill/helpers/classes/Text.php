<?php

class Text extends Kohana_Text
{
	/**
	  * Slugify a given string
	  * Example: John's cat -> johns-cat
	  *
	  * @param string The text you want to convert
	  * @return string 
	  */
	public static function convert_to_slug($str)	
	{
		$str = strtolower(trim($str));
		$str = preg_replace('/[^a-z0-9-]/', '-', $str);
		$str = preg_replace('/-+/', "-", $str);

		return $str;
	}
	
}