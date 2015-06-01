<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-12-01 20:11:00 --- EMERGENCY: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation ~ SYSPATH/classes/Kohana/Cookie.php [ 151 ] in /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Cookie.php:67
2014-12-01 20:11:00 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Cookie.php(67): Kohana_Cookie::salt('session', NULL)
#1 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(151): Kohana_Cookie::get('session')
#2 /Users/frye/Documents/trinity/kohana_new/index.php(117): Kohana_Request::factory(true, Array, false)
#3 {main} in /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Cookie.php:67
2014-12-01 20:21:40 --- EMERGENCY: Database_Exception [ 8192 ]: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:171
2014-12-01 20:21:40 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php(171): Kohana_Database_MySQL->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT u.userna...', true, Array)
#2 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Workorders.php(465): Kohana_Database_Query->execute(Object(Database_MySQL))
#3 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Api.php(22): Model_Workorders->get_clients('json')
#4 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Api->action_getClients()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:171
2014-12-01 20:21:47 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Request::redirect() ~ APPPATH/classes/Controller/Account.php [ 51 ] in file:line
2014-12-01 20:21:47 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-01 20:24:22 --- EMERGENCY: Database_Exception [ 8192 ]: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:171
2014-12-01 20:24:22 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php(171): Kohana_Database_MySQL->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT u.userna...', true, Array)
#2 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Workorders.php(465): Kohana_Database_Query->execute(Object(Database_MySQL))
#3 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Api.php(22): Model_Workorders->get_clients('json')
#4 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Api->action_getClients()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:171
2014-12-01 20:24:31 --- EMERGENCY: Database_Exception [ 8192 ]: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 20:24:31 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php(431): Kohana_Database_MySQL->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database.php(478): Kohana_Database_MySQL->escape('a.frye4@gmail.c...')
#2 [internal function]: Kohana_Database->quote('a.frye4@gmail.c...')
#3 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(196): array_map(Array, Array)
#4 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query->compile(Object(Database_MySQL))
#5 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Users.php(243): Kohana_Database_Query->execute(Object(Database_MySQL))
#6 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(134): Model_Users->check_if_user_is_deleted('a.frye4@gmail.c...')
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#10 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#12 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 20:25:54 --- EMERGENCY: ErrorException [ 1 ]: Class 'Database_Mysqli' not found ~ MODPATH/database/classes/Kohana/Database.php [ 78 ] in file:line
2014-12-01 20:25:54 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-01 20:26:45 --- EMERGENCY: ErrorException [ 1 ]: Class 'Database_MySQLi' not found ~ MODPATH/database/classes/Kohana/Database.php [ 78 ] in file:line
2014-12-01 20:26:45 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-01 20:27:51 --- EMERGENCY: Database_Exception [ 0 ]: invalid data source name ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/PDO.php:242
2014-12-01 20:27:51 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/PDO.php(242): Kohana_Database_PDO->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database.php(478): Kohana_Database_PDO->escape('a.frye4@gmail.c...')
#2 [internal function]: Kohana_Database->quote('a.frye4@gmail.c...')
#3 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(196): array_map(Array, Array)
#4 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query->compile(Object(Database_PDO))
#5 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Users.php(243): Kohana_Database_Query->execute(Object(Database_PDO))
#6 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(134): Model_Users->check_if_user_is_deleted('a.frye4@gmail.c...')
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#10 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#12 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/PDO.php:242
2014-12-01 20:29:35 --- EMERGENCY: ErrorException [ 1 ]: Using $this when not in object context ~ APPPATH/config/database.php [ 80 ] in file:line
2014-12-01 20:29:35 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-01 20:29:44 --- EMERGENCY: Database_Exception [ 0 ]: invalid data source name ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/PDO.php:242
2014-12-01 20:29:44 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/PDO.php(242): Kohana_Database_PDO->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database.php(478): Kohana_Database_PDO->escape('a.frye4@gmail.c...')
#2 [internal function]: Kohana_Database->quote('a.frye4@gmail.c...')
#3 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(196): array_map(Array, Array)
#4 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query->compile(Object(Database_PDO))
#5 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Users.php(243): Kohana_Database_Query->execute(Object(Database_PDO))
#6 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(134): Model_Users->check_if_user_is_deleted('a.frye4@gmail.c...')
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#10 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#12 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/PDO.php:242
2014-12-01 20:33:12 --- EMERGENCY: Kohana_Exception [ 0 ]: Database method list_columns is not supported by Kohana_Database_PDO ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 235 ] in /Users/frye/Documents/trinity/kohana_new/modules/orm/classes/Kohana/ORM.php:1668
2014-12-01 20:33:12 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/orm/classes/Kohana/ORM.php(1668): Kohana_Database_PDO->list_columns('users')
#1 /Users/frye/Documents/trinity/kohana_new/modules/orm/classes/Kohana/ORM.php(444): Kohana_ORM->list_columns()
#2 /Users/frye/Documents/trinity/kohana_new/modules/orm/classes/Kohana/ORM.php(389): Kohana_ORM->reload_columns()
#3 /Users/frye/Documents/trinity/kohana_new/modules/orm/classes/Kohana/ORM.php(254): Kohana_ORM->_initialize()
#4 /Users/frye/Documents/trinity/kohana_new/modules/orm/classes/Kohana/ORM.php(46): Kohana_ORM->__construct(NULL)
#5 /Users/frye/Documents/trinity/kohana_new/modules/orm/classes/Kohana/Auth/ORM.php(79): Kohana_ORM::factory('User')
#6 /Users/frye/Documents/trinity/kohana_new/modules/auth/classes/Kohana/Auth.php(92): Kohana_Auth_ORM->_login('a.frye4@gmail.c...', '1234556', false)
#7 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(136): Kohana_Auth->login('a.frye4@gmail.c...', '1234556')
#8 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#11 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#13 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/frye/Documents/trinity/kohana_new/modules/orm/classes/Kohana/ORM.php:1668
2014-12-01 20:36:47 --- EMERGENCY: Database_Exception [ 0 ]: invalid data source name ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 59 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/PDO.php:242
2014-12-01 20:36:47 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/PDO.php(242): Kohana_Database_PDO->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database.php(478): Kohana_Database_PDO->escape('a.frye4@gmail.c...')
#2 [internal function]: Kohana_Database->quote('a.frye4@gmail.c...')
#3 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(196): array_map(Array, Array)
#4 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query->compile(Object(Database_PDO))
#5 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Users.php(243): Kohana_Database_Query->execute(Object(Database_PDO))
#6 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(134): Model_Users->check_if_user_is_deleted('a.frye4@gmail.c...')
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#10 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#12 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/PDO.php:242
2014-12-01 20:36:55 --- EMERGENCY: Database_Exception [ 8192 ]: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 20:36:55 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php(431): Kohana_Database_MySQL->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database.php(478): Kohana_Database_MySQL->escape('a.frye4@gmail.c...')
#2 [internal function]: Kohana_Database->quote('a.frye4@gmail.c...')
#3 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(196): array_map(Array, Array)
#4 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query->compile(Object(Database_MySQL))
#5 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Users.php(243): Kohana_Database_Query->execute(Object(Database_MySQL))
#6 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(134): Model_Users->check_if_user_is_deleted('a.frye4@gmail.c...')
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#10 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#12 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 20:37:44 --- EMERGENCY: Database_Exception [ 8192 ]: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 20:37:44 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php(431): Kohana_Database_MySQL->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database.php(478): Kohana_Database_MySQL->escape('a.frye4@gmail.c...')
#2 [internal function]: Kohana_Database->quote('a.frye4@gmail.c...')
#3 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(196): array_map(Array, Array)
#4 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query->compile(Object(Database_MySQL))
#5 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Users.php(243): Kohana_Database_Query->execute(Object(Database_MySQL))
#6 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(134): Model_Users->check_if_user_is_deleted('a.frye4@gmail.c...')
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#10 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#12 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 20:37:46 --- EMERGENCY: Database_Exception [ 8192 ]: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 20:37:46 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php(431): Kohana_Database_MySQL->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database.php(478): Kohana_Database_MySQL->escape('a.frye4@gmail.c...')
#2 [internal function]: Kohana_Database->quote('a.frye4@gmail.c...')
#3 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(196): array_map(Array, Array)
#4 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query->compile(Object(Database_MySQL))
#5 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Users.php(243): Kohana_Database_Query->execute(Object(Database_MySQL))
#6 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(134): Model_Users->check_if_user_is_deleted('a.frye4@gmail.c...')
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#10 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#12 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 20:38:18 --- EMERGENCY: Database_Exception [ 8192 ]: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:171
2014-12-01 20:38:18 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php(171): Kohana_Database_MySQL->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT u.userna...', true, Array)
#2 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Workorders.php(465): Kohana_Database_Query->execute(Object(Database_MySQL))
#3 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Api.php(22): Model_Workorders->get_clients('json')
#4 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Api->action_getClients()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:171
2014-12-01 20:38:47 --- EMERGENCY: Database_Exception [ 8192 ]: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:171
2014-12-01 20:38:47 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php(171): Kohana_Database_MySQL->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT u.userna...', true, Array)
#2 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Workorders.php(465): Kohana_Database_Query->execute(Object(Database_MySQL))
#3 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Api.php(22): Model_Workorders->get_clients('json')
#4 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Api->action_getClients()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:171
2014-12-01 20:38:49 --- EMERGENCY: Database_Exception [ 8192 ]: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:171
2014-12-01 20:38:49 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php(171): Kohana_Database_MySQL->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT u.userna...', true, Array)
#2 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Workorders.php(465): Kohana_Database_Query->execute(Object(Database_MySQL))
#3 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Api.php(22): Model_Workorders->get_clients('json')
#4 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Api->action_getClients()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:171
2014-12-01 20:38:55 --- EMERGENCY: Database_Exception [ 8192 ]: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 20:38:55 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php(431): Kohana_Database_MySQL->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database.php(478): Kohana_Database_MySQL->escape('a.frye4@gmail.c...')
#2 [internal function]: Kohana_Database->quote('a.frye4@gmail.c...')
#3 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(196): array_map(Array, Array)
#4 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query->compile(Object(Database_MySQL))
#5 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Users.php(243): Kohana_Database_Query->execute(Object(Database_MySQL))
#6 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(134): Model_Users->check_if_user_is_deleted('a.frye4@gmail.c...')
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#10 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#12 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 20:38:59 --- EMERGENCY: Database_Exception [ 8192 ]: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 20:38:59 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php(431): Kohana_Database_MySQL->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database.php(478): Kohana_Database_MySQL->escape('a.frye4@gmail.c...')
#2 [internal function]: Kohana_Database->quote('a.frye4@gmail.c...')
#3 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(196): array_map(Array, Array)
#4 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query->compile(Object(Database_MySQL))
#5 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Users.php(243): Kohana_Database_Query->execute(Object(Database_MySQL))
#6 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(134): Model_Users->check_if_user_is_deleted('a.frye4@gmail.c...')
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#10 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#12 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 20:55:58 --- EMERGENCY: Database_Exception [ 8192 ]: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 20:55:58 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php(431): Kohana_Database_MySQL->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database.php(478): Kohana_Database_MySQL->escape('a.frye4@gmail.c...')
#2 [internal function]: Kohana_Database->quote('a.frye4@gmail.c...')
#3 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(196): array_map(Array, Array)
#4 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query->compile(Object(Database_MySQL))
#5 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Users.php(243): Kohana_Database_Query->execute(Object(Database_MySQL))
#6 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(134): Model_Users->check_if_user_is_deleted('a.frye4@gmail.c...')
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#10 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#12 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 21:12:15 --- EMERGENCY: Database_Exception [ 8192 ]: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 21:12:15 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php(431): Kohana_Database_MySQL->connect()
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database.php(478): Kohana_Database_MySQL->escape('a.frye4@gmail.c...')
#2 [internal function]: Kohana_Database->quote('a.frye4@gmail.c...')
#3 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(196): array_map(Array, Array)
#4 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query->compile(Object(Database_MySQL))
#5 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Users.php(243): Kohana_Database_Query->execute(Object(Database_MySQL))
#6 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(134): Model_Users->check_if_user_is_deleted('a.frye4@gmail.c...')
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#8 [internal function]: Kohana_Controller->execute()
#9 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#10 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#12 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#13 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:431
2014-12-01 21:12:46 --- EMERGENCY: Database_Exception [ 1049 ]: Unknown database 'kohana' ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 108 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:75
2014-12-01 21:12:46 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php(75): Kohana_Database_MySQL->_select_db('kohana')
#1 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php(431): Kohana_Database_MySQL->connect()
#2 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database.php(478): Kohana_Database_MySQL->escape('a.frye4@gmail.c...')
#3 [internal function]: Kohana_Database->quote('a.frye4@gmail.c...')
#4 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(196): array_map(Array, Array)
#5 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(234): Kohana_Database_Query->compile(Object(Database_MySQL))
#6 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Users.php(243): Kohana_Database_Query->execute(Object(Database_MySQL))
#7 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(134): Model_Users->check_if_user_is_deleted('a.frye4@gmail.c...')
#8 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_login()
#9 [internal function]: Kohana_Controller->execute()
#10 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#11 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#13 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#14 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/MySQL.php:75
2014-12-01 21:27:17 --- EMERGENCY: ErrorException [ 8 ]: Array to string conversion ~ APPPATH/views/account/index.php [ 47 ] in /Users/frye/Documents/trinity/kohana_new/application/views/account/index.php:47
2014-12-01 21:27:17 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/application/views/account/index.php(47): Kohana_Core::error_handler(8, 'Array to string...', '/Users/frye/Doc...', 47, Array)
#1 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/frye/Documents/trinity/kohana_new/application/views/admin/template.php(66): Kohana_View->__toString()
#5 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#6 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Master.php(82): Kohana_Controller_Template->after()
#9 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(256): Controller_Master->after()
#10 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(87): Controller_Account->after()
#11 [internal function]: Kohana_Controller->execute()
#12 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#13 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#16 {main} in /Users/frye/Documents/trinity/kohana_new/application/views/account/index.php:47
2014-12-01 21:27:31 --- EMERGENCY: ErrorException [ 1 ]: Allowed memory size of 134217728 bytes exhausted (tried to allocate 126353408 bytes) ~ APPPATH/views/account/index.php [ 47 ] in file:line
2014-12-01 21:27:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-01 21:27:56 --- EMERGENCY: ErrorException [ 1 ]: Allowed memory size of 134217728 bytes exhausted (tried to allocate 126353408 bytes) ~ APPPATH/views/account/index.php [ 51 ] in file:line
2014-12-01 21:27:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-01 21:29:30 --- EMERGENCY: ErrorException [ 1 ]: Allowed memory size of 134217728 bytes exhausted (tried to allocate 126353408 bytes) ~ APPPATH/views/account/index.php [ 51 ] in file:line
2014-12-01 21:29:30 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-01 21:30:42 --- EMERGENCY: ErrorException [ 1 ]: Allowed memory size of 134217728 bytes exhausted (tried to allocate 126615552 bytes) ~ APPPATH/views/account/index.php [ 45 ] in file:line
2014-12-01 21:30:42 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-01 21:35:04 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH/views/account/index.php [ 44 ] in file:line
2014-12-01 21:35:04 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-01 21:35:57 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '?>' ~ APPPATH/views/account/index.php [ 58 ] in file:line
2014-12-01 21:35:57 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-01 22:58:05 --- EMERGENCY: Database_Exception [ 1242 ]: Subquery returns more than 1 row [ SELECT w.first_name, w.last_name, w.id,
                                                      date_format(date_of_inspection, "%m/%d%/%Y") as date_of_inspection,
                                                      date_format(w.created_on_utc, "%m/%d%/%Y") as created_on_utc,
                                                      CONCAT(uf.first_name, " ", uf.last_name) as adjuster_name,
                                                      CONCAT(_uf.first_name, " ", _uf.last_name) as inspector_name,
                                                      wos.name as status_name, _is.name as inspection_status,
                                                      IF(it.name IS NULL, "No Type", it.name) as inspection_type, _uf.color as inspector_color,
                                                      (select id from invoice_meta where workorder_id = w.id) as invoice_exists
                                               FROM work_orders w
                                               LEFT JOIN users u ON u.id = w.user_id
                                               LEFT JOIN profiles uf ON uf.user_id = u.id
                                               LEFT JOIN users _u ON _u.id = w.inspector_id
                                               LEFT JOIN profiles _uf ON _uf.user_id = _u.id
                                               LEFT JOIN work_order_statuses wos ON wos.id = w.status
                                               LEFT JOIN inspection_statuses _is ON _is.id = w.inspection_status
                                               LEFT JOIN inspection_types it ON it.id = w.type
                                               LEFT JOIN inspections i ON i.work_order_id = w.id
                                               WHERE 1=1
                                               ORDER BY id DESC ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php:251
2014-12-01 22:58:05 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT w.first_...', true, Array)
#1 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Account.php(72): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(102): Model_Account->get_work_orders('1', 2)
#3 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#6 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php:251