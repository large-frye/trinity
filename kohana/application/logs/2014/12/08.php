<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-12-08 18:24:56 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'defined' (T_STRING) ~ APPPATH/config/database.php [ 1 ] in file:line
2014-12-08 18:24:56 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-08 18:25:06 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Api.php [ 14 ] in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14
2014-12-08 18:25:06 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php(14): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/frye/Doc...', 14, Array)
#1 [internal function]: Controller_Api->__construct(Object(Request), Object(Response))
#2 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#5 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#6 {main} in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14
2014-12-08 18:28:01 --- EMERGENCY: ErrorException [ 1 ]: Class 'Model_Custom' not found ~ SYSPATH/classes/Kohana/Model.php [ 26 ] in file:line
2014-12-08 18:28:01 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-08 18:28:10 --- EMERGENCY: ErrorException [ 1 ]: Class 'Model_Custom' not found ~ SYSPATH/classes/Kohana/Model.php [ 26 ] in file:line
2014-12-08 18:28:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-08 18:28:10 --- EMERGENCY: ErrorException [ 1 ]: Class 'Model_Custom' not found ~ SYSPATH/classes/Kohana/Model.php [ 26 ] in file:line
2014-12-08 18:28:10 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-08 18:28:28 --- EMERGENCY: ErrorException [ 1 ]: Class 'Model_Custom' not found ~ SYSPATH/classes/Kohana/Model.php [ 26 ] in file:line
2014-12-08 18:28:28 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-08 18:28:28 --- EMERGENCY: ErrorException [ 1 ]: Class 'Model_Custom' not found ~ SYSPATH/classes/Kohana/Model.php [ 26 ] in file:line
2014-12-08 18:28:28 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-08 18:46:40 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected '}' ~ APPPATH/classes/Model/Workorders.php [ 799 ] in file:line
2014-12-08 18:46:40 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-08 18:46:54 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'break' (T_BREAK) ~ APPPATH/classes/Model/Workorders.php [ 799 ] in file:line
2014-12-08 18:46:54 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-08 18:47:26 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'inspector_id = '326'' at line 3 [ SELECT count(o.id) as count 
                                            FROM work_orders o
                                            LEFT JOIN profiles p ON o.user_id = p.user_id inspector_id = '326' ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2014-12-08 18:47:26 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT count(o....', true, Array)
#1 /Users/frye/Documents/trinity/kohana/application/classes/Model/Workorders.php(805): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php(60): Model_Workorders->get_count_of_workorders('326', 3)
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Api->action_amountOfOrders()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#6 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2014-12-08 18:48:51 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Api.php [ 14 ] in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14
2014-12-08 18:48:51 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php(14): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/frye/Doc...', 14, Array)
#1 [internal function]: Controller_Api->__construct(Object(Request), Object(Response))
#2 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#5 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#6 {main} in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14
2014-12-08 18:49:02 --- EMERGENCY: Database_Exception [ 1054 ]: Unknown column 'p.user_id1' in 'on clause' [ SELECT count(o.id) as count 
                                            FROM work_orders o
                                            LEFT JOIN profiles p ON o.user_id = p.user_id1=1 ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2014-12-08 18:49:02 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT count(o....', true, Array)
#1 /Users/frye/Documents/trinity/kohana/application/classes/Model/Workorders.php(806): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php(60): Model_Workorders->get_count_of_workorders('1', 2)
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Api->action_amountOfOrders()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#6 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2014-12-08 18:49:12 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '1=1' at line 3 [ SELECT count(o.id) as count 
                                            FROM work_orders o
                                            LEFT JOIN profiles p ON o.user_id = p.user_id 1=1 ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2014-12-08 18:49:12 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT count(o....', true, Array)
#1 /Users/frye/Documents/trinity/kohana/application/classes/Model/Workorders.php(806): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php(60): Model_Workorders->get_count_of_workorders('1', 2)
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Api->action_amountOfOrders()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#6 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2014-12-08 18:49:38 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '1=1' at line 3 [ SELECT count(o.id) as count 
                                            FROM work_orders o
                                            LEFT JOIN profiles p ON o.user_id = p.user_idWHERE 1=1 ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2014-12-08 18:49:38 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT count(o....', true, Array)
#1 /Users/frye/Documents/trinity/kohana/application/classes/Model/Workorders.php(806): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php(60): Model_Workorders->get_count_of_workorders('1', 2)
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Api->action_amountOfOrders()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#6 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2014-12-08 18:49:59 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Api.php [ 14 ] in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14
2014-12-08 18:49:59 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php(14): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/frye/Doc...', 14, Array)
#1 [internal function]: Controller_Api->__construct(Object(Request), Object(Response))
#2 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#5 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#6 {main} in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14
2014-12-08 19:21:33 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Api.php [ 14 ] in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14
2014-12-08 19:21:33 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php(14): Kohana_Core::error_handler(8, 'Trying to get p...', '/Users/frye/Doc...', 14, Array)
#1 [internal function]: Controller_Api->__construct(Object(Request), Object(Response))
#2 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(94): ReflectionClass->newInstance(Object(Request), Object(Response))
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#5 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#6 {main} in /Users/frye/Documents/trinity/kohana/application/classes/Controller/Api.php:14
2014-12-08 19:34:12 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected 'sset' (T_STRING) ~ APPPATH/views/pdf/basic-report.php [ 196 ] in file:line
2014-12-08 19:34:12 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line