<?php return array (
  'name' => 'Settings - email templates',
  'description' => '',
  'sql_up' => 'INSERT INTO `settings` (`id`, `name`, `value`, `nice_name`, `description`) VALUES (2, \'email_template_registration\', \'&lt;p&gt;Dear ::username::&lt;/p&gt;\\n\\n&lt;p&gt;Your registration was successfull.&lt;/p&gt;\\n\\n&lt;p&gt;Regards,&lt;br&gt;Trinity Support&lt;/p&gt;\', \'Registration Email Template\', \'Variables: ::username:: - username\');
INSERT INTO `settings` (`id`, `name`, `value`, `nice_name`, `description`) VALUES (3, \'email_template_recovery_password\', \'&lt;p&gt;Dear ::username::&lt;/p&gt;\\n\\n&lt;p&gt;Reset your password by following this link: &lt;a href=::resetpw_link::&gt;::resetpw_link::&lt;/p&gt;\\n\\n&lt;p&gt;Regards, &lt;br&gt;Trinity Support&lt;/p&gt;\', \'Password Recovery Email Template\', \'Variables: ::username:: - username, ::resetpw_link:: - recovery URL\');
INSERT INTO `settings` (`id`, `name`, `value`, `nice_name`, `description`) VALUES (5, \'email_template_workorder_created\', \'&lt;p&gt;Dear ::username::&lt;/p&gt;\\n\\n&lt;p&gt;Your workorder was submitted.&lt;/p&gt;\\n\\n&lt;p&gt;Regards,&lt;br&gt;\\nTrinity Support&lt;/p&gt;\', \'Work Order Submit Notification Email Template\', \'Variables: ::username:: - client username\');
',
  'sql_down' => 'DELETE FROM `settings` WHERE `name` = \'email_template_registration\';
DELETE FROM `settings` WHERE `name` = \'email_template_recovery_password\';
DELETE FROM `settings` WHERE `name` = \'email_template_workorder_created\';',
  'has_data' => true,
  'date' => 1362055373,
)?>