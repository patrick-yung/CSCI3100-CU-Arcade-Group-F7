<?php
session_start();
require_once 'dbh.inc.php';
require_once 'functions.inc.php';


if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordrepeat = $_POST["passwordrepeat"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $email,$username, $password, $passwordrepeat)!== false){
        header("location: ../index.php?error=emtpyinput");
        exit();
    }

    if(pwdMatch($password, $passwordrepeat)!== false){
        header("location: ../index.php?error=password don't match");
        exit();
    }
    if(uidMatch($conn, $name, $email)!== false){
        header("location: ../index.php?error=username taken");
        exit();
    }

    createUser($conn, $name, $email,$username, $password);
}else{
    header("location: ../index.php");
    exit();
}

