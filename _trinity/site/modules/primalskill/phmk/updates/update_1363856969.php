<?php return array (
  'name' => 'Create user template',
  'description' => '',
  'sql_up' => 'INSERT INTO `settings` (`name`, `value`, `nice_name`, `description`) VALUES (\'email_template_createuser\', \'&lt;p&gt;Dear ::username::&lt;/p&gt;\\n\\n&lt;p&gt;New account created for you.&lt;/p&gt;\\n\\n&lt;p&gt;Your password is: ::password::&lt;/p&gt;\\n\\n&lt;p&gt;Regards,&lt;br&gt;Trinity Support&lt;/p&gt;\', \'Create New User Email Template\', \'Variables: ::username:: - username, ::password:: - password\');
',
  'sql_down' => 'DELETE FROM `settings` WHERE `name` = \'email_template_createuser\';',
  'has_data' => true,
  'date' => 1363856969,
)?>