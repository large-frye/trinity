<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-03 16:52:56 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Api.php [ 14 ] in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14
2015-02-03 16:52:56 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php(14): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/frye/Doc...', 14, Array)
#1 [internal function]: Controller_Api->__construct(Object(Request), Object(Response))
#2 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#5 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#6 {main} in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14