<?php defined('SYSPATH') or die('No direct script access.');


class Model_Mailer extends Model_Base {
    

    public function __construct() {
    	parent::__construct();

    	require $_SERVER['DOCUMENT_ROOT'] . '/trinity/PHPMailer/PHPMailerAutoload.php';

// Updated upstream
    	$this->_host = 'smtp.gmail.com';
    	$this->_port = 465;
    	$this->_username = 'a.frye4@gmail.com';
    	$this->_password = 'mraybcnvbkczlndw';

    }



    public function send_mail($to, $from, $subject, $body, $cc = array(), $bcc = array()) {
        $mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = $this->_host;
        $mail->Port = $this->_port;
        $mail->Username = $this->_username;
        $mail->Password = $this->_password;
        $mail->IsHTML = true;
        $mail->SetFrom('admin@trinity.is', "Trinity Roof Inspections");
        $mail->Subject = $subject;
        $mail->addAddress($to);
        $mail->Body = $body;

        if (!$mail->send()) {
        	echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message Sent";
        }
    }
}