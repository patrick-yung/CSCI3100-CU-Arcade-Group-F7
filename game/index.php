<?php
    session_start();
?>

<?php include_once '../includes/dbh.inc.php'?>
<?php include_once 'Format/header.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dino Game</title>
    <link rel="stylesheet" href="style.css">
</head>

<php?
    $id=$_SESSION["usersID"];
    $sqlImg = "SELECT * FROM profileimg WHERE userid = '$id'";
    $resultImg = mysqli_query($conn, $sqlImg);
    $rowImg=mysqli_fetch_assoc($resultImg);

    if($rowImg["highestScore"] < score){
        score = $rowImg["highestScore"];
    }
?></php>

<body>
    <p><font size="4">Press ⎵ to start game</font></p>
    <p><font size="4">Press ↑ to jump</font></p>

    <div id="container">
        <div id="dino">
            <img src="assets/dino.png" alt="dino">
        </div>
        <div id="block">
            <img src="assets/block.png" alt="block">
        </div>
        <div id="road">
            <img src="assets/road.png" alt="road">
        </div>
        <div id="cloud">
            <img src="assets/cloud.png" alt="cloud">
        </div>
        <div id="score">
            <p>Score<b>00</b></p>
        </div>
        <div id = "gameStart">
            <p>press ↑ to start </p>
            <p><font size="4">Press ↑ to jump</font></p>
        </div>
        <div id="gameOver">
            <p>Game Over </p>
           <p><font size="4">Press SPACE to play again!</font></p>
        </div>
    </div>
    <script src="file.js"></script>
</body>
</html>
