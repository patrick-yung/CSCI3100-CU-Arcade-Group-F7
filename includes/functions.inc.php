<?php
#Reset Password
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';


#Sign up 
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

#login
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

#Create User
function createUser($conn, $name, $email, $username, $password){

    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd, usercode) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmfailed");
        exit();
    }else{
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'csci3100tmp@gmail.com';
        $mail->Password = 'milk1234567';
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
        die("Please verify your email <a href='../email.php?email=" . $email . "'>from here</a>");
        exit();
    }
}





//Load Composer's autoloader

function send_password_reset($get_name, $get_email, $token){
    $mail = new PHPMailer(true);

        //Server settings
        $mail->isSMTP();
        $mail->SMTPAuth=true;
      

        $mail->Host       = 'localhost';                  
        $mail->Username   = 'patrickyyung@gmail.com';                 
        $mail->Password   = 'dog123';    
        $mail->Port       = 465;  
    
        //Recipients
        $mail->setFrom('csci3100@example.com', $get_name);
        $mail->addAddress($get_email);               //Name is optional
 
        $mail->isHTML(true);
        $mail->Subject="Reset Password Noficiation";
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();

}