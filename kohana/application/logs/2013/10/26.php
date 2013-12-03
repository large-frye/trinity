<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-10-26 13:01:05 --- EMERGENCY: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation ~ SYSPATH/classes/Kohana/Cookie.php [ 151 ] in /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Cookie.php:67
2013-10-26 13:01:05 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Cookie.php(67): Kohana_Cookie::salt('session', NULL)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(151): Kohana_Cookie::get('session')
#2 /Users/frye/Documents/elance/trinity/kohana/index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Cookie.php:67