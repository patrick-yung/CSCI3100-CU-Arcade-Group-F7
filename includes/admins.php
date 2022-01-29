<?php
function isAdmin(){

    if(isset($_SESSION["userid"])){
        if($_SESSION["useruid"]=="Patrick")
       return true;
    }else{
        return false;
    }
}
