<?php
    session_start();
?>
<?php include_once '../includes/dbh.inc.php'?>
<?php include_once 'Format/header.php'?>


<body>

<?php
      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_assoc($result)){
              $id = $row['usersID'];
              $sqlImg = "SELECT * FROM profileimg WHERE userid = '$id'";
              $resultImg = mysqli_query($conn, $sqlImg);
              while($rowImg = mysqli_fetch_assoc($resultImg)){
                  echo "<div>";
                      if($rowImg['status']==0){
                          echo "<img src='Upload/profile".$id.".png'>";
                      }else{
                          echo "<img src='Upload/deafult.png'>";
                      }
                      echo $row['usersName'];
                  echo "</div>";
              }
          }
      }
      if(isset($_SESSION["userid"])){
          echo "You are Login In Hello";
  
          echo "<form action ='upload.php' method='POST' enctype='multipart/form-data'>
          <input type ='file' name='file'>
          <button type='submit' name='submit'>Upload Profile Picture</button>
                  </form>";
      }else{
        header("location: current.php");
    }                 
  
?>

</body>

<?php include_once 'Format/footer.php'?>
