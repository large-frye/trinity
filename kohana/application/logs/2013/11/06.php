<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-11-06 17:53:25 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Master::css() ~ APPPATH/classes/Model/master.php [ 8 ] in file:line
2013-11-06 17:53:25 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-06 17:53:43 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: css ~ APPPATH/views/template.php [ 13 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:13
2013-11-06 17:53:43 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/template.php(13): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 13, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:13
2013-11-06 17:54:03 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/Master.php [ 17 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:17
2013-11-06 17:54:03 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(17): Kohana_Core::error_handler(2, 'Attempt to assi...', '/Users/frye/Doc...', 17, Array)
#1 [internal function]: Controller_Master->__construct(Object(Request), Object(Response))
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#6 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:17
2013-11-06 17:54:11 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/Master.php [ 17 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:17
2013-11-06 17:54:11 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(17): Kohana_Core::error_handler(2, 'Attempt to assi...', '/Users/frye/Doc...', 17, Array)
#1 [internal function]: Controller_Master->__construct(Object(Request), Object(Response))
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#6 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:17
2013-11-06 17:54:12 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/Master.php [ 17 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:17
2013-11-06 17:54:12 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(17): Kohana_Core::error_handler(2, 'Attempt to assi...', '/Users/frye/Doc...', 17, Array)
#1 [internal function]: Controller_Master->__construct(Object(Request), Object(Response))
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#6 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:17
2013-11-06 17:54:25 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/Master.php [ 18 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:18
2013-11-06 17:54:25 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(18): Kohana_Core::error_handler(2, 'Attempt to assi...', '/Users/frye/Doc...', 18, Array)
#1 [internal function]: Controller_Master->__construct(Object(Request), Object(Response))
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#5 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#6 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:18
2013-11-06 17:55:26 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/Master.php [ 25 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:25
2013-11-06 17:55:26 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(25): Kohana_Core::error_handler(2, 'Attempt to assi...', '/Users/frye/Doc...', 25, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(19): Controller_Master->load_css()
#2 [internal function]: Controller_Master->__construct(Object(Request), Object(Response))
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:25
2013-11-06 17:55:27 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/Master.php [ 25 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:25
2013-11-06 17:55:27 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(25): Kohana_Core::error_handler(2, 'Attempt to assi...', '/Users/frye/Doc...', 25, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(19): Controller_Master->load_css()
#2 [internal function]: Controller_Master->__construct(Object(Request), Object(Response))
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:25
2013-11-06 17:55:40 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/Master.php [ 26 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:26
2013-11-06 17:55:40 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(26): Kohana_Core::error_handler(2, 'Attempt to assi...', '/Users/frye/Doc...', 26, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(19): Controller_Master->load_css()
#2 [internal function]: Controller_Master->__construct(Object(Request), Object(Response))
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:26
2013-11-06 17:56:29 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/Master.php [ 22 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:22
2013-11-06 17:56:29 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(22): Kohana_Core::error_handler(2, 'Attempt to assi...', '/Users/frye/Doc...', 22, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(69): Controller_Master->before()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:22
2013-11-06 17:56:30 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/Master.php [ 22 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:22
2013-11-06 17:56:30 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(22): Kohana_Core::error_handler(2, 'Attempt to assi...', '/Users/frye/Doc...', 22, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(69): Controller_Master->before()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:22
2013-11-06 17:57:28 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/views/template.php [ 13 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:13
2013-11-06 17:57:28 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/template.php(13): Kohana_Core::error_handler(8, 'Array to string...', '/Users/frye/Doc...', 13, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:13
2013-11-06 18:05:18 --- EMERGENCY: ErrorException [ 2 ]: scandir(/trinity/assets/css/): failed to open dir: No such file or directory ~ APPPATH/classes/Model/master.php [ 8 ] in file:line
2013-11-06 18:05:18 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'scandir(/trinit...', '/Users/frye/Doc...', 8, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/master.php(8): scandir('/trinity/assets...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Model.php(26): Model_Master->__construct()
#3 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(16): Kohana_Model::factory('master')
#4 [internal function]: Controller_Master->__construct(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2013-11-06 18:05:27 --- EMERGENCY: ErrorException [ 2 ]: scandir(/trinity/assets/css): failed to open dir: No such file or directory ~ APPPATH/classes/Model/master.php [ 8 ] in file:line
2013-11-06 18:05:27 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'scandir(/trinit...', '/Users/frye/Doc...', 8, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/master.php(8): scandir('/trinity/assets...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Model.php(26): Model_Master->__construct()
#3 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(16): Kohana_Model::factory('master')
#4 [internal function]: Controller_Master->__construct(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2013-11-06 18:05:33 --- EMERGENCY: ErrorException [ 2 ]: scandir(trinity/assets/css): failed to open dir: No such file or directory ~ APPPATH/classes/Model/master.php [ 8 ] in file:line
2013-11-06 18:05:33 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'scandir(trinity...', '/Users/frye/Doc...', 8, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/master.php(8): scandir('trinity/assets/...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Model.php(26): Model_Master->__construct()
#3 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(16): Kohana_Model::factory('master')
#4 [internal function]: Controller_Master->__construct(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in file:line
2013-11-06 18:10:07 --- EMERGENCY: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH/classes/Model/master.php [ 10 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/master.php:10
2013-11-06 18:10:07 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/master.php(10): Kohana_Core::error_handler(2, 'Invalid argumen...', '/Users/frye/Doc...', 10, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Model.php(26): Model_Master->__construct()
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(16): Kohana_Model::factory('master')
#3 [internal function]: Controller_Master->__construct(Object(Request), Object(Response))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/master.php:10
2013-11-06 19:45:25 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: nav ~ APPPATH/views/template.php [ 54 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:54
2013-11-06 19:45:25 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/template.php(54): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 54, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:54
2013-11-06 19:45:49 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: nav ~ APPPATH/views/template.php [ 54 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:54
2013-11-06 19:45:49 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/template.php(54): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 54, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:54
2013-11-06 19:45:50 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: nav ~ APPPATH/views/template.php [ 54 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:54
2013-11-06 19:45:50 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/template.php(54): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 54, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:54
2013-11-06 19:45:56 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/views/template.php [ 56 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:56
2013-11-06 19:45:56 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/template.php(56): Kohana_Core::error_handler(8, 'Array to string...', '/Users/frye/Doc...', 56, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:56
2013-11-06 19:45:57 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/views/template.php [ 56 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:56
2013-11-06 19:45:57 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/template.php(56): Kohana_Core::error_handler(8, 'Array to string...', '/Users/frye/Doc...', 56, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:56
2013-11-06 20:12:28 --- EMERGENCY: ErrorException [ 2 ]: Invalid argument supplied for foreach() ~ APPPATH/classes/Controller/Master.php [ 34 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:34
2013-11-06 20:12:28 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(34): Kohana_Core::error_handler(2, 'Invalid argumen...', '/Users/frye/Doc...', 34, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(24): Controller_Master->load_css()
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(69): Controller_Master->before()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php:34