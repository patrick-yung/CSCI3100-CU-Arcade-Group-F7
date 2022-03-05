<?php
    session_start();
?>

<?php include_once 'Format/header.php'?>

<!DOCTYPE html>
<html lang="en" onclick="jump()">
<head>
    <meta charset="UTF-8">
    <title>Jump Game</title>
    <link rel="stylesheet" href="Format/style.css">
</head>
<body>
    <div class="empty"></div>
    <div class="game">
        <div id="character"></div>
        <div id="block"></div>
    </div>
    <p>Score: <span id="scoreSpan"></span></p>
</body>
<script src="game.js"></script>
</html>