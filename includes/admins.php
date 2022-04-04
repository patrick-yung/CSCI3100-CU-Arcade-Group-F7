<?
/*
Author: Patrick Yung
Last Update:04/04/2022
Function: Check if current user is admin
*/
?>

<?php
function isAdmin(){

    if(isset($_SESSION["usersID"])){
        if($_SESSION["user_level"]==1){
       return true;}
       else
       return false;
    }else{
        return false;
    }
}
