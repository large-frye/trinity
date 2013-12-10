<?php return array (
  'name' => 'Work order report - email templates',
  'description' => '',
  'sql_up' => 'INSERT INTO `settings` (`name`, `value`, `nice_name`, `description`) VALUES (\'email_template_inspection_completed\', \'&lt;p&gt;Dear Administrator&lt;/p&gt;\\n\\n&lt;p&gt;Workorder &lt;strong&gt;::workorder_id::&lt;/strong&gt; is completed.\\n\\n&lt;p&gt;Regards, &lt;br&gt;\\nTrinity Support&lt;/p&gt;\', \'Inspection Status Completed E-mail Template\', \'Variables: ::workorder_id:: - Workorder ID\');
INSERT INTO `settings` (`name`, `value`, `nice_name`, `description`) VALUES (\'email_template_generated_report\', \'&lt;p&gt;Dear ::username::&lt;/p&gt;\\n\\n&lt;p&gt;The generated report of your work order  &lt;strong&gt;::workorder_id::&lt;/strong&gt; is attached.\\n\\n&lt;p&gt;Regards, &lt;br&gt;\\nTrinity Support&lt;/p&gt;\', \'Report Generation E-mail Template\', \'Variables: ::username:: - client username, ::workorder_id:: - Workorder ID\');
',
  'sql_down' => 'DELETE FROM `settings` WHERE `name`=\'email_template_inspection_completed\';
DELETE FROM `settings` WHERE `name`=\'email_template_generated_report\';',
  'has_data' => true,
  'date' => 1363185701,
)?>