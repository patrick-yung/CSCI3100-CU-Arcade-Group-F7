<?php
    session_start();

?>
<?php include_once 'Format/header.php'?>
<?php include_once '../includes/dbh.inc.php'?>

<style>
    table, th, td {
        border:1px solid black;
        border-collapse: collapse;
    }
    table.center {
        margin-left: auto; 
        margin-right: auto;
    }
</style>
    <body>
    <table style="width:50%", class="center">
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
                <td>{$row['highestscore']}</td></tr>";
                $ranking++;  
            }
        }
        ?>
    </table>

    </body>

<?php include_once 'Format/footer.php'?>
