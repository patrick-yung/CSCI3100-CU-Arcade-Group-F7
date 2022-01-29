<?php
function emptyInputSignup($name, $email,$username, $password, $passwordrepeat){
    $result= null;
    if(empty($name)||empty($email)||empty($username)||empty($password)||empty($passwordrepeat)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function InvalidEmail($email){
    $result= null;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
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
        header("location: ../index.php?error=stmfailed");
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
function createUser($conn, $name, $email, $username, $password){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmfailed");
        exit();
    }else{
        $hashed=password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashed);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../index.php?error=signnone");
        exit();
    }
}
//Login Stuff//
function emptyInputLogin($username, $password){
    $result= null;
    if(empty($username)||empty($password)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}


function loginUser($conn, $username, $password){
    $uidExists=uidMatch($conn, $username, $username);

    if($uidExists === false){
        header("location: ../index.php?error=wronginput");
        exit();
    }
    $pwdhash = $uidExists["usersPwd"];
    $check = password_verify($password, $pwdhash);

    if($check  === false){
        header("location: ../index.php?error=bad password");
        exit();
    }else if($check  === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersPwd"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../project.php?");
        exit();
    }
}


#Reset Password

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader

function send_password_reset($get_name, $get_email, $token){
    $mail = new PHPMailer(true);

        //Server settings
        $mail->isSMTP();
        $mail->SMTPAuth=true;
      

        $mail->Host       = 'localhost';                     //Set the SMTP server to send through
        $mail->Username   = 'patrickyyung@gmail.com';                     //SMTP username
        $mail->Password   = 'dog123';    
                                   //SMTP password
        $mail->Port       = 465;  
    
        //Recipients
        $mail->setFrom('from@example.com', $get_name);
        $mail->addAddress($get_email);               //Name is optional
 
        $mail->isHTML(true);
        $mail->Subject="Reset Password Noficiation";
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();

}