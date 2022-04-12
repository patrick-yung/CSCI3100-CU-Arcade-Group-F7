<?
/*
Author: Patrick Yung
Last Update:04/04/2022
Function: Change current user's password
*/
?>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';


session_start();
include_once 'includes/dbh.inc.php';
$id = $_SESSION['usersID'];
if(isset($_POST["send"])){
    $username=$_POST["uid"];
    $password=$_POST["pwd"];
$message=$_POST["qwer"];

$mail = new PHPMailer(true);
$mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'csci3100tmp@gmail.com';
$mail->Password = 'csci31002022';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->setFrom('csci3100tmp@gmail.com', 'CSCI3100');
$mail->addAddress('patrickyyung@gmail.com');
$mail->isHTML(true);
$mail->Subject = 'User request';
$mail->Body    = '<p>User Message: '. $message.'</p>';
$mail->send();

}

header("location: contactpage.php");
exit();
