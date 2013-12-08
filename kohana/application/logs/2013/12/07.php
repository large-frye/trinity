<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-12-07 00:21:43 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected end of file ~ APPPATH\views\settings\email.php [ 47 ] in file:line
2013-12-07 00:21:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 00:21:51 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: categories ~ APPPATH\views\settings\email.php [ 39 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:21:51 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(39): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 39, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(68): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:23:09 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: categories ~ APPPATH\views\settings\email.php [ 39 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:23:09 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(39): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 39, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(68): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:23:31 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: categories ~ APPPATH\views\settings\email.php [ 39 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:23:31 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(39): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 39, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(68): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:23:32 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: categories ~ APPPATH\views\settings\email.php [ 39 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:23:32 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(39): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 39, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(68): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:23:45 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: categories ~ APPPATH\views\settings\email.php [ 39 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:23:45 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(39): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 39, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(68): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:23:57 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: categories ~ APPPATH\views\settings\email.php [ 39 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:23:57 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(39): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 39, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(68): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:24:06 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: categories ~ APPPATH\views\settings\email.php [ 39 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:24:06 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(39): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 39, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(68): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:24:07 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: categories ~ APPPATH\views\settings\email.php [ 39 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:24:07 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(39): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 39, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(68): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:39
2013-12-07 00:26:11 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: emailTemplate ~ APPPATH\views\settings\email.php [ 9 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-07 00:26:11 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 9, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(68): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-07 00:26:49 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: emailTemplate ~ APPPATH\views\settings\email.php [ 9 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-07 00:26:49 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 9, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(68): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-07 00:26:51 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: emailTemplate ~ APPPATH\views\settings\email.php [ 9 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-07 00:26:51 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 9, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(68): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-07 00:26:56 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: emailTemplate ~ APPPATH\views\settings\email.php [ 9 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-07 00:26:56 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 9, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(68): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-07 00:27:07 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant name - assumed 'name' ~ APPPATH\views\settings\categories.php [ 10 ] in C:\wamp\www\trinity\kohana\application\views\settings\categories.php:10
2013-12-07 00:27:07 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\categories.php(10): Kohana_Core::error_handler(8, 'Use of undefine...', 'C:\wamp\www\tri...', 10, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(71): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\categories.php:10
2013-12-07 00:27:09 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant name - assumed 'name' ~ APPPATH\views\settings\categories.php [ 10 ] in C:\wamp\www\trinity\kohana\application\views\settings\categories.php:10
2013-12-07 00:27:09 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\categories.php(10): Kohana_Core::error_handler(8, 'Use of undefine...', 'C:\wamp\www\tri...', 10, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(71): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\categories.php:10
2013-12-07 00:27:10 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant name - assumed 'name' ~ APPPATH\views\settings\categories.php [ 10 ] in C:\wamp\www\trinity\kohana\application\views\settings\categories.php:10
2013-12-07 00:27:10 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\categories.php(10): Kohana_Core::error_handler(8, 'Use of undefine...', 'C:\wamp\www\tri...', 10, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(71): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\categories.php:10
2013-12-07 00:27:18 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant id - assumed 'id' ~ APPPATH\views\settings\categories.php [ 10 ] in C:\wamp\www\trinity\kohana\application\views\settings\categories.php:10
2013-12-07 00:27:18 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\categories.php(10): Kohana_Core::error_handler(8, 'Use of undefine...', 'C:\wamp\www\tri...', 10, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(71): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\categories.php:10
2013-12-07 00:27:23 --- CRITICAL: ErrorException [ 4096 ]: Object of class stdClass could not be converted to string ~ APPPATH\views\settings\categories.php [ 10 ] in C:\wamp\www\trinity\kohana\application\views\settings\categories.php:10
2013-12-07 00:27:23 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\categories.php(10): Kohana_Core::error_handler(4096, 'Object of class...', 'C:\wamp\www\tri...', 10, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(71): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\categories.php:10
2013-12-07 00:43:44 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '>' ~ APPPATH\views\settings\categories.php [ 22 ] in file:line
2013-12-07 00:43:44 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 01:00:08 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';' ~ APPPATH\views\settings\categories.php [ 2 ] in file:line
2013-12-07 01:00:08 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 01:00:32 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: REDIRECT_URL ~ APPPATH\views\settings\categories.php [ 2 ] in C:\wamp\www\trinity\kohana\application\views\settings\categories.php:2
2013-12-07 01:00:32 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\categories.php(2): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 2, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(76): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\categories.php:2
2013-12-07 01:02:51 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '{' ~ APPPATH\views\settings\categories.php [ 2 ] in file:line
2013-12-07 01:02:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 09:24:21 --- CRITICAL: View_Exception [ 0 ]: The requested view settings/edit could not be found ~ SYSPATH\classes\Kohana\View.php [ 257 ] in C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php:137
2013-12-07 09:24:21 --- DEBUG: #0 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(137): Kohana_View->set_filename('settings/edit')
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(30): Kohana_View->__construct('settings/edit', NULL)
#2 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(52): Kohana_View::factory('settings/edit')
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_categories()
#4 [internal function]: Kohana_Controller->execute()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#9 {main} in C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php:137
2013-12-07 09:29:42 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' ~ APPPATH\classes\Controller\Settings.php [ 52 ] in file:line
2013-12-07 09:29:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 09:29:43 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' ~ APPPATH\classes\Controller\Settings.php [ 52 ] in file:line
2013-12-07 09:29:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 09:29:46 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' ~ APPPATH\classes\Controller\Settings.php [ 52 ] in file:line
2013-12-07 09:29:46 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 09:29:50 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')', expecting identifier (T_STRING) or variable (T_VARIABLE) or '{' or '$' ~ APPPATH\classes\Controller\Settings.php [ 52 ] in file:line
2013-12-07 09:29:50 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 09:29:56 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\classes\Controller\Settings.php [ 52 ] in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:52
2013-12-07 09:29:56 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(52): Kohana_Core::error_handler(8, 'Trying to get p...', 'C:\wamp\www\tri...', 52, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_categories()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:52
2013-12-07 09:30:49 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\classes\Controller\Settings.php [ 52 ] in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:52
2013-12-07 09:30:49 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(52): Kohana_Core::error_handler(8, 'Trying to get p...', 'C:\wamp\www\tri...', 52, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_categories()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:52
2013-12-07 09:30:54 --- CRITICAL: ErrorException [ 8 ]: Use of undefined constant name - assumed 'name' ~ APPPATH\classes\Controller\Settings.php [ 52 ] in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:52
2013-12-07 09:30:54 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(52): Kohana_Core::error_handler(8, 'Use of undefine...', 'C:\wamp\www\tri...', 52, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_categories()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:52
2013-12-07 10:04:02 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: name ~ APPPATH\classes\Model\Settings.php [ 39 ] in C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php:39
2013-12-07 10:04:02 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php(39): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 39, Array)
#1 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(60): Model_Settings->edit_categories(Array)
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_categories()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#7 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php:39
2013-12-07 10:04:07 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: name ~ APPPATH\classes\Model\Settings.php [ 39 ] in C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php:39
2013-12-07 10:04:07 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php(39): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 39, Array)
#1 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(60): Model_Settings->edit_categories(Array)
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_categories()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#7 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php:39
2013-12-07 10:04:36 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: key ~ APPPATH\classes\Model\Settings.php [ 40 ] in C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php:40
2013-12-07 10:04:36 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php(40): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 40, Array)
#1 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(60): Model_Settings->edit_categories(Array)
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_categories()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#7 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php:40
2013-12-07 10:07:34 --- CRITICAL: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH\classes\Model\Settings.php [ 39 ] in C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php:39
2013-12-07 10:07:34 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php(39): Kohana_Core::error_handler(8, 'Trying to get p...', 'C:\wamp\www\tri...', 39, Array)
#1 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(60): Model_Settings->edit_categories(Array)
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_categories()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#7 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php:39
2013-12-07 10:10:22 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ';', expecting ')' ~ APPPATH\classes\Model\Settings.php [ 41 ] in file:line
2013-12-07 10:10:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 10:10:50 --- CRITICAL: ErrorException [ 8 ]: Undefined offset: 0 ~ APPPATH\classes\Model\Settings.php [ 39 ] in C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php:39
2013-12-07 10:10:50 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php(39): Kohana_Core::error_handler(8, 'Undefined offse...', 'C:\wamp\www\tri...', 39, Array)
#1 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(60): Model_Settings->edit_categories(Array)
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_categories()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#7 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php:39
2013-12-07 10:12:28 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: key ~ APPPATH\classes\Model\Settings.php [ 40 ] in C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php:40
2013-12-07 10:12:28 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php(40): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 40, Array)
#1 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(60): Model_Settings->edit_categories(Array)
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_categories()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#7 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php:40
2013-12-07 10:12:57 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\classes\Model\Settings.php [ 41 ] in file:line
2013-12-07 10:12:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 10:13:01 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected ')' ~ APPPATH\classes\Model\Settings.php [ 41 ] in file:line
2013-12-07 10:13:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 10:26:48 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: roles_params ~ APPPATH\classes\Model\Settings.php [ 58 ] in C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php:58
2013-12-07 10:26:48 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php(58): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 58, Array)
#1 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(66): Model_Settings->add_categories(Array)
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_categories()
#3 [internal function]: Kohana_Controller->execute()
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#7 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#8 {main} in C:\wamp\www\trinity\kohana\application\classes\Model\Settings.php:58
2013-12-07 10:39:32 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$post' (T_VARIABLE) ~ APPPATH\classes\Model\Settings.php [ 62 ] in file:line
2013-12-07 10:39:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 10:55:57 --- CRITICAL: ErrorException [ 1 ]: Cannot access empty property ~ APPPATH\classes\Model\Settings.php [ 7 ] in file:line
2013-12-07 10:55:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 10:56:26 --- CRITICAL: ErrorException [ 1 ]: Cannot access empty property ~ APPPATH\classes\Model\Settings.php [ 72 ] in file:line
2013-12-07 10:56:26 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 11:04:57 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'die' (T_EXIT) ~ APPPATH\classes\Model\Settings.php [ 33 ] in file:line
2013-12-07 11:04:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 14:00:40 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: price ~ APPPATH/views/workorders/submit.php [ 40 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/workorders/submit.php:40
2013-12-07 14:00:40 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/workorders/submit.php(40): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 40, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/application/views/admin/template.php(101): Kohana_View->__toString()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(68): Kohana_Controller_Template->after()
#9 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(108): Controller_Master->after()
#10 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Workorders.php(37): Controller_Account->after()
#11 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Controller_Workorders->after()
#12 [internal function]: Kohana_Controller->execute()
#13 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#14 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#16 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#17 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/workorders/submit.php:40
2013-12-07 14:00:56 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ SYSPATH/classes/Kohana/HTML.php [ 71 ] in /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/HTML.php:71
2013-12-07 14:00:56 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/HTML.php(71): Kohana_Core::error_handler(8, 'Array to string...', '/Users/frye/Doc...', 71, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/HTML.php(338): Kohana_HTML::chars(Array)
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Form.php(107): Kohana_HTML::attributes(Array)
#3 /Users/frye/Documents/elance/trinity/kohana/application/views/workorders/submit.php(40): Kohana_Form::input('price', Array)
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(228): Kohana_View->render()
#7 /Users/frye/Documents/elance/trinity/kohana/application/views/admin/template.php(101): Kohana_View->__toString()
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#9 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#10 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#11 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(68): Kohana_Controller_Template->after()
#12 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(108): Controller_Master->after()
#13 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Workorders.php(37): Controller_Account->after()
#14 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Controller_Workorders->after()
#15 [internal function]: Kohana_Controller->execute()
#16 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#17 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#18 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#19 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#20 {main} in /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/HTML.php:71
2013-12-07 14:01:47 --- EMERGENCY: ErrorException [ 4096 ]: Object of class stdClass could not be converted to string ~ SYSPATH/classes/Kohana/HTML.php [ 71 ] in /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/HTML.php:71
2013-12-07 14:01:47 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/HTML.php(71): Kohana_Core::error_handler(4096, 'Object of class...', '/Users/frye/Doc...', 71, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/HTML.php(338): Kohana_HTML::chars(Object(stdClass))
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Form.php(107): Kohana_HTML::attributes(Array)
#3 /Users/frye/Documents/elance/trinity/kohana/application/views/workorders/submit.php(40): Kohana_Form::input('price', Object(stdClass))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(228): Kohana_View->render()
#7 /Users/frye/Documents/elance/trinity/kohana/application/views/admin/template.php(101): Kohana_View->__toString()
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#9 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#10 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#11 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(68): Kohana_Controller_Template->after()
#12 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(108): Controller_Master->after()
#13 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Workorders.php(37): Controller_Account->after()
#14 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Controller_Workorders->after()
#15 [internal function]: Kohana_Controller->execute()
#16 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#17 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#18 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#19 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#20 {main} in /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/HTML.php:71
2013-12-07 15:45:08 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: is_expert ~ APPPATH/views/workorders/submit.php [ 175 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/workorders/submit.php:175
2013-12-07 15:45:08 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/workorders/submit.php(175): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/frye/Doc...', 175, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/application/views/admin/template.php(101): Kohana_View->__toString()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(68): Kohana_Controller_Template->after()
#9 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(108): Controller_Master->after()
#10 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Workorders.php(53): Controller_Account->after()
#11 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Controller_Workorders->after()
#12 [internal function]: Kohana_Controller->execute()
#13 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#14 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#16 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#17 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/workorders/submit.php:175
2013-12-07 16:13:05 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: is_expert ~ APPPATH/classes/Model/workorders.php [ 65 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/workorders.php:65
2013-12-07 16:13:05 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/workorders.php(65): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/frye/Doc...', 65, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Workorders.php(34): Model_Workorders->add_workorder(Array)
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Workorders->action_submit()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#7 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/workorders.php:65
2013-12-07 16:13:39 --- EMERGENCY: Database_Exception [ 1048 ]: Column 'inspection_status' cannot be null [ INSERT INTO `work_orders` () VALUES (NULL, '0', '28', '12344', 'Andrew', 'Frye', '4334 Jonathan Ct.', 'Dumfries', 'VA', '22025', '7039692180', '7039692180', '2013-12-07 04:13:39', '0', 'Hail', '12-08-2013', '1', '', 'Go to the back of the house', 1, NULL, NULL, NULL, NULL, '199.75', NULL, NULL, NULL) ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-07 16:13:39 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `wo...', false, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/workorders.php(83): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Workorders.php(34): Model_Workorders->add_workorder(Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Workorders->action_submit()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-07 16:14:15 --- EMERGENCY: Database_Exception [ 1136 ]: Column count doesn't match value count at row 1 [ INSERT INTO `work_orders` () VALUES (NULL, '0', '28', '12344', 'Andrew', 'Frye', '4334 Jonathan Ct.', 'Dumfries', 'VA', '22025', '7039692180', '7039692180', '2013-12-07 04:14:15', '0', 'Hail', '12-08-2013', '1', '', 'Go to the back of the house', NULL, NULL, NULL, '199.75', NULL, NULL, NULL) ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-07 16:14:15 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `wo...', false, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/workorders.php(81): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Workorders.php(34): Model_Workorders->add_workorder(Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Workorders->action_submit()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-07 17:04:34 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: status ~ APPPATH/classes/Controller/Workorders.php [ 36 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Workorders.php:36
2013-12-07 17:04:34 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Workorders.php(36): Kohana_Core::error_handler(8, 'Undefined index...', '/Users/frye/Doc...', 36, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Workorders->action_submit()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Workorders.php:36
2013-12-07 17:05:23 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Session_Native::add() ~ APPPATH/classes/Controller/Workorders.php [ 37 ] in file:line
2013-12-07 17:05:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 17:52:27 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Controller_Workorders::request() ~ APPPATH/classes/Controller/Workorders.php [ 59 ] in file:line
2013-12-07 17:52:27 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 17:53:01 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Controller_Workorders::request() ~ APPPATH/classes/Controller/Workorders.php [ 59 ] in file:line
2013-12-07 17:53:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-07 17:53:08 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'is ON is.id = wo.inspection_status
    		                                LEFT JO' at line 5 [ SELECT wo.*, wos.name as work_order_status, is.name as inspection_status,
    	                                           u.username 
    		                                FROM work_orders wo
    		                                LEFT JOIN work_order_status wos ON wos.id = wo.status
    		                                LEFT JOIN inspection_statuses is ON is.id = wo.inspection_status
    		                                LEFT JOIN users u ON u.id = inspector_id
    		                                WHERE wo.id = '28' ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-07 17:53:08 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT wo.*, wo...', true, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/workorders.php(111): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Workorders.php(59): Model_Workorders->get_workorder_details('28')
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Workorders->action_view()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-07 17:53:22 --- EMERGENCY: Database_Exception [ 1146 ]: Table 'trinity_data.work_order_status' doesn't exist [ SELECT wo.*, wos.name as work_order_status, is.name as inspection_status,
    	                                           u.username 
    		                                FROM work_orders wo
    		                                LEFT JOIN work_order_status wos ON wos.id = wo.status
    		                                LEFT JOIN inspection_statuses _is ON _is.id = wo.inspection_status
    		                                LEFT JOIN users u ON u.id = inspector_id
    		                                WHERE wo.id = '28' ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-07 17:53:22 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT wo.*, wo...', true, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/workorders.php(111): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Workorders.php(59): Model_Workorders->get_workorder_details('28')
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Workorders->action_view()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-07 17:53:32 --- EMERGENCY: Database_Exception [ 1054 ]: Unknown column 'is.name' in 'field list' [ SELECT wo.*, wos.name as work_order_status, is.name as inspection_status,
    	                                           u.username 
    		                                FROM work_orders wo
    		                                LEFT JOIN work_order_statuses wos ON wos.id = wo.status
    		                                LEFT JOIN inspection_statuses _is ON _is.id = wo.inspection_status
    		                                LEFT JOIN users u ON u.id = inspector_id
    		                                WHERE wo.id = '28' ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-07 17:53:32 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT wo.*, wo...', true, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/workorders.php(111): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Workorders.php(59): Model_Workorders->get_workorder_details('28')
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Workorders->action_view()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-07 17:53:37 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: admin ~ APPPATH/views/workorders/view.php [ 8 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/workorders/view.php:8
2013-12-07 17:53:37 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/workorders/view.php(8): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 8, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/application/views/admin/template.php(102): Kohana_View->__toString()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(68): Kohana_Controller_Template->after()
#9 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(115): Controller_Master->after()
#10 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Workorders.php(73): Controller_Account->after()
#11 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Controller_Workorders->after()
#12 [internal function]: Kohana_Controller->execute()
#13 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#14 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#16 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#17 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/workorders/view.php:8
2013-12-07 18:01:25 --- EMERGENCY: ErrorException [ 8 ]: Use of undefined constant ADMIN - assumed 'ADMIN' ~ APPPATH/classes/Model/account.php [ 112 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/account.php:112
2013-12-07 18:01:25 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/account.php(112): Kohana_Core::error_handler(8, 'Use of undefine...', '/Users/frye/Doc...', 112, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(51): Model_Account->get_user_type('7')
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Workorders.php(15): Controller_Account->before()
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(69): Controller_Workorders->before()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/account.php:112