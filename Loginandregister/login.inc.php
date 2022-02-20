<?php

if(isset($_POST["LOGIN"])){
$username=$_POST["uid"];
$password=$_POST["pwd"];

require_once '../includes/dbh.inc.php';
require_once 'login_function.php';

if(emptyInputLogin($username, $password)!== false){
    header("location: Register.php?error=emtpyinput");
    exit();
}
    loginUser($conn, $username, $password);
}else{
    header("location: Register.php");
    exit();
}