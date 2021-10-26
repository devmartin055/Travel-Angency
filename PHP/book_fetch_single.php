<?php

include "../config/connection.php";

$sql = "SELECT 
            b.book_id as book_id,
            p.package_name as package_name,
             pt.type_name as type_name,
             b.number_of_person as number_of_person,
             b.contact_person as contact_person,
             b.contact_number as contact_number,
             b.email as email,
             b.country_origin as country_origin,
             b.instruction as instruction,
             b.booked_date as booked_date,
             b.date_departure as date_departure
             FROM booking b
             JOIN package p ON p.package_id = b.package_id
             JOIN package_type pt ON pt.type_id = b.type_id
             WHERE b.book_id=" . $_POST["book_id"];

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}
else{
    echo mysqli_error($conn);
}

mysqli_close($conn);