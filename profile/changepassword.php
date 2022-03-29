<?php
session_start();
include_once '../includes/dbh.inc.php';
$id = $_SESSION['usersID'];
$password=$_POST["newpassword"];
$hashed=password_hash($password, PASSWORD_DEFAULT);


if(isset($_POST['change'])){
    echo "$password";
    $sql = "UPDATE users set usersPwd='$hashed' WHERE usersID= '$id'";
    $result = mysqli_query($conn, $sql);
    
}
header("location: Settings.php");

