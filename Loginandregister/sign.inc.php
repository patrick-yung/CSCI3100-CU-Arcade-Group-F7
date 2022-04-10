<?php
session_start();
require_once '../includes/dbh.inc.php';
require_once 'signfunction.php';


if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordrepeat = $_POST["passwordrepeat"];
    
    if(uidMatch($conn, $username, $email)!==false){
        header("location: Register.php?error=User exist");
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
