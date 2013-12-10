<?php return array (
  'name' => 'Invoice email template',
  'description' => '',
  'sql_up' => 'INSERT INTO `settings`(name, value, nice_name, description)
VALUES (\'email_template_invoice\', \'Dear ::first_name:: ::last_name::,

You recieved an invoice.

You can view it in the attachments.

Regards,
Trinity\', \'Email template for invoice\', \'Variables: ::first_name:: - first name of the client, ::last_name:: - last name of the client\');',
  'sql_down' => 'DELETE FROM settings WHERE name = \'email_template_invoice\'',
  'has_data' => true,
  'date' => 1363165548,
)?>