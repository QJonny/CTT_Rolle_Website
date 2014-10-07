<?php
include ('./config/passwords.php');

// Database configurations
$db_localhost = new DatabaseConfiguration('localhost', 'root', $pwd_db_localhost, 'CTT_ROLLE');
$db_olympe = new DatabaseConfiguration('sql2.olympe.in', '7itbeawx', $pwd_db_olympe, '7itbeawx');

// Mail configurations
$mail_localhost = new MailConfiguration('localhost', 587, 'root', $pwd_mail_localhost, 'tls');
$mail_olympe = new MailConfiguration('mx1.olympe.in', 587, 'admin@cttrolle.ch', $pwd_mail_olympe, 'tls');
$mail_epfl = new MailConfiguration('mail.epfl.ch', 465, 'quarta', $pwd_mail_epfl, 'ssl');
$mail_hotmail = new MailConfiguration('smtp.live.com', 587, 'solidsnake685@hotmail.com', $pwd_mail_hotmail, 'tls');



// Pointer configurations (use from external)
$db_config = $db_localhost;
$mail_config = $mail_hotmail; // temporary

?>
