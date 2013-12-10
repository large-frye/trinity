<?php return array (
  'name' => 'Settings - Work order message email template for clients',
  'description' => '',
  'sql_up' => 'INSERT INTO `settings` (`id`, `name`, `value`, `nice_name`, `description`) VALUES (6, \'email_template_message_for_client\', \'&lt;p&gt;Dear ::username::&lt;/p&gt;\\n\\n&lt;p&gt;You have received a message related to your submitted work order.&lt;/p&gt;\\n\\n&lt;p&gt;The message is:&lt;/p&gt;\\n\\n&lt;p&gt;\\n::message::\\n&lt;/p&gt;\\n\\n&lt;p&gt;Regards,&lt;br&gt;\\nTrinity Support&lt;/p&gt;\', \'Work Order Message for Client Email Template\', \'Variables: ::username:: - client`s username, ::message:: - the message\');
',
  'sql_down' => 'DELETE FROM `settings` WHERE `name` = \'email_template_message_for_client\';',
  'has_data' => true,
  'date' => 1362148545,
)?>