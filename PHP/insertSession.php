<?php
ob_start();
session_start();
$_SESSION["addPackage"]["insertSession"] = rand(1, 10000);

header("location: ../pages/admin_package_insert.php");
ob_end_flush();