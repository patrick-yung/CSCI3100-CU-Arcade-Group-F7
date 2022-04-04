
<?php

/*
Author: Patrick Yung
Last Update:04/04/2022
Function: Check if users enter empty login deatils, and if user exist already.
*/

function emptyInputLogin($username, $password){
    $result= null;
    if(empty($username)||empty($password)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}


#Check if User exist
function uidMatch($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: Register.php?error=stmfailed");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
        $resultData=mysqli_stmt_get_result($stmt);
        if($row=mysqli_fetch_assoc($resultData)){
            return $row;
        }else{
            $result=false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }
}


/*
Author: Patrick Yung
Last Update:04/04/2022
Function: Start Session for user, and make their username, ID and level global to asscess anywhere in this website
*/

function loginUser($conn, $username, $password){
    $uidExists=uidMatch($conn, $username, $username);

    if($uidExists === false){
        header("location: Register.php?error=wronginput");
        exit();
    }

    if($uidExists['email_verify']==false){
        header("location: Register.php?error=verifyyouremail");
        exit();
    }

    $pwdhash = $uidExists["usersPwd"];
    $check = password_verify($password, $pwdhash);

    if($check  === false){
        header("location: Register.php?error=bad password");
        exit();
    }else if($check  === true){
        session_start();
        $_SESSION["usersID"] = $uidExists["usersID"];
        $_SESSION["usersName"] = $uidExists["usersName"];
        $_SESSION["user_level"] = $uidExists["user_level"];
        header("location: ../home.php?");
        exit();
    }
}
