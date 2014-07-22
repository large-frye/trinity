<?php defined('SYSPATH') or die('No direct script access.');


class Model_Mailer extends Model_Base {
    

    public function __construct() {
    	parent::__construct();

    	require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/PHPMailerAutoload.php';

// Updated upstream
    	$this->_host = 'smtp.gmail.com';
    	$this->_port = 465;
    	$this->_username = 'trinity.inspections@gmail.com';
    	$this->_password = 'trinity7705';
    }



    public function send_mail($to, $from, $subject, $template, $variables, $cc = array(), $bcc = array(), $attachments = array()) {
        $mail = new PHPMailer();


        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = $this->_host;
        $mail->Port = $this->_port;
        $mail->Username = $this->_username;
        $mail->Password = $this->_password;
        $mail->IsHTML(true);
        $mail->SetFrom('trinity.inspections@gmail.com', "Trinity Roof Inspections");
        $mail->Subject = $subject;
        $mail->addAddress($to);

        $body = $this->_get_body($template, $variables);
        $mail->Body = "<html>" . $body . "</html>";

        if (!empty($attachments)) {
            foreach ($attachments as $attachment) {
                $mail->AddAttachment($attachment);
            }
        }

        if (!$mail->send()) {
        	echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            // echo "Message Sent";
        }
    }



    private function _get_body($template, $variables) {
        $template_data = $this->_get_template($template);
        $body = $template_data->value;
        $_variables = explode('|', $template_data->variables);
        foreach ($_variables as $var) {

            $body = str_replace($var, $variables[$var], $body);
        }

        return $body;
    }



    private function _get_template($id) {
        return DB::query(Database::SELECT, "SELECT value, variables FROM settings WHERE id = :id")
                   ->parameters(array(':id' => $id))
                   ->as_object()
                   ->execute($this->db)
                   ->current();
    }
}