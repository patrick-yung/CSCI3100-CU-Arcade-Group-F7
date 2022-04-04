<?
/*
Author: Patrick Yung
Last Update:04/04/2022
Function: Log out current users
*/
?>


<?php
session_start();
session_unset();
session_destroy();
header("location: ../home.php?");
exit();