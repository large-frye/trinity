<?php return array (
  'name' => 'Settings - Statuses email templates',
  'description' => '',
  'sql_up' => 'INSERT INTO `settings` (`name`, `value`, `nice_name`, `description`) VALUES (\'email_template_workorder_scheduled\', \'&lt;p&gt;Dear ::username::&lt;/p&gt;\\n\\n&lt;p&gt;The status of your workorder was changed for Scheduled.&lt;/p&gt;\\n\\n&lt;p&gt;Date when the inspection will be taken: ::schedule_date::&lt;/p&gt;\\n\\n&lt;p&gt;Regards,&lt;br&gt;\\nTrinity Support&lt;/p&gt;\', \'Work Order Status Scheduled E-mail Template\', \'Variables: ::username:: - username, ::schedule_date:: - inspection date\');
INSERT INTO `settings` (`name`, `value`, `nice_name`, `description`) VALUES (\'email_template_workorder_alert\', \'&lt;p&gt;Dear ::username::&lt;/p&gt;\\n\\n&lt;p&gt;Your work-order status was changed for Alert!&lt;br&gt;\\nPlease check your account as soon as possible.&lt;/p&gt;\\n\\n&lt;p&gt;Regards, &lt;br&gt;\\nTrinity Support&lt;/p&gt;\', \'Workorder Status Alert E-mail Template\', \'Variables: ::username::\');
',
  'sql_down' => 'DELETE FROM `settings` WHERE `name` = \'email_template_workorder_scheduled\';
DELETE FROM `settings` WHERE `name` = \'email_template_workorder_alert\';',
  'has_data' => true,
  'date' => 1362562608,
)?>