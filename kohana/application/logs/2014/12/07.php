<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-12-07 09:40:09 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Database_MySQL_Result::to_array() ~ APPPATH/classes/Controller/Api.php [ 46 ] in file:line
2014-12-07 09:40:09 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-07 09:47:51 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 3 for Model_Account::get_work_orders(), called in /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php on line 104 and defined ~ APPPATH/classes/Model/Account.php [ 35 ] in /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Account.php:35
2014-12-07 09:47:51 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Account.php(35): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/frye/Doc...', 35, Array)
#1 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(104): Model_Account->get_work_orders('1', 2)
#2 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#5 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#7 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Account.php:35
2014-12-07 09:48:29 --- EMERGENCY: ErrorException [ 2 ]: Creating default object from empty value ~ APPPATH/classes/Controller/Account.php [ 106 ] in /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php:106
2014-12-07 09:48:29 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(106): Kohana_Core::error_handler(2, 'Creating defaul...', '/Users/frye/Doc...', 106, Array)
#1 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#4 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php:106
2014-12-07 09:48:41 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: view ~ APPPATH/classes/Controller/Account.php [ 113 ] in /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php:113
2014-12-07 09:48:41 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(113): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 113, Array)
#1 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Account->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#4 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php:113
2014-12-07 09:48:48 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: admin ~ APPPATH/views/account/index.php [ 9 ] in /Users/frye/Documents/trinity/kohana_new/application/views/account/index.php:9
2014-12-07 09:48:48 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/application/views/account/index.php(9): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 9, Array)
#1 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/frye/Documents/trinity/kohana_new/application/views/admin/template.php(70): Kohana_View->__toString()
#5 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#6 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Master.php(82): Kohana_Controller_Template->after()
#9 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Account.php(259): Controller_Master->after()
#10 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(87): Controller_Account->after()
#11 [internal function]: Kohana_Controller->execute()
#12 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#13 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#16 {main} in /Users/frye/Documents/trinity/kohana_new/application/views/account/index.php:9
2014-12-07 09:49:07 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'DESC100' at line 19 [ SELECT w.first_name, w.last_name, w.id,
                                                      date_format(date_of_inspection, "%m/%d%/%Y") as date_of_inspection,
                                                      date_format(w.created_on_utc, "%m/%d%/%Y") as created_on_utc,
                                                      CONCAT(uf.first_name, " ", uf.last_name) as adjuster_name,
                                                      CONCAT(_uf.first_name, " ", _uf.last_name) as inspector_name,
                                                      wos.name as status_name, _is.name as inspection_status,
                                                      IF(it.name IS NULL, "No Type", it.name) as inspection_type, _uf.color as inspector_color,
                                                      (select count(id) from invoice_meta where workorder_id = w.id) as invoice_exists
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
                                               ORDER BY id DESC100 ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php:251
2014-12-07 09:49:07 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT w.first_...', true, Array)
#1 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Account.php(81): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Api.php(44): Model_Account->get_work_orders('1', 2, '1')
#3 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Api->action_orders()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#6 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php:251
2014-12-07 09:50:08 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'DESCLIMIT 0, 100' at line 19 [ SELECT w.first_name, w.last_name, w.id,
                                                      date_format(date_of_inspection, "%m/%d%/%Y") as date_of_inspection,
                                                      date_format(w.created_on_utc, "%m/%d%/%Y") as created_on_utc,
                                                      CONCAT(uf.first_name, " ", uf.last_name) as adjuster_name,
                                                      CONCAT(_uf.first_name, " ", _uf.last_name) as inspector_name,
                                                      wos.name as status_name, _is.name as inspection_status,
                                                      IF(it.name IS NULL, "No Type", it.name) as inspection_type, _uf.color as inspector_color,
                                                      (select count(id) from invoice_meta where workorder_id = w.id) as invoice_exists
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
                                               ORDER BY id DESCLIMIT 0, 100 ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php:251
2014-12-07 09:50:08 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT w.first_...', true, Array)
#1 /Users/frye/Documents/trinity/kohana_new/application/classes/Model/Account.php(81): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/trinity/kohana_new/application/classes/Controller/Api.php(44): Model_Account->get_work_orders('1', 2, '1')
#3 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Controller.php(84): Controller_Api->action_orders()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Api))
#6 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/trinity/kohana_new/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/trinity/kohana_new/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/trinity/kohana_new/modules/database/classes/Kohana/Database/Query.php:251
2014-12-07 10:39:39 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ':', expecting ']' ~ APPPATH/classes/Controller/Api.php [ 49 ] in file:line
2014-12-07 10:39:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-07 10:39:39 --- EMERGENCY: ErrorException [ 4 ]: syntax error, unexpected ':', expecting ']' ~ APPPATH/classes/Controller/Api.php [ 49 ] in file:line
2014-12-07 10:39:39 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-07 10:41:33 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Model_Workorders::get_count_of_workorders() ~ APPPATH/classes/Controller/Api.php [ 48 ] in file:line
2014-12-07 10:41:33 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-07 10:47:32 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Database_Query::current() ~ APPPATH/classes/Model/Workorders.php [ 791 ] in file:line
2014-12-07 10:47:32 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line