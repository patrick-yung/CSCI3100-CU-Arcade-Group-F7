<?php
    session_start();
?>
<?
/*
Author: Patrick Yung
Last Update:04/04/2022
Function: Display Users profile picture, username and email. Addtionally provide the option to change currrent user's password. Admin would have an addtional option to direct into delate.php.
*/
?>
<?php include_once '../includes/dbh.inc.php'?>
<?php include_once 'Format/header.php'?>
<?php include_once '../includes/admins.php'?>


<body>
    <div class=empty2>
        
    </div>

<link rel="stylesheet" href = "Format/style.css">

<?php

$currentname=$_SESSION["usersID"];

$sql = "SELECT * FROM users where usersID = $currentname" ;

//
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_num_rows($result);

if($resultcheck>0){
    $row = mysqli_fetch_assoc($result);
    $id=$_SESSION["usersID"];

    $sqlImg = "SELECT * FROM profileimg WHERE userid = '$id'";
    $resultImg = mysqli_query($conn, $sqlImg);
    $rowImg=mysqli_fetch_assoc($resultImg);

    echo "<div class='card'>";
        if($rowImg['have']== 2){
            echo "<h1>HELLO</h1>";
            echo "<img src='Upload/profile".$id.".png'".mt_rand().">";
        }else{
            echo "<img src='Upload/deafult.png'>";
        }

        //
        echo "<p>Name: ";
        echo $row['usersName'];
        echo "</p>";
        echo "<p> Email: ";
        echo $row['usersEmail'];
        echo "</p>";
  }

      if(isset($_SESSION["usersName"])){
          echo "You are Login In as";
          echo "<p>Username: ". $_SESSION["usersName"] . "</p>";
          echo "<form action ='upload.php' method='POST' enctype='multipart/form-data'>
          <input type ='file' name='file'>
          <button type='submit' name='submit'>Upload Profile Picture</button>";
        if(isset($_GET["error"])){
        
            if($_GET["error"]=="Wrong File Type" ){
                echo"<p>Wrong File Type</p>";
            }
            if($_GET["error"]=="Error has Occur" ){
                echo"<p>Error has Occur</p>";
            }
            if($_GET["error"]=="Your file too large" ){
                echo"<p>Your file too large</p>";
            }
        }
            
        
        echo "</form>";
              
      }else{
        header("location: Settings.php");
    }                 
    

?>

<form action="changepassword.php" method="post">
			<input type="text" autocomplete="off" name="newpassword" placeholder="New password" />
			<button type="change" name="change" >Change Now</button>
            </form>

</body>
<?php
if($_SESSION["user_level"]==1){
    echo "<p><a href='delate.php'>Delete Other Users</a> <p>";
}
?>
</div>;


<?php include_once 'Format/footer.php'?>
