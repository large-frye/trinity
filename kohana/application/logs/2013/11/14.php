<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-11-14 19:21:09 --- EMERGENCY: ErrorException [ 1 ]: Class 'Auth' not found ~ APPPATH/classes/Controller/Account.php [ 16 ] in file:line
2013-11-14 19:21:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-14 19:22:17 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/Account.php [ 30 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php:30
2013-11-14 19:22:17 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(30): Kohana_Core::error_handler(2, 'Attempt to assi...', '/Users/frye/Doc...', 30, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php:30
2013-11-14 19:22:32 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function render() on a non-object ~ SYSPATH/classes/Kohana/Controller/Template.php [ 44 ] in file:line
2013-11-14 19:22:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-11-14 19:22:41 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/Account.php [ 30 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php:30
2013-11-14 19:22:41 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(30): Kohana_Core::error_handler(2, 'Attempt to assi...', '/Users/frye/Doc...', 30, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php:30
2013-11-14 19:23:01 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/Account.php [ 30 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php:30
2013-11-14 19:23:01 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(30): Kohana_Core::error_handler(2, 'Attempt to assi...', '/Users/frye/Doc...', 30, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php:30
2013-11-14 19:23:02 --- EMERGENCY: ErrorException [ 2 ]: Attempt to assign property of non-object ~ APPPATH/classes/Controller/Account.php [ 30 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php:30
2013-11-14 19:23:02 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(30): Kohana_Core::error_handler(2, 'Attempt to assi...', '/Users/frye/Doc...', 30, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php:30
2013-11-14 20:30:56 --- EMERGENCY: ErrorException [ 8 ]: Use of undefined constant valid - assumed 'valid' ~ APPPATH/classes/Model/account.php [ 28 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/account.php:28
2013-11-14 20:30:56 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/account.php(28): Kohana_Core::error_handler(8, 'Use of undefine...', '/Users/frye/Doc...', 28, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(32): Model_Account->validate_login_post(Array)
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#7 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/account.php:28
2013-11-14 20:45:17 --- EMERGENCY: Kohana_Exception [ 0 ]: A valid hash key must be set in your auth config. ~ MODPATH/auth/classes/Kohana/Auth.php [ 155 ] in /Users/frye/Documents/elance/trinity/kohana/modules/auth/classes/Kohana/Auth/File.php:40
2013-11-14 20:45:17 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/auth/classes/Kohana/Auth/File.php(40): Kohana_Auth->hash('Sprite20**')
#1 /Users/frye/Documents/elance/trinity/kohana/modules/auth/classes/Kohana/Auth.php(92): Kohana_Auth_File->_login('a.frye4@gmail.c...', 'Sprite20**', false)
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(37): Kohana_Auth->login('a.frye4@gmail.c...', 'Sprite20**')
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/auth/classes/Kohana/Auth/File.php:40
2013-11-14 20:46:27 --- EMERGENCY: Kohana_Exception [ 0 ]: A valid hash key must be set in your auth config. ~ MODPATH/auth/classes/Kohana/Auth.php [ 155 ] in /Users/frye/Documents/elance/trinity/kohana/modules/auth/classes/Kohana/Auth/File.php:40
2013-11-14 20:46:27 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/auth/classes/Kohana/Auth/File.php(40): Kohana_Auth->hash('Sprite20**')
#1 /Users/frye/Documents/elance/trinity/kohana/modules/auth/classes/Kohana/Auth.php(92): Kohana_Auth_File->_login('a.frye4@gmail.c...', 'Sprite20**', false)
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(37): Kohana_Auth->login('a.frye4@gmail.c...', 'Sprite20**')
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/auth/classes/Kohana/Auth/File.php:40
2013-11-14 20:46:29 --- EMERGENCY: Kohana_Exception [ 0 ]: A valid hash key must be set in your auth config. ~ MODPATH/auth/classes/Kohana/Auth.php [ 155 ] in /Users/frye/Documents/elance/trinity/kohana/modules/auth/classes/Kohana/Auth/File.php:40
2013-11-14 20:46:29 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/auth/classes/Kohana/Auth/File.php(40): Kohana_Auth->hash('Sprite20**')
#1 /Users/frye/Documents/elance/trinity/kohana/modules/auth/classes/Kohana/Auth.php(92): Kohana_Auth_File->_login('a.frye4@gmail.c...', 'Sprite20**', false)
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(37): Kohana_Auth->login('a.frye4@gmail.c...', 'Sprite20**')
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/auth/classes/Kohana/Auth/File.php:40