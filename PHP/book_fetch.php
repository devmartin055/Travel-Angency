<?php

include "../config/connection.php";

$sql = "SELECT 
            b.book_id as book_id,
            p.package_name as package,
             b.date_departure as date_departure,
             b.contact_person as contact_person,
             b.contact_number as contact_number,
             b.email as email,
             b.country_origin as origin
             FROM booking b
             JOIN package p ON p.package_id = b.package_id
             JOIN package_type pt ON pt.type_id = b.type_id
             ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                                <td>{$row['package']}</td>
                                <td>{$row['date_departure']}</td>
                                <td>{$row['contact_person']}</td>
                                <td>{$row['contact_number']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['origin']}</td>
                                <td><button class='btn text-info view bg-transparent' value='{$row['book_id']}' data-toggle='modal' data-target='#viewBookModal'><i class='bi bi-view-list'></i> View</button><br>
                                <button class='btn text-info delete bg-transparent' value='{$row['book_id']}'><i class='bi bi-trash'></i> Delete</button></td>
                            </tr>";
    }

    
}
