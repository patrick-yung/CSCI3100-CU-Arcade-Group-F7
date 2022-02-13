<?php

if(isset($_POST["LOGIN"])){
$username=$_POST["uid"];
$password=$_POST["pwd"];

require_once 'dbh.inc.php';
require_once 'login_function.php';

if(emptyInputLogin($username, $password)!== false){
    header("location: ../index.php?error=emtpyinput");
    exit();
}
    loginUser($conn, $username, $password);
}else{
    header("location: ../project.php");
    exit();
}