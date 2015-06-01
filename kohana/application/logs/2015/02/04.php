<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-04 19:17:01 --- EMERGENCY: ErrorException [ 2 ]: Illegal string offset 'damages' ~ APPPATH/classes/Model/Workorders.php [ 668 ] in /Users/frye/Documents/trinity/kohana/application/classes/Model/Workorders.php:668
2015-02-04 19:17:01 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/application/classes/Model/Workorders.php(668): Kohana_Core::error_handler(2, 'Illegal string ...', '/Users/frye/Doc...', 668, Array)
#1 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Workorders.php(205): Model_Workorders->generate_report('3401', Object(Database_MySQL_Result), Object(Database_MySQL_Result))
#2 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Workorders->action_generate()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#5 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#7 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/frye/Documents/trinity/kohana/application/classes/Model/Workorders.php:668
2015-02-04 19:17:15 --- EMERGENCY: ErrorException [ 2 ]: Illegal string offset 'damages' ~ APPPATH/classes/Model/Workorders.php [ 669 ] in /Users/frye/Documents/trinity/kohana/application/classes/Model/Workorders.php:669
2015-02-04 19:17:15 --- DEBUG: #0 /Users/frye/Documents/trinity/kohana/application/classes/Model/Workorders.php(669): Kohana_Core::error_handler(2, 'Illegal string ...', '/Users/frye/Doc...', 669, Array)
#1 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Workorders.php(205): Model_Workorders->generate_report('3401', Object(Database_MySQL_Result), Object(Database_MySQL_Result))
#2 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Workorders->action_generate()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#5 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#7 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#8 {main} in /Users/frye/Documents/trinity/kohana/application/classes/Model/Workorders.php:669
2015-02-04 19:18:05 --- EMERGENCY: ErrorException [ 2 ]: print_r() expects parameter 2 to be boolean, array given ~ APPPATH/classes/Model/Workorders.php [ 670 ] in file:line
2015-02-04 19:18:05 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'print_r() expec...', '/Users/frye/Doc...', 670, Array)
#1 /Users/frye/Documents/trinity/kohana/application/classes/Model/Workorders.php(670): print_r('roofing_info', Array)
#2 /Users/frye/Documents/trinity/kohana/application/classes/Controller/Workorders.php(205): Model_Workorders->generate_report('3401', Object(Database_MySQL_Result), Object(Database_MySQL_Result))
#3 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Controller.php(84): Controller_Workorders->action_generate()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Workorders))
#6 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/trinity/kohana/system/classes/Kohana/Request.php(995): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/trinity/kohana/index.php(118): Kohana_Request->execute()
#9 {main} in file:line