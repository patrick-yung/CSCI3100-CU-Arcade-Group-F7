<?php
#Reset Password
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';


 /*
Author: Patrick Yung
Last Update:04/04/2022
Function: check if register details are correct, such as password match, no empty input, etc.
*/

function emptyInputSignup($name, $email,$username, $password, $passwordrepeat){
    $result= null;
    if(empty($name)||empty($email)||empty($username)||empty($password)||empty($passwordrepeat)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function pwdMatch($password, $passwordrepeat){
    $result= null;
    if($password!==$passwordrepeat){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function uidMatch($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: Register.php?error=stmfailed");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
        $resultData=mysqli_stmt_get_result($stmt);
        if($row=mysqli_fetch_assoc($resultData)){
            return $row;
        }else{
            $result=false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }
}


/*
Author: Patrick Yung
Last Update:04/04/2022
Function: Create user by adding an entry to leaderboard, profile and users databased. Addtionally, send an email to the entered email address for confirmation with random generated code for email confirmation.
*/
function createUser($conn, $name, $email, $username, $password){

    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, usercode) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: Register.php?error=stmfailed");
        exit();
    }else{
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
        $mail->addAddress($email, $name);
        $mail->isHTML(true);
        $mail->Subject = 'Email verification';
        $code=rand( 1000,  9999);
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $code . '</b></p>';
        $mail->send();
        $hashed=password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $username, $hashed, $code);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);


        $sql = "SELECT * FROM users WHERE usersName = '$name'";
        $result = mysqli_query($conn, $sql);

            $row= mysqli_fetch_assoc($result);
                $id =$row['usersID'];
                $sqlImg = "INSERT INTO profileimg (userid, have) VALUES ('$id', 1)";
                mysqli_query($conn, $sqlImg);
            
        
        $sqlImg = "INSERT INTO leaderboard (username, usersID, highestscore) VALUES ('$name', '$id', 0)";
        mysqli_query($conn, $sqlImg);


        die("Please verify your email <a href='email.php?email=" . $email . "'>from here</a>");
        exit();
    }
}
