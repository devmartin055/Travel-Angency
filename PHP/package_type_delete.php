UPDATE `package_type` SET `type_id`='[value-1]',`type_name`='[value-2]',`price`='[value-3]' WHERE `type_id`

<?php

include "../config/connection.php";


$sql = "DELETE FROM `package_type` WHERE `type_id`=" . $_POST["type_id"];

if (!mysqli_query($conn, $sql)) {
    echo "ERROR! \n" . $sql . "\n" . mysqli_error($conn);
}

mysqli_close($conn);
