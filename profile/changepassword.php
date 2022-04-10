<?php
session_start();
include_once '../includes/dbh.inc.php';
$id = $_SESSION['usersID'];
$password=$_POST["newpassword"];
$hashed=password_hash($password, PASSWORD_DEFAULT);


if(isset($_POST['change'])){
    $sql = "UPDATE users set usersPwd='$hashed' WHERE usersID= '$id'";
    $result = mysqli_query($conn, $sql);
}
die(" Successfully Change passsword <a href='Settings.php?'>back</a>");
header("location: upload.php");
