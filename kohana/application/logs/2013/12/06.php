<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-12-06 21:44:58 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '=' ~ APPPATH\classes\Model\Settings.php [ 12 ] in file:line
2013-12-06 21:44:58 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-06 21:45:01 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '=' ~ APPPATH\classes\Model\Settings.php [ 12 ] in file:line
2013-12-06 21:45:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-06 21:50:23 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Settings::get_email_template() ~ APPPATH\classes\Controller\Settings.php [ 32 ] in file:line
2013-12-06 21:50:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-06 21:51:17 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Settings::get_email_template() ~ APPPATH\classes\Controller\Settings.php [ 32 ] in file:line
2013-12-06 21:51:17 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-06 21:51:20 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Settings::get_email_template() ~ APPPATH\classes\Controller\Settings.php [ 32 ] in file:line
2013-12-06 21:51:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-06 21:51:22 --- CRITICAL: ErrorException [ 1 ]: Call to undefined method Model_Settings::get_email_template() ~ APPPATH\classes\Controller\Settings.php [ 32 ] in file:line
2013-12-06 21:51:22 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-06 21:53:58 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: emails ~ APPPATH\views\settings\email.php [ 9 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-06 21:53:58 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 9, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(50): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-06 21:55:26 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: names ~ APPPATH\views\settings\email.php [ 9 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-06 21:55:26 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 9, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(50): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-06 22:05:12 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'echo' (T_ECHO) ~ APPPATH\views\settings\email.php [ 11 ] in file:line
2013-12-06 22:05:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-06 22:05:20 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'echo' (T_ECHO), expecting ',' or ';' ~ APPPATH\views\settings\email.php [ 11 ] in file:line
2013-12-06 22:05:20 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-06 22:05:28 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: emails ~ APPPATH\views\settings\email.php [ 9 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-06 22:05:28 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 9, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(50): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-06 22:10:28 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: emails ~ APPPATH\views\settings\email.php [ 9 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-06 22:10:28 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 9, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(50): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-06 22:10:29 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: emails ~ APPPATH\views\settings\email.php [ 9 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-06 22:10:29 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 9, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(50): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:9
2013-12-06 22:14:03 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: emails ~ APPPATH\views\settings\email.php [ 8 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:8
2013-12-06 22:14:03 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(8): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 8, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(50): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:8
2013-12-06 22:18:17 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: emails ~ APPPATH\views\settings\email.php [ 8 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:8
2013-12-06 22:18:17 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(8): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 8, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(50): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:8
2013-12-06 22:19:32 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: emailTemplate ~ APPPATH\views\settings\email.php [ 8 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:8
2013-12-06 22:19:32 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(8): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 8, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(50): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:8
2013-12-06 22:21:10 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Controller_Settings::$account_model ~ APPPATH\classes\Controller\Settings.php [ 34 ] in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:34
2013-12-06 22:21:10 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(34): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\wamp\www\tri...', 34, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_email()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:34
2013-12-06 22:21:39 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: emailTemplate ~ APPPATH\views\settings\email.php [ 8 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:8
2013-12-06 22:21:39 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(8): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 8, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(52): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:8
2013-12-06 22:25:29 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: emailTemplate ~ APPPATH\views\settings\email.php [ 8 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:8
2013-12-06 22:25:29 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(8): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 8, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(52): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:8
2013-12-06 22:25:32 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: emailTemplate ~ APPPATH\views\settings\email.php [ 8 ] in C:\wamp\www\trinity\kohana\application\views\settings\email.php:8
2013-12-06 22:25:32 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\settings\email.php(8): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 8, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(228): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_View->__toString()
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#8 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#9 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(52): Controller_Master->after()
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#11 [internal function]: Kohana_Controller->execute()
#12 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#13 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#16 {main} in C:\wamp\www\trinity\kohana\application\views\settings\email.php:8
2013-12-06 22:26:50 --- CRITICAL: Kohana_Exception [ 0 ]: View variable is not set: emailTemplate ~ SYSPATH\classes\Kohana\View.php [ 171 ] in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:33
2013-12-06 22:26:50 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(33): Kohana_View->__get('emailTemplate')
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_email()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:33
2013-12-06 22:33:38 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected 'echo' (T_ECHO), expecting ',' or ';' ~ APPPATH\views\settings\email.php [ 14 ] in file:line
2013-12-06 22:33:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-06 22:37:05 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}', expecting ',' or ';' ~ APPPATH\views\settings\email.php [ 20 ] in file:line
2013-12-06 22:37:05 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-06 23:02:13 --- CRITICAL: ErrorException [ 8 ]: Undefined property: Controller_Settings::$_settings_model ~ APPPATH\classes\Controller\Settings.php [ 35 ] in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:35
2013-12-06 23:02:13 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(35): Kohana_Core::error_handler(8, 'Undefined prope...', 'C:\wamp\www\tri...', 35, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_email()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:35
2013-12-06 23:14:16 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: validation_result ~ APPPATH\classes\Controller\Settings.php [ 37 ] in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:37
2013-12-06 23:14:16 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(37): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 37, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_email()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:37
2013-12-06 23:18:00 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ APPPATH\classes\Model\Settings.php [ 22 ] in file:line
2013-12-06 23:18:00 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-06 23:18:16 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '->' (T_OBJECT_OPERATOR) ~ APPPATH\classes\Model\Settings.php [ 22 ] in file:line
2013-12-06 23:18:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-06 23:21:23 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '$view' (T_VARIABLE) ~ APPPATH\classes\Controller\Settings.php [ 42 ] in file:line
2013-12-06 23:21:23 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line