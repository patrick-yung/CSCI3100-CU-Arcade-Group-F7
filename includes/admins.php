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
