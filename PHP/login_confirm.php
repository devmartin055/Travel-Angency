<?php
ob_start();
session_start();
include "../config/connection.php";

if (!isset($_POST["submit"])) {
    header("location: login.php");
}

$email = escapeString($_POST["email"]);
$password = escapeString($_POST["password"]);

$sql = "SELECT `user_id`, `user_type`, `email`, `password` FROM `login_user` WHERE `email`='$email' AND `password`='$password'";

$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));


if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $_SESSION["user_id"] = $row["user_id"];
    if (isset($_POST["rememberMe"])) {
        $_SESSION["user_type"] = $row["user_type"];
        $_SESSION["rememberMe"] = "true";
        $_SESSION["password"] = $email;
        $_SESSION["username"] = $password;
    } else {
        if (isset($_SESSION["rememberMe"])) {
            unset($_SESSION["rememberMe"]);
        }
        if (isset($_SESSION["username"])) {
            unset($_SESSION["username"]);
        }
        if (isset($_SESSION["password"])) {
            unset($_SESSION["password"]);
        }
    }

    if ($row["user_type"] == 0) {
        header("location: ../pages/admin_package.php");
    } else {
        header("location: ../index.php");
    }
} else {
    if (isset($_SESSION["rememberMe"])) {
        unset($_SESSION["rememberMe"]);
    }
    if (isset($_SESSION["username"])) {
        unset($_SESSION["username"]);
    }
    if (isset($_SESSION["password"])) {
        unset($_SESSION["password"]);
    }
    header("location: ../pages/login.php?invalid=true");
}
ob_end_flush();