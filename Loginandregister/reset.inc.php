<?php
require_once '../includes/dbh.inc.php';



if(isset($_POST["resetsubmit"])){
    $email = mysqli_real_escape_string($conn, $_POST["email"]) ;
    $token = md5(rand());

    $check_email = "SELECT usersEmail FROM users WHERE usersEmail = '$email' LIMIT 1";
    $check_email_run= mysqli_query($conn, $check_email);
    if(mysqli_num_rows($check_email_run)>0){
        $row = mysqli_fetch_array($check_email_run);
        $get_name= $row['usersName'];
        $get_email= $row['usersEmail'];

        $update_token = "UPDATE users SET usersPwd='$token' WHERE usersEmail='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($conn, $update_token);
        if($update_token_run){
            send_password_reset($get_name, $get_email, $token);
            header("location: resetpassword.php?");
            exit();
        }else{
            header("location: resetpassword.php?error=No Match");
            exit();
        }

    }else{
        header("location: resetpassword.php?error=No Match");
        exit();

    }
    

    
}else{
    header("location: ../index.php");
    exit();
}

