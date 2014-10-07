<?php
	require './utils/mail/PHPMailerAutoload.php';


	function _InitMailer($mail_config_)
	{
		$mail = new PHPMailer();

		$mail->SMTPDebug = 0;                               	// Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = $mail_config_->server;  								// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = $mail_config_->username;            // SMTP username
		$mail->Password = $mail_config_->password;            // SMTP password
		$mail->SMTPSecure = $mail_config_->encryption;        // Enable TLS encryption, `ssl` also accepted
		$mail->Port = $mail_config_->port;                    // TCP port to connect to

		return $mail;
	}

	function SendMail($mail_config_, $from, $to, $subject, $msg)
	{
		$mail = _InitMailer($mail_config_);

		$mail->From = $from;
		$mail->FromName = $from;
		$mail->Subject = $subject;
		$mail->addAddress($to, '');

		$mail->Body    = $msg;
		
		if($mail->send()) {
				return true;
		} else {
				return false;
		}
	}
?>

