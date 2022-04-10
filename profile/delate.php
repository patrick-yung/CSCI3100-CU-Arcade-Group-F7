<?php
    session_start();
?>
<?php include_once '../includes/dbh.inc.php'?>
<?php include_once 'Format/header.php'?>

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
if($resultcheck>0){
    

    while($row = mysqli_fetch_assoc($result)){;
        $id = $row['usersID'];
        $sqlImg = "SELECT * FROM profileimg WHERE userid = '$id'";
        $resultImg = mysqli_query($conn, $sqlImg);
        echo "<table border: 10px solid>";
        while($rowImg = mysqli_fetch_assoc($resultImg)){
            
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
        echo "</table>";
    }
}

      
                       
  
?>

</body>

<?php include_once 'Format/footer.php'?>

