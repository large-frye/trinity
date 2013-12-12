<?php defined('SYSPATH') or die('No direct script access.');


class Model_Mailer extends Model_Base {
    

    public function __construct() {
    	parent::__construct();

    	require $_SERVER['DOCUMENT_ROOT'] . '/trinity/PHPMailer/PHPMailerAutoload.php';

    	$this->_host = "smtp.gmail.com";
    	$this->_port = 587;
    	$this->_username = 'a.frye4@gmail.com';
    	$this->_password = '';
    }



    public function send_mail($to, $from, $subject, $body, $cc = array(), $bcc = array()) {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = $this->_host;
        $mail->Port = $this->_port;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = $this->_username;
        $mail->Password = $this->_password;
        $mail->setFrom('admin@trinity.is', 'Trinity Inspections');
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