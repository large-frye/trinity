<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-03-03 15:28:50 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Api.php [ 14 ] in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14
2015-03-03 15:28:50 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php(14): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/frye/Doc...', 14, Array)
#1 [internal function]: Controller_Api->__construct(Object(Request), Object(Response))
#2 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#5 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#6 {main} in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14
2015-03-03 15:28:57 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Api.php [ 14 ] in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14
2015-03-03 15:28:57 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php(14): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/frye/Doc...', 14, Array)
#1 [internal function]: Controller_Api->__construct(Object(Request), Object(Response))
#2 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#5 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#6 {main} in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14
2015-03-03 15:33:35 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/admin/template.php [ 70 ] in /Users/frye/Documents/trinity/kohana/application/views/admin/template.php:70
2015-03-03 15:33:35 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/application/views/admin/template.php(70): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 70, Array)
#1 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Master.php(82): Kohana_Controller_Template->after()
#5 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Account.php(259): Controller_Master->after()
#6 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Workorders.php(248): Controller_Account->after()
#7 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Controller.php(87): Controller_Workorders->after()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#10 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#12 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/frye/Documents/trinity/kohana/application/views/admin/template.php:70
2015-03-03 15:34:41 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/admin/template.php [ 70 ] in /Users/frye/Documents/trinity/kohana/application/views/admin/template.php:70
2015-03-03 15:34:41 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/application/views/admin/template.php(70): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 70, Array)
#1 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Master.php(82): Kohana_Controller_Template->after()
#5 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Account.php(259): Controller_Master->after()
#6 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Workorders.php(248): Controller_Account->after()
#7 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Controller.php(87): Controller_Workorders->after()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#10 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#12 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/frye/Documents/trinity/kohana/application/views/admin/template.php:70