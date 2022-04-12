<?php
session_start();
include_once '../includes/dbh.inc.php';
$id = $_SESSION['usersID'];
/*
Author: Patrick Yung
Last Update:04/04/2022
Function: To upload a profile picture onto profiledatabase
Reference: Dani Krossing
*/
if(isset($_POST['submit'])){
    $file=$_FILES['file'];
    print_r($file);
    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];
    
    $fileExt = explode('.', $fileName);

    $fileActualExt = strtolower(end($fileExt));
    $allowed=array('png');

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNameNew="profile".$id.".".$fileActualExt;
                $fileDestination = 'upload/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
                $sql = "UPDATE profileimg set have=2 WHERE userid= '$id'";
                $result = mysqli_query($conn, $sql);
                header("Location: Settings.php?uploadsucess");
            }else{
                echo "Your file too large "; 
            } 
        }else{
            echo "Error has Occur"; 
        }
    }else{
        echo "Wrong File Type";
    }
}
