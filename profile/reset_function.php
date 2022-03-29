<?php
include_once '../includes/dbh.inc.php';


if (isset($_GET['id'])) {  
     $id = $_GET['id'];  
     $password="0000";
     $hashed=password_hash($password, PASSWORD_DEFAULT);

     $sql = "UPDATE users set usersPwd='$hashed' WHERE usersID= '$id'";
     $result = mysqli_query($conn, $sql);

     if ($result) {  
          header('location:delate.php');  
     }else{  
          echo "Error: ".mysqli_error($conn);  
     }  
}else{

header("location: delate.php");
    exit();
}
