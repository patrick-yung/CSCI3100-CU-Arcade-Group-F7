
<?php

//Login Stuff//
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
        $_SESSION["userid"] = $uidExists["usersPwd"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../home.php?");
        exit();
    }
}