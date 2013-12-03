<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-11-12 19:24:02 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: content ~ APPPATH/views/template.php [ 75 ] in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:75
2013-11-12 19:24:02 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/kohana/application/views/template.php(75): Kohana_Core::error_handler(8, 'Undefined varia...', '/Users/frye/Doc...', 75, Array)
#1 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(61): include('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/View.php(348): Kohana_View::capture('/Users/frye/Doc...', Array)
#3 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Account))
#7 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /Users/frye/Documents/elance/trinity/kohana/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /Users/frye/Documents/elance/trinity/kohana/index.php(118): Kohana_Request->execute()
#10 {main} in /Users/frye/Documents/elance/trinity/kohana/application/views/template.php:75