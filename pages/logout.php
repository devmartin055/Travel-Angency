<?php
ob_start();
session_start();

if(isset($_SESSION["user_id"])){
    unset($_SESSION["user_id"]);
}
header("location: login.php");