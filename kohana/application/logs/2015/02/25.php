<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-25 17:50:47 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Api.php [ 14 ] in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14
2015-02-25 17:50:47 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php(14): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/frye/Doc...', 14, Array)
#1 [internal function]: Controller_Api->__construct(Object(Request), Object(Response))
#2 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#5 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#6 {main} in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14
2015-02-25 18:27:01 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Auth::getInstance() ~ APPPATH/classes/Controller/Inspections.php [ 178 ] in file:line
2015-02-25 18:27:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2015-02-25 18:27:09 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Controller_Inspections::$auth ~ APPPATH/classes/Controller/Inspections.php [ 178 ] in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Inspections.php:178
2015-02-25 18:27:09 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Inspections.php(178): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/frye/Doc...', 178, Array)
#1 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Inspections->action_form()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Inspections))
#4 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Inspections.php:178
2015-02-25 18:27:41 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Controller_Inspections::$user ~ APPPATH/classes/Controller/Inspections.php [ 178 ] in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Inspections.php:178
2015-02-25 18:27:41 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Inspections.php(178): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/frye/Doc...', 178, Array)
#1 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Inspections->action_form()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Inspections))
#4 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Inspections.php:178
2015-02-25 18:28:14 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Controller_Inspections::$trinity_auth_user ~ APPPATH/classes/Controller/Inspections.php [ 178 ] in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Inspections.php:178
2015-02-25 18:28:14 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Inspections.php(178): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/frye/Doc...', 178, Array)
#1 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Inspections->action_form()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Inspections))
#4 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Inspections.php:178
2015-02-25 18:28:29 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Auth::get_instance() ~ APPPATH/classes/Controller/Inspections.php [ 178 ] in file:line
2015-02-25 18:28:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line