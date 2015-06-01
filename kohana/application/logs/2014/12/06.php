<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-12-06 16:55:58 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Auth_ORM::user() ~ APPPATH/classes/Controller/Api.php [ 11 ] in file:line
2014-12-06 16:55:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-06 16:56:41 --- EMERGENCY: ErrorException [ 2 ]: Creating default object from empty value ~ APPPATH/classes/Controller/Api.php [ 11 ] in /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Api.php:11
2014-12-06 16:56:41 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Api.php(11): Kohana_Core::error_handler(2, 'Creating defaul...', '/Users/frye/Doc...', 11, Array)
#1 [internal function]: Controller_Api->__construct(Object(Request), Object(Response))
#2 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#3 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#5 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#6 {main} in /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Api.php:11
2014-12-06 16:57:12 --- EMERGENCY: ErrorException [ 2 ]: Creating default object from empty value ~ APPPATH/classes/Controller/Api.php [ 13 ] in /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Api.php:13
2014-12-06 16:57:12 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Api.php(13): Kohana_Core::error_handler(2, 'Creating defaul...', '/Users/frye/Doc...', 13, Array)
#1 [internal function]: Controller_Api->__construct(Object(Request), Object(Response))
#2 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#3 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#5 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#6 {main} in /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Api.php:13