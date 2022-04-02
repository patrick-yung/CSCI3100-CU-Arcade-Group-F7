<?php
    session_start();
?>
<?php include_once '../includes/dbh.inc.php'?>

<?php
    $score = $_GET["score"];
    $id=$_SESSION["usersID"];
    $sqlImg = "SELECT * FROM leaderboard WHERE usersID = '$id'";
    $resultImg = mysqli_query($conn, $sqlImg);
    $rowImg=mysqli_fetch_assoc($resultImg);

    if($rowImg["highestscore"] < $score){
        $sql = "UPDATE leaderboard set highestscore='$score' WHERE usersID= '$id'";
        $result = mysqli_query($conn, $sql);
        header("location: game.php");
 
    }else{
    header("location: game.php");
    }

?>
