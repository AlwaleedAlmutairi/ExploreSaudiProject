<?php
session_start();
//use isset to prevent error for non logged in user
if(!isset($_SESSION['access'])){
    header("Location: login.html");
    exit();
}
?>
