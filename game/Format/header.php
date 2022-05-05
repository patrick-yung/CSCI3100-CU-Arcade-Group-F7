/*
Author: Henry Wong
Last Update:10/04/2022
Function: Header of game page
*/
?>


<?php
    session_start();
?>
<?php include_once '../includes/admins.php'?>

<!DOCTYPE html>
<html lang="en" dir = "ltr">

<head>
    <meta charset="UTF-8">
    <title>Run Run Pikachu</title>
    <link rel="stylesheet" href="Format/style.css">
    <link rel="stylesheet" href = "../css/style2.css">

</head>


    <header>
        <div class="box"></div>
        <a href="#" class= "icon">CU Arcade</a>
        <ul>
        <?php
                 if(isset($_SESSION["user_level"])){
                     if($_SESSION["user_level"]==1){
                    echo "<li><a href='#'>WELCOME Admin </a></li>";
                     }else
                     {
                        echo "<li><a href='#'>Hello: ". $_SESSION["usersName"] . "</li>";

                     }
                }else{
                    echo "<li><a href='#'>Hello GUEST </a></li>";
                }
            ?>
            <li><a href='../home.php'>Home Page</a> </li>
            <li><a href='../leaderboard/leaderboard.php'>Leaderboard</a> </li>
            <li><a href='../contact/contactpage.php'>Contact Us</a></li>
            <?php
                    if(isset($_SESSION["usersID"])){
                        echo "<li><a href='game.php'>Game</a> </li>";
                        echo "<li><a href='../profile/Settings.php'>Setting</a> </li>";
                        echo "<li><a href='../includes/logout.inc.php'>Logout</a> </li>";
                    }else{
                        echo "<li><a href='../Loginandregister/email.php'>Confirm  Email</a> </li>";
                        echo "<li><a href='../Loginandregister/Register.php' class='active-btn'>Login/Sign in</a> </li>";   
                    }
            ?>

        </ul>
    </header>
