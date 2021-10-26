<?php

include "../config/connection.php";

$sql = "SELECT `type_id`, `type_name`, `price` 
                FROM `package_type` 
                WHERE `type_id`=" . $_POST["type_id"];

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    echo json_encode($row);
}

mysqli_close($conn);
