<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-12-02 19:23:53 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: stdClass::$status_name ~ APPPATH/views/account/index.php [ 31 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php:31
2013-12-02 19:23:53 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php(31): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/frye/Doc...', 31, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/application/views/admin/template.php(79): Kohana_View->__toString()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(68): Kohana_Controller_Template->after()
#9 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(93): Controller_Master->after()
#10 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Controller_Account->after()
#11 [internal function]: Kohana_Controller->execute()
#12 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#13 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#16 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php:31
2013-12-02 19:24:01 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: stdClass::$client_name ~ APPPATH/views/account/index.php [ 33 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php:33
2013-12-02 19:24:01 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php(33): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/frye/Doc...', 33, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/application/views/admin/template.php(79): Kohana_View->__toString()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(68): Kohana_Controller_Template->after()
#9 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(93): Controller_Master->after()
#10 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Controller_Account->after()
#11 [internal function]: Kohana_Controller->execute()
#12 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#13 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#16 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php:33
2013-12-02 19:24:05 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: stdClass::$client ~ APPPATH/views/account/index.php [ 33 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php:33
2013-12-02 19:24:05 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php(33): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/frye/Doc...', 33, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/application/views/admin/template.php(79): Kohana_View->__toString()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(68): Kohana_Controller_Template->after()
#9 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(93): Controller_Master->after()
#10 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Controller_Account->after()
#11 [internal function]: Kohana_Controller->execute()
#12 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#13 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#16 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php:33
2013-12-02 19:24:17 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: stdClass::$client ~ APPPATH/views/account/index.php [ 34 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php:34
2013-12-02 19:24:17 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php(34): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/frye/Doc...', 34, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/application/views/admin/template.php(79): Kohana_View->__toString()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(68): Kohana_Controller_Template->after()
#9 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(93): Controller_Master->after()
#10 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Controller_Account->after()
#11 [internal function]: Kohana_Controller->execute()
#12 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#13 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#16 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php:34
2013-12-02 19:24:19 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: stdClass::$client ~ APPPATH/views/account/index.php [ 34 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php:34
2013-12-02 19:24:19 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php(34): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/frye/Doc...', 34, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/application/views/admin/template.php(79): Kohana_View->__toString()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(68): Kohana_Controller_Template->after()
#9 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(93): Controller_Master->after()
#10 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Controller_Account->after()
#11 [internal function]: Kohana_Controller->execute()
#12 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#13 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#16 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php:34
2013-12-02 19:25:00 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: stdClass::$inspector_name ~ APPPATH/views/account/index.php [ 36 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php:36
2013-12-02 19:25:00 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php(36): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/frye/Doc...', 36, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/application/views/admin/template.php(79): Kohana_View->__toString()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(68): Kohana_Controller_Template->after()
#9 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(93): Controller_Master->after()
#10 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Controller_Account->after()
#11 [internal function]: Kohana_Controller->execute()
#12 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#13 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#16 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php:36
2013-12-02 19:25:06 --- EMERGENCY: ErrorException [ 8 ]: Undefined property: stdClass::$inspection_status_name ~ APPPATH/views/account/index.php [ 38 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php:38
2013-12-02 19:25:06 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php(38): Kohana_Core::error_handler(8, 'Undefined prope...', '/Users/frye/Doc...', 38, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(228): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/application/views/admin/template.php(79): Kohana_View->__toString()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(68): Kohana_Controller_Template->after()
#9 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(93): Controller_Master->after()
#10 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Controller_Account->after()
#11 [internal function]: Kohana_Controller->execute()
#12 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#13 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#14 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#15 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#16 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/account/index.php:38
2013-12-02 19:29:33 --- EMERGENCY: Database_Exception [ 1054 ]: Unknown column 'u.first_name' in 'field list' [ SELECT w.*, CONCAT(u.first_name, " ", u.last_name) as adjuster_name
                                               FROM work_orders w
                                               LEFT JOIN users u ON u.id = w.user_id

                                               WHERE 1=1 ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-02 19:29:33 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT w.*, CON...', true, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/account.php(52): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(53): Model_Account->get_work_orders('1')
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Account->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-02 20:10:17 --- EMERGENCY: Database_Exception [ 1064 ]: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '.
                                                      wos.name as status_name
' at line 2 [ SELECT w.*, CONCAT(uf.first_name, " ", uf.last_name) as adjuster_name,
                                                      CONCAT(_uf.first_name, " ", _uf.last_name) as inspector_name.
                                                      wos.name as status_name
                                               FROM work_orders w
                                               LEFT JOIN auth_users u ON u.id = w.user_id
                                               LEFT JOIN user_profiles uf ON uf.user_id = u.id
                                               LEFT JOIN auth_users _u ON _u.id = w.inspector_id
                                               LEFT JOIN user_profiles _uf ON _uf.user_id = _u.id
                                               LEFT JOIN work_order_statuses wos ON wos.id = w.status
                                               WHERE 1=1 ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-12-02 20:10:17 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT w.*, CON...', true, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/account.php(57): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(53): Model_Account->get_work_orders('1')
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Account->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251