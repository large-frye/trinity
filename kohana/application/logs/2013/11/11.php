<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-11-11 21:02:24 --- EMERGENCY: ErrorException [ 4096 ]: Argument 1 passed to Controller_Master::__construct() must be an instance of Kohana_Request, none given, called in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php on line 8 and defined ~ APPPATH/classes/Controller/Master.php [ 12 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:12
2013-11-11 21:02:24 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(12): Kohana_Core::error_handler(4096, 'Argument 1 pass...', '/Users/frye/Doc...', 12, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(8): Controller_Master->__construct()
#2 [internal function]: Controller_Account->__construct(Object(Request), Object(Response))
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:12
2013-11-11 21:03:31 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Controller_Account::$masterModel ~ APPPATH/classes/Controller/Master.php [ 34 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:34
2013-11-11 21:03:31 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(34): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/frye/Doc...', 34, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(24): Controller_Master->load_css()
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(69): Controller_Master->before()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:34
2013-11-11 21:03:57 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: Controller_Account::$masterModel ~ APPPATH/classes/Controller/Master.php [ 34 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:34
2013-11-11 21:03:57 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(34): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/frye/Doc...', 34, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(24): Controller_Master->load_css()
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(69): Controller_Master->before()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:34
2013-11-11 21:06:41 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/template.php [ 75 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:75
2013-11-11 21:06:41 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/template.php(75): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 75, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:75
2013-11-11 21:06:41 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/template.php [ 75 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:75
2013-11-11 21:06:41 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/template.php(75): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 75, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:75
2013-11-11 21:06:41 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/template.php [ 75 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:75
2013-11-11 21:06:41 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/template.php(75): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 75, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:75
2013-11-11 21:06:46 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/template.php [ 75 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:75
2013-11-11 21:06:46 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/template.php(75): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 75, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:75