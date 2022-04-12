<?
/*
Author: Patrick Yung
Last Update:04/04/2022
Function: Reset selected user's password to "0000"
*/
?>

<?php
include_once '../includes/dbh.inc.php';
if (isset($_GET['username'])) {  
     $username = $_GET['username'];  
     $score=0;

     $sql = "UPDATE leaderboard set highestscore='$$score' WHERE username= '$username'";
     $result = mysqli_query($conn, $sql);

     if ($result) {  
          header('location:leaderboard.php');  
     }else{  
          echo "Error: ".mysqli_error($conn);  
     }  
}else{

header("location: delate.php");
    exit();
}
