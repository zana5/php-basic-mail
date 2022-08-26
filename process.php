<?php

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$content = $_POST['content'];

// https://github.com/PHPMailer/PHPMailer
require './vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = 'mail@server.com';
$mail->Password = 'password';

$mail->setFrom($email, $firstname . ' ' . $lastname);
$mail->addAddress('helpdesk@example.com', 'Helpdesk Dept');
$mail->addAddress('admin@example.com', 'Admin Dept');
$mail->addCC('md@example.com', 'MD Dept');

$mail->isHTML(true);
$mail->Subject = 'Email from ' . $email;
$mail->Body = $content;

$mail->send();

header('Location: success.html ');
