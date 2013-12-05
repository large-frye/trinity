<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-12-04 18:35:03 --- EMERGENCY: View_Exception [ 0 ]: The requested view admin_template could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php:137
2013-12-04 18:35:03 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(137): Kohana_View->set_filename('admin_template')
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(30): Kohana_View->__construct('admin_template', NULL)
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(33): Kohana_View::factory('admin_template')
#3 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(31): Kohana_Controller_Template->before()
#4 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(26): Controller_Master->before()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(69): Controller_Account->before()
#6 [internal function]: Kohana_Controller->execute()
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#10 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#11 {main} in /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php:137
2013-12-04 20:11:58 --- EMERGENCY: ORM_Validation_Exception [ 0 ]: Failed to validate array ~ MODPATH/orm/classes/Kohana/ORM.php [ 1275 ] in /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Kohana/ORM.php:1302
2013-12-04 20:11:58 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Kohana/ORM.php(1302): Kohana_ORM->check(Object(Validation))
#1 /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Model/Auth/User.php(168): Kohana_ORM->create(Object(Validation))
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/users.php(14): Model_Auth_User->create_user(Array, Array)
#3 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Users.php(40): Model_Users->create_user(Array)
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Users->action_new()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Users))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Kohana/ORM.php:1302
2013-12-04 20:13:47 --- EMERGENCY: ORM_Validation_Exception [ 0 ]: Failed to validate array ~ MODPATH/orm/classes/Kohana/ORM.php [ 1277 ] in /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Kohana/ORM.php:1304
2013-12-04 20:13:47 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Kohana/ORM.php(1304): Kohana_ORM->check(Object(Validation))
#1 /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Model/Auth/User.php(168): Kohana_ORM->create(Object(Validation))
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/users.php(14): Model_Auth_User->create_user(Array, Array)
#3 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Users.php(40): Model_Users->create_user(Array)
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Users->action_new()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Users))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Kohana/ORM.php:1304
2013-12-04 20:14:05 --- EMERGENCY: ORM_Validation_Exception [ 0 ]: Failed to validate array ~ MODPATH/orm/classes/Kohana/ORM.php [ 1277 ] in /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Kohana/ORM.php:1304
2013-12-04 20:14:05 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Kohana/ORM.php(1304): Kohana_ORM->check(Object(Validation))
#1 /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Model/Auth/User.php(168): Kohana_ORM->create(Object(Validation))
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/users.php(14): Model_Auth_User->create_user(Array, Array)
#3 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Users.php(40): Model_Users->create_user(Array)
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Users->action_new()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Users))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Kohana/ORM.php:1304
2013-12-04 20:14:31 --- EMERGENCY: ORM_Validation_Exception [ 0 ]: Failed to validate array ~ MODPATH/orm/classes/Kohana/ORM.php [ 1275 ] in /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Kohana/ORM.php:1302
2013-12-04 20:14:31 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Kohana/ORM.php(1302): Kohana_ORM->check(Object(Validation))
#1 /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Model/Auth/User.php(168): Kohana_ORM->create(Object(Validation))
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/users.php(15): Model_Auth_User->create_user(Array, Array)
#3 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Users.php(40): Model_Users->create_user(Array)
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Users->action_new()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Users))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/orm/classes/Kohana/ORM.php:1302
2013-12-04 20:22:52 --- EMERGENCY: Database_Exception [ 1136 ]: Column count doesn't match value count at row 1 [ INSERT INTO `roles` () VALUES ('2', 5) ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-04 20:22:52 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `ro...', false, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/users.php(46): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Users.php(40): Model_Users->create_user(Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Users->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Users))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-04 20:24:52 --- EMERGENCY: Database_Exception [ 1452 ]: Cannot add or update a child row: a foreign key constraint fails (`trinity_data`.`roles_users`, CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE) [ INSERT INTO `roles_users` () VALUES ('2', 6) ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-04 20:24:52 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(2, 'INSERT INTO `ro...', false, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/users.php(46): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Users.php(40): Model_Users->create_user(Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Users->action_new()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Users))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-04 20:35:29 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_User::roles() ~ APPPATH/classes/Model/users.php [ 61 ] in file:line
2013-12-04 20:35:29 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-04 20:46:07 --- EMERGENCY: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH/classes/Kohana/Session.php [ 324 ] in /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Session.php:125
2013-12-04 20:46:07 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Session.php(125): Kohana_Session->read(NULL)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Session.php(54): Kohana_Session->__construct(NULL, NULL)
#2 /Users/frye/Documents/elance/trinity/kohana/modules/auth/classes/Kohana/Auth.php(58): Kohana_Session::instance('native')
#3 /Users/frye/Documents/elance/trinity/kohana/modules/auth/classes/Kohana/Auth.php(37): Kohana_Auth->__construct(Object(Config_Group))
#4 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(28): Kohana_Auth::instance()
#5 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Users.php(18): Controller_Account->before()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(69): Controller_Users->before()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Users))
#9 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#11 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Session.php:125
2013-12-04 21:08:08 --- CRITICAL: ErrorException [ 2 ]: scandir(/Users/frye/Documents/elance/trinity/assets/css,/Users/frye/Documents/elance/trinity/assets/css): The system cannot find the path specified. (code: 3) ~ APPPATH\classes\Model\Master.php [ 33 ] in file:line
2013-12-04 21:08:08 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'scandir(/Users/...', 'C:\wamp\www\tri...', 33, Array)
#1 C:\wamp\www\trinity\kohana\application\classes\Model\Master.php(33): scandir('/Users/frye/Doc...')
#2 C:\wamp\www\trinity\kohana\application\classes\Model\Master.php(9): Model_Master->get_css_files()
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Model.php(26): Model_Master->__construct()
#4 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(20): Kohana_Model::factory('master')
#5 [internal function]: Controller_Master->__construct(Object(Request), Object(Response))
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#7 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#9 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#10 {main} in file:line
2013-12-04 21:52:52 --- CRITICAL: Kohana_Exception [ 0 ]: View variable is not set: homepage ~ SYSPATH\classes\Kohana\View.php [ 171 ] in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:16
2013-12-04 21:52:52 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(16): Kohana_View->__get('homepage')
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:16
2013-12-04 21:53:48 --- CRITICAL: Kohana_Exception [ 0 ]: View variable is not set: homepage ~ SYSPATH\classes\Kohana\View.php [ 171 ] in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:16
2013-12-04 21:53:48 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(16): Kohana_View->__get('homepage')
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:16
2013-12-04 21:53:49 --- CRITICAL: Kohana_Exception [ 0 ]: View variable is not set: homepage ~ SYSPATH\classes\Kohana\View.php [ 171 ] in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:16
2013-12-04 21:53:49 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(16): Kohana_View->__get('homepage')
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:16
2013-12-04 21:53:54 --- CRITICAL: Kohana_Exception [ 0 ]: View variable is not set: homepage ~ SYSPATH\classes\Kohana\View.php [ 171 ] in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:16
2013-12-04 21:53:54 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(16): Kohana_View->__get('homepage')
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:16
2013-12-04 21:53:54 --- CRITICAL: Kohana_Exception [ 0 ]: View variable is not set: homepage ~ SYSPATH\classes\Kohana\View.php [ 171 ] in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:16
2013-12-04 21:53:54 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(16): Kohana_View->__get('homepage')
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:16
2013-12-04 21:53:54 --- CRITICAL: Kohana_Exception [ 0 ]: View variable is not set: homepage ~ SYSPATH\classes\Kohana\View.php [ 171 ] in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:16
2013-12-04 21:53:54 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(16): Kohana_View->__get('homepage')
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(84): Controller_Settings->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php:16
2013-12-04 21:55:44 --- EMERGENCY: Kohana_Exception [ 0 ]: View variable is not set: homepage ~ SYSPATH/classes/Kohana/View.php [ 171 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Settings.php:11
2013-12-04 21:55:44 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Settings.php(11): Kohana_View->__get('homepage')
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(69): Controller_Settings->before()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Settings.php:11
2013-12-04 21:55:59 --- EMERGENCY: Kohana_Exception [ 0 ]: View variable is not set: homepage ~ SYSPATH/classes/Kohana/View.php [ 171 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Settings.php:11
2013-12-04 21:55:59 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Settings.php(11): Kohana_View->__get('homepage')
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(69): Controller_Settings->before()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Settings.php:11
2013-12-04 21:56:39 --- EMERGENCY: Kohana_Exception [ 0 ]: View variable is not set: homepage ~ SYSPATH/classes/Kohana/View.php [ 171 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Settings.php:11
2013-12-04 21:56:39 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Settings.php(11): Kohana_View->__get('homepage')
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(69): Controller_Settings->before()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Settings.php:11
2013-12-04 22:31:38 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected end of file, expecting function (T_FUNCTION) ~ APPPATH\classes\Model\Settings.php [ 18 ] in file:line
2013-12-04 22:31:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-04 22:32:03 --- CRITICAL: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH\views\admin\template.php [ 101 ] in C:\wamp\www\trinity\kohana\application\views\admin\template.php:101
2013-12-04 22:32:03 --- DEBUG: #0 C:\wamp\www\trinity\kohana\application\views\admin\template.php(101): Kohana_Core::error_handler(8, 'Undefined varia...', 'C:\wamp\www\tri...', 101, Array)
#1 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(61): include('C:\wamp\www\tri...')
#2 C:\wamp\www\trinity\kohana\system\classes\Kohana\View.php(348): Kohana_View::capture('C:\wamp\www\tri...', Array)
#3 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller\Template.php(44): Kohana_View->render()
#4 C:\wamp\www\trinity\kohana\application\classes\Controller\Master.php(68): Kohana_Controller_Template->after()
#5 C:\wamp\www\trinity\kohana\application\classes\Controller\Settings.php(30): Controller_Master->after()
#6 C:\wamp\www\trinity\kohana\system\classes\Kohana\Controller.php(87): Controller_Settings->after()
#7 [internal function]: Kohana_Controller->execute()
#8 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Settings))
#9 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 C:\wamp\www\trinity\kohana\system\classes\Kohana\Request.php(995): Kohana_Request_Client->execute(Object(Request))
#11 C:\wamp\www\trinity\kohana\index.php(118): Kohana_Request->execute()
#12 {main} in C:\wamp\www\trinity\kohana\application\views\admin\template.php:101
2013-12-04 22:38:11 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}', expecting ',' or ';' ~ APPPATH\classes\Model\Settings.php [ 21 ] in file:line
2013-12-04 22:38:11 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2013-12-04 22:38:51 --- CRITICAL: ErrorException [ 4 ]: syntax error, unexpected '}', expecting ',' or ';' ~ APPPATH\classes\Model\Settings.php [ 21 ] in file:line
2013-12-04 22:38:51 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line