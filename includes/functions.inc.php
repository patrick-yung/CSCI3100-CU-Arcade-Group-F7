
<?
/*
Author: Patrick Yung
Last Update:04/04/2022
Function: Send Confirmation emails to registering users
*/
?>
<?php
#Reset Password
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

//Load Composer's autoloader

function send_password_reset($get_name, $get_email, $token){
    $mail = new PHPMailer(true);

        //Server settings
        $mail->isSMTP();
        $mail->SMTPAuth=true;
      

        $mail->Host       = 'localhost';                  
        $mail->Username   = 'patrickyyung@gmail.com';                 
        $mail->Password   = 'dog123';    
        $mail->Port       = 465;  
    
        //Recipients
        $mail->setFrom('csci3100@example.com', $get_name);
        $mail->addAddress($get_email);               //Name is optional
 
        $mail->isHTML(true);
        $mail->Subject="Reset Password Noficiation";
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();

}