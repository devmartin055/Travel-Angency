<?php

include "../config/connection.php";

$sql = "SELECT * FROM package_type";

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td class='h6'>
                    {$row['type_name']}
                </td>
                <td class='text-danger font-weight-bold h5' >
                ₱ {$row['price']}
                </td>
                <td>
                    <button class='btn text-info edit bg-transparent' value='{$row['type_id']}' ><i class='bi bi-pencil-square'></i> Edit</button>
                    <button class='btn text-info delete bg-transparent' value='{$row['type_id']}'><i class='bi bi-trash'></i> Delete</button>
                </td>
            </tr>";
    }
}

mysqli_close($conn);
