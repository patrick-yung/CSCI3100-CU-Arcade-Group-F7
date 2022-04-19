<?
/*
Author: Patrick Yung
Last Update:04/04/2022
Function: Change current user's password and sent a email to notify the user
Reference: Dani Krossing

*/
?>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';


session_start();
include_once '../includes/dbh.inc.php';
$id = $_SESSION['usersID'];
$password=$_POST["newpassword"];
$hashed=password_hash($password, PASSWORD_DEFAULT);


if(isset($_POST['change'])){
    $sql = "UPDATE users set usersPwd='$hashed' WHERE usersID= '$id'";
    $result = mysqli_query($conn, $sql);
}
$sql = "SELECT * FROM users where usersID = '$id'" ;
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


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
$mail->addAddress($row['usersEmail'], $row['usersID']);
$mail->isHTML(true);
$mail->Subject = 'Your Password Has been changed ';
$mail->Body    = '<p>Your Password Has been changed </p>';
$mail->send();



die(" Successfully Change passsword <a href='Settings.php?'>back</a>");
header("location: upload.php");
