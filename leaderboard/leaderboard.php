/*
Author: Tam Hok Yan
Last Update:04/04/2022
Function: sort the score from database and combine the data into a table. It is displayed as leaderboard.
*/

<?php
    session_start();

?>
<?php include_once 'Format/header.php'?>
<?php include_once '../includes/dbh.inc.php'?>

<style>
    table, th, td {
        border:2px solid black;
        border-collapse: collapse;
    }
    table.center {
        margin-left: auto; 
        margin-right: auto;
        margin-top:150px;
        text-align: center;
    }
</style>
    <body>
    <table style="width:50%", class="center" bgcolor="white">
        <tr>
            <td>Rank</td>
            <td>User</td>
            <td>Score</td>
        </tr>
        <?php
            

        $result = mysqli_query($conn, "SELECT highestscore, username FROM leaderboard ORDER BY highestscore DESC");
        
        $ranking = 1;
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr><td>{$ranking}</td>
                <td>{$row['username']}</td>
                <td>{$row['highestscore']}</td>";
                if(isset($_SESSION["user_level"])){
                    if($_SESSION["user_level"]==1){
                   echo "<td><a href='reset.php?username=".$row['username']."' id='btn'>Reset</a></td> ";

                    }
                }
                echo "</tr>";
                $ranking++;  
            }
        }
        ?>
    </table>

    </body>

<?php include_once 'Format/footer.php'?>

