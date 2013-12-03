<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-11-19 19:30:44 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/template.php [ 76 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:76
2013-11-19 19:30:44 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/template.php(76): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 76, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Master.php(60): Kohana_Controller_Template->after()
#5 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(78): Controller_Master->after()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Controller_Account->after()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#9 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#11 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#12 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:76
2013-11-19 19:45:35 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for Model_Account::get_work_orders(), called in /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php on line 42 and defined ~ APPPATH/classes/Model/account.php [ 43 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/account.php:43
2013-11-19 19:45:35 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/account.php(43): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/frye/Doc...', 43, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(42): Model_Account->get_work_orders('1')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Account->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#7 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/account.php:43
2013-11-19 19:45:40 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: user_type ~ APPPATH/classes/Model/account.php [ 46 ] in /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/account.php:46
2013-11-19 19:45:40 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/account.php(46): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 46, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(42): Model_Account->get_work_orders('1')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Account->action_index()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#7 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/account.php:46
2013-11-19 19:45:46 --- EMERGENCY: Database_Exception [ 1054 ]: Unknown column 'i.first_name' in 'field list' [ SELECT w.*, CONCAT(i.first_name, " ", i.last_name) AS inspector_name, 
                                                      CONCAT(c.first_name, " ", c.last_name) AS client_name 
                                               FROM work_orders w
                                               LEFT JOIN users u ON u.id = w.user_id
                                               WHERE u.id = '1' ] ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 194 ] in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251
2013-11-19 19:45:46 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT w.*, CON...', true, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/application/classes/Model/account.php(52): Kohana_Database_Query->execute(Object(Database_MySQL))
#2 /Users/frye/Documents/elance/trinity/kohana/application/classes/Controller/Account.php(42): Model_Account->get_work_orders('1')
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Account->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/kohana/modules/database/classes/Kohana/Database/Query.php:251