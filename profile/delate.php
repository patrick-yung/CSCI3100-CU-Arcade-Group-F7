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
        while($rowImg = mysqli_fetch_assoc($resultImg)){
        echo "<table>";
            echo "<tr>";
            if($rowImg['have']== 2){
                echo "<img src='Upload/profile".$id.".png'".mt_rand().">";
            }else{
                echo "<img src='Upload/deafult.png'>";
            }

            //
            echo "
                 <tr>".$row['usersID']."</tr>
                <tr>".$row['usersName']."</tr>
                <tr>".$row['usersEmail']."</tr>
                <tr>
                <tr><a href='delate_function.php?id=".$row['usersID']."' id='btn'>Delete</a></td>  
                </tr>
            </tr>
            "; 
            
        echo "</table>";
        }
    }
}

      
                       
  
?>

</body>

<?php include_once 'Format/footer.php'?>

