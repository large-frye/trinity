<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-10-01 23:07:24 --- EMERGENCY: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH/classes/Kohana/Session.php [ 324 ] in /Users/frye/Documents/elance/trinity/trinity-development/site/system/classes/Kohana/Session.php:125
2013-10-01 23:07:24 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/trinity-development/site/system/classes/Kohana/Session.php(125): Kohana_Session->read(NULL)
#1 /Users/frye/Documents/elance/trinity/trinity-development/site/modules/database/classes/Kohana/Session/Database.php(74): Kohana_Session->__construct(Array, NULL)
#2 /Users/frye/Documents/elance/trinity/trinity-development/site/system/classes/Kohana/Session.php(54): Kohana_Session_Database->__construct(Array, NULL)
#3 /Users/frye/Documents/elance/trinity/trinity-development/site/modules/primalskill/auth/classes/Auth.php(200): Kohana_Session::instance()
#4 /Users/frye/Documents/elance/trinity/trinity-development/site/modules/primalskill/auth/classes/Auth.php(189): Auth->get_user()
#5 /Users/frye/Documents/elance/trinity/trinity-development/site/application/classes/View/Layout.php(118): Auth->is_logged_in()
#6 /Users/frye/Documents/elance/trinity/trinity-development/site/modules/primalskill/mustache/vendor/mustache/src/Mustache/Context.php(138): View_Layout->is_logged_in()
#7 /Users/frye/Documents/elance/trinity/trinity-development/site/modules/primalskill/mustache/vendor/mustache/src/Mustache/Context.php(78): Mustache_Context->findVariableInStack('is_logged_in', Array)
#8 /Users/frye/Documents/elance/trinity/trinity-development/site/application/cache/mustache/__Mustache_91cf308e2de9f95afcb081e52a566a84.php(70): Mustache_Context->find('is_logged_in')
#9 /Users/frye/Documents/elance/trinity/trinity-development/site/modules/primalskill/mustache/vendor/mustache/src/Mustache/Template.php(62): __Mustache_91cf308e2de9f95afcb081e52a566a84->renderInternal(Object(Mustache_Context))
#10 /Users/frye/Documents/elance/trinity/trinity-development/site/modules/primalskill/mustache/classes/Primalskill/Mustache/Engine.php(48): Mustache_Template->render(Object(View_Static))
#11 /Users/frye/Documents/elance/trinity/trinity-development/site/application/classes/Controller/Public.php(28): Primalskill_Mustache_Engine->render()
#12 /Users/frye/Documents/elance/trinity/trinity-development/site/system/classes/Kohana/Controller.php(87): Controller_Public->after()
#13 [internal function]: Kohana_Controller->execute()
#14 /Users/frye/Documents/elance/trinity/trinity-development/site/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Static))
#15 /Users/frye/Documents/elance/trinity/trinity-development/site/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#16 /Users/frye/Documents/elance/trinity/trinity-development/site/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#17 /Users/frye/Documents/elance/trinity/trinity-development/site/public_html/index.php(97): Kohana_Request->execute()
#18 {main} in /Users/frye/Documents/elance/trinity/trinity-development/site/system/classes/Kohana/Session.php:125