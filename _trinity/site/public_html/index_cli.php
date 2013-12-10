<?php

// Various servers doesn't send the CLI signature correctly. This is a quick fix when you want to run something in CLI mode just run it through index_cli.php instead of index.php
$in_cli_mode = true;

define('IN_CLI_MODE', $in_cli_mode);


// Get the environment argument
if ( $_SERVER['argc'] > 1 )
{
	 // Start from 1, because the 0 is always the filename which is running by php
	for ($i = 1, $mi = count($_SERVER['argv']); $i < $mi; $i++ )
	{
	  // Separate the key from the value
		if ( strpos($_SERVER['argv'][$i], '=') )
		{
			$cli_env = explode('=', $_SERVER['argv'][$i], 2);
			
			// Found the environment part
			if ($cli_env[0] == '--environment')
			{
				putenv('KOHANA_ENV=' .strtoupper($cli_env[1]));
				
				unset($_SERVER['argv'][$i]);
				$_SERVER['argv'] = array_values($_SERVER['argv']);
				$_SERVER['argc'] -= 1;
					
				break;
			}
		}
	}
}

require('index.php');