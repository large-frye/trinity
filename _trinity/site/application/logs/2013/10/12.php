<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2013-10-12 21:26:07 --- EMERGENCY: ErrorException [ 1 ]: Access to undeclared static property: Kohana::$enviroment ~ MODPATH/primalskill/asset/init.php [ 3 ] in :
2013-10-12 21:26:07 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-10-12 21:26:14 --- EMERGENCY: ErrorException [ 1 ]: Undefined class constant 'enviroment' ~ MODPATH/primalskill/asset/init.php [ 3 ] in :
2013-10-12 21:26:14 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-10-12 21:26:37 --- EMERGENCY: ErrorException [ 8 ]: Use of undefined constant Kohana - assumed 'Kohana' ~ MODPATH/primalskill/asset/init.php [ 3 ] in /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/asset/init.php:3
2013-10-12 21:26:37 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/asset/init.php(3): Kohana_Core::error_handler(8, 'Use of undefine...', '/Users/frye/Doc...', 3, Array)
#1 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Core.php(602): require_once('/Users/frye/Doc...')
#2 /Users/frye/Documents/elance/trinity/trinity/site/application/bootstrap.php(169): Kohana_Core::modules(Array)
#3 /Users/frye/Documents/elance/trinity/trinity/site/public_html/index.php(81): require('/Users/frye/Doc...')
#4 {main} in /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/asset/init.php:3
2013-10-12 21:26:45 --- EMERGENCY: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH/classes/Kohana/Session.php [ 324 ] in /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Session.php:125
2013-10-12 21:26:45 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Session.php(125): Kohana_Session->read(NULL)
#1 /Users/frye/Documents/elance/trinity/trinity/site/modules/database/classes/Kohana/Session/Database.php(74): Kohana_Session->__construct(Array, NULL)
#2 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Session.php(54): Kohana_Session_Database->__construct(Array, NULL)
#3 /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/auth/classes/Auth.php(200): Kohana_Session::instance()
#4 /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/auth/classes/Auth.php(189): Auth->get_user()
#5 /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Authentication.php(31): Auth->is_logged_in()
#6 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Controller.php(84): Controller_Authentication->action_login()
#7 [internal function]: Kohana_Controller->execute()
#8 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Authentication))
#9 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#11 /Users/frye/Documents/elance/trinity/trinity/site/public_html/index.php(97): Kohana_Request->execute()
#12 {main} in /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Session.php:125
2013-10-12 21:32:43 --- EMERGENCY: ErrorException [ 1 ]: Undefined class constant 'development' ~ MODPATH/primalskill/asset/init.php [ 5 ] in :
2013-10-12 21:32:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-10-12 21:33:01 --- EMERGENCY: Session_Exception [ 1 ]: Error reading session data. ~ SYSPATH/classes/Kohana/Session.php [ 324 ] in /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Session.php:125
2013-10-12 21:33:01 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Session.php(125): Kohana_Session->read(NULL)
#1 /Users/frye/Documents/elance/trinity/trinity/site/modules/database/classes/Kohana/Session/Database.php(74): Kohana_Session->__construct(Array, NULL)
#2 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Session.php(54): Kohana_Session_Database->__construct(Array, NULL)
#3 /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/auth/classes/Auth.php(200): Kohana_Session::instance()
#4 /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/auth/classes/Auth.php(189): Auth->get_user()
#5 /Users/frye/Documents/elance/trinity/trinity/site/application/classes/View/Layout.php(118): Auth->is_logged_in()
#6 /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/mustache/vendor/mustache/src/Mustache/Context.php(138): View_Layout->is_logged_in()
#7 /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/mustache/vendor/mustache/src/Mustache/Context.php(78): Mustache_Context->findVariableInStack('is_logged_in', Array)
#8 /Users/frye/Documents/elance/trinity/trinity/site/application/cache/mustache/__Mustache_91cf308e2de9f95afcb081e52a566a84.php(70): Mustache_Context->find('is_logged_in')
#9 /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/mustache/vendor/mustache/src/Mustache/Template.php(62): __Mustache_91cf308e2de9f95afcb081e52a566a84->renderInternal(Object(Mustache_Context))
#10 /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/mustache/classes/Primalskill/Mustache/Engine.php(48): Mustache_Template->render(Object(View_Static))
#11 /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Public.php(28): Primalskill_Mustache_Engine->render()
#12 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Controller.php(87): Controller_Public->after()
#13 [internal function]: Kohana_Controller->execute()
#14 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Static))
#15 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#16 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#17 /Users/frye/Documents/elance/trinity/trinity/site/public_html/index.php(97): Kohana_Request->execute()
#18 {main} in /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Session.php:125
2013-10-12 22:00:17 --- EMERGENCY: ErrorException [ 8 ]: Use of undefined constant APPATH - assumed 'APPATH' ~ APPPATH/bootstrap.php [ 146 ] in /Users/frye/Documents/elance/trinity/trinity/site/application/bootstrap.php:146
2013-10-12 22:00:17 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/trinity/site/application/bootstrap.php(146): Kohana_Core::error_handler(8, 'Use of undefine...', '/Users/frye/Doc...', 146, Array)
#1 /Users/frye/Documents/elance/trinity/trinity/site/public_html/index.php(81): require('/Users/frye/Doc...')
#2 {main} in /Users/frye/Documents/elance/trinity/trinity/site/application/bootstrap.php:146
2013-10-12 22:01:16 --- EMERGENCY: Kohana_Exception [ 0 ]: Invalid token supplied. Reload the form and try again. ~ APPPATH/classes/Controller/Public.php [ 18 ] in /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Authentication.php:17
2013-10-12 22:01:16 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Authentication.php(17): Controller_Public->before()
#1 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Controller.php(69): Controller_Authentication->before()
#2 [internal function]: Kohana_Controller->execute()
#3 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Authentication))
#4 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#6 /Users/frye/Documents/elance/trinity/trinity/site/public_html/index.php(97): Kohana_Request->execute()
#7 {main} in /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Authentication.php:17
2013-10-12 22:03:35 --- EMERGENCY: ErrorException [ 8 ]: Use of undefined constant Security - assumed 'Security' ~ APPPATH/classes/Controller/Public.php [ 16 ] in /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Public.php:16
2013-10-12 22:03:35 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Public.php(16): Kohana_Core::error_handler(8, 'Use of undefine...', '/Users/frye/Doc...', 16, Array)
#1 /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Authentication.php(17): Controller_Public->before()
#2 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Controller.php(69): Controller_Authentication->before()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Authentication))
#5 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 /Users/frye/Documents/elance/trinity/trinity/site/public_html/index.php(97): Kohana_Request->execute()
#8 {main} in /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Public.php:16
2013-10-12 22:03:41 --- EMERGENCY: ErrorException [ 1 ]: Undefined class constant 'CSRF_valid' ~ APPPATH/classes/Controller/Public.php [ 16 ] in :
2013-10-12 22:03:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-10-12 22:03:50 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 1 for Psk_Security::CSRF_valid(), called in /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Public.php on line 16 and defined ~ MODPATH/primalskill/security/classes/Psk/Security.php [ 139 ] in /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/security/classes/Psk/Security.php:139
2013-10-12 22:03:50 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/security/classes/Psk/Security.php(139): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/frye/Doc...', 139, Array)
#1 /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Public.php(16): Psk_Security::CSRF_valid()
#2 /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Authentication.php(17): Controller_Public->before()
#3 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Controller.php(69): Controller_Authentication->before()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Authentication))
#6 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/trinity/site/public_html/index.php(97): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/security/classes/Psk/Security.php:139
2013-10-12 22:04:06 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 1 for Psk_Security::CSRF_valid(), called in /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Public.php on line 16 and defined ~ MODPATH/primalskill/security/classes/Psk/Security.php [ 139 ] in /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/security/classes/Psk/Security.php:139
2013-10-12 22:04:06 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/security/classes/Psk/Security.php(139): Kohana_Core::error_handler(2, 'Missing argumen...', '/Users/frye/Doc...', 139, Array)
#1 /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Public.php(16): Psk_Security::CSRF_valid()
#2 /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Authentication.php(17): Controller_Public->before()
#3 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Controller.php(69): Controller_Authentication->before()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Authentication))
#6 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/trinity/site/public_html/index.php(97): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/security/classes/Psk/Security.php:139
2013-10-12 23:00:36 --- EMERGENCY: ErrorException [ 8 ]: String offset cast occured ~ APPPATH/classes/Controller/Authentication.php [ 139 ] in /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Authentication.php:139
2013-10-12 23:00:36 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Authentication.php(139): Kohana_Core::error_handler(8, 'String offset c...', '/Users/frye/Doc...', 139, Array)
#1 /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Authentication.php(43): Controller_Authentication->_define_redirect()
#2 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Controller.php(84): Controller_Authentication->action_login()
#3 [internal function]: Kohana_Controller->execute()
#4 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Authentication))
#5 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#7 /Users/frye/Documents/elance/trinity/trinity/site/public_html/index.php(97): Kohana_Request->execute()
#8 {main} in /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Authentication.php:139
2013-10-12 23:03:59 --- EMERGENCY: ErrorException [ 1 ]: Undefined class constant 'development' ~ APPPATH/classes/Controller/Authentication.php [ 139 ] in :
2013-10-12 23:03:59 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in :
2013-10-12 23:48:37 --- EMERGENCY: ReflectionException [ -1 ]: Class  does not exist ~ MODPATH/primalskill/mustache/classes/Primalskill/Mustache/Engine.php [ 56 ] in /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/mustache/classes/Primalskill/Mustache/Engine.php:56
2013-10-12 23:48:37 --- DEBUG: #0 /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/mustache/classes/Primalskill/Mustache/Engine.php(56): ReflectionClass->__construct('')
#1 /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/mustache/classes/Primalskill/Mustache/Engine.php(21): Primalskill_Mustache_Engine->_get_template_variables()
#2 /Users/frye/Documents/elance/trinity/trinity/site/application/classes/Controller/Public.php(25): Primalskill_Mustache_Engine->__construct(NULL)
#3 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Controller.php(87): Controller_Public->after()
#4 [internal function]: Kohana_Controller->execute()
#5 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Welcome))
#6 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /Users/frye/Documents/elance/trinity/trinity/site/system/classes/Kohana/Request.php(990): Kohana_Request_Client->execute(Object(Request))
#8 /Users/frye/Documents/elance/trinity/trinity/site/public_html/index.php(97): Kohana_Request->execute()
#9 {main} in /Users/frye/Documents/elance/trinity/trinity/site/modules/primalskill/mustache/classes/Primalskill/Mustache/Engine.php:56