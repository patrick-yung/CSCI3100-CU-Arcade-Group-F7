<?php
session_start();
require_once '../includes/dbh.inc.php';
require_once 'signfunction.php';
/*
Author: Patrick Yung
Last Update:04/04/2022
Function: Function used for registering an account, this is obtaining the details and checking ht ID exist in database, any empty input and if typed password match with each other, if so pass the data to create users.
*/

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordrepeat = $_POST["passwordrepeat"];
    
    if(uidMatch($conn, $username, $email)!==false){
        header("location: Register.php?error=username taken");
        exit();
    }
    
    if(emptyInputSignup($name, $email,$username, $password, $passwordrepeat)!== false){
        header("location: Register.php?error=emtpyinput");
        exit();
    }
    if(pwdMatch($password, $passwordrepeat)!== false){
        header("location: Register.php?error=password don't match");
        exit();
    }
    createUser($conn, $name, $email,$username, $password);
}else{
    header("location: Register.php");
    exit();
}
