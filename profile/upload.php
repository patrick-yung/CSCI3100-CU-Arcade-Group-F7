<?php

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
    $allowed=array('jpg','jpeg','pdf','png');

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNameNew=uniqid('',true).".".$fileActualExt;
                $fileDestination = 'upload/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);
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
