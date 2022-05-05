<?php
    session_start();
?>
<?php include_once '../includes/dbh.inc.php'?>
<?php include_once 'Format/header.php'?>
<?
/*
Author: Patrick Yung
Last Update:04/04/2022
Function: Frontend: Display all users in the databse with the option to delate other users or reset their password to "000", only admin can see this folder
Author: Rocky Li
Last Update:10/04/2022
Description: Included measures to fix issue of accounts appearing multiple times, php format changes, image format changes and logic changes
*/
?>
<body>
<link rel="stylesheet" href = "Format/style.css">

<div class='empty'>
</div>

<?php

$currentname=$_SESSION["usersID"];
$sql = "SELECT * FROM users" ;

//
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);
$flag = 0;
if($resultcheck>0){
    echo"<br>";
    echo "<table border: 10px solid bgcolor='white'>";
    while($row = mysqli_fetch_assoc($result)){;
        $flag = 0;
        $id = $row['usersID'];
        $sqlImg = "SELECT * FROM profileimg WHERE userid = '$id'";
        $resultImg = mysqli_query($conn, $sqlImg);
        
        while(($rowImg = mysqli_fetch_assoc($resultImg))==TRUE && $flag==0){
            $flag = 1;
            echo "<tr><td>";
            if($rowImg['have']== 2){
                echo "<img src='Upload/profile".$id.".png'".mt_rand()." style='width:100px;height:100px;'>";
            }else{
                echo "<img src='Upload/deafult.png' style='width:100px;height:100px;'>";
            }
            //
            echo "</td>
                 <td> Users ID is ".$row['usersID']."</td>
                <td> Users name is ".$row['usersName']."</td>
                <td> Users email is ".$row['usersEmail']."</td>
                <td><a href='delate_function.php?id=".$row['usersID']."' id='btn'>Delete</a></td>  
                <td><a href='reset_function.php?id=".$row['usersID']."' id='btn'>Reset</a></td>  
            </tr>
            "; 
            
        
        }
    }
    echo "</table>";
}

      
                       
  
?>

</body>

<?php include_once 'Format/footer.php'?>

