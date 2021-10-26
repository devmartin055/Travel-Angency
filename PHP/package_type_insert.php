<?php

include "../config/connection.php";

$name = escapeString($_POST["type"]);
$price = $_POST["price"];

$sql = "INSERT INTO `package_type`(`type_id`, `type_name`, `price`) VALUES (null,'$name',$price)";

if (!mysqli_query($conn, $sql)) {
    echo "ERROR INSERTING THE PACKAGE TYPE: ";
    echo "<br> $sql <br>";
    echo mysqli_error($conn);
}

mysqli_close($conn);
