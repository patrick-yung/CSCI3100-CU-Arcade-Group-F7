<?php
session_start();
require_once '../includes/dbh.inc.php';

if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $code = $_POST["emailcode"];
    $sql = "UPDATE users SET email_verify = NOW() WHERE usersemail = '" . $email . "' AND usercode = '" . $code . "'";
    $result  = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) == 0)
    {
        die("Verification code failed.");
    }
    echo "<p>You can login now.</p>";
    exit();

}else{
    header("location: ../index.php");
    exit();
}