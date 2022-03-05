<?php
function isAdmin(){

    if(isset($_SESSION["usersID"])){
        if($_SESSION["usersID"]=="Patrick"){
       return true;}
       else
       return false;
    }else{
        return false;
    }
}
