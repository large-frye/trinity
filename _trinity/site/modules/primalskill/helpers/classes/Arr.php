<?php

class Arr extends Kohana_Arr
{
	public static function subval_sort($a, $subkey)
	{
		foreach($a as $k=>$v) 
		{
			$b[$k] = strtolower($v[$subkey]);
		}
		asort($b);
		foreach($b as $key=>$val) {
			$c[] = $a[$key];
		}
		return $c;		
	}	
}