<?php

include "../config/connection.php";

$sql = "SELECT * FROM package";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>
    	        <td>
    		        <img class='img-thumbnail package-img' src='../uploads/{$row['package_image']}'>
    		        <a class='ml-3 text-info' href='../PHP/updateSession.php?package_id={$row['package_id']}'> {$row['package_name']}</a>
    	        </td>
				
    	        <td>{$row['no_of_days']}D{$row['no_of_nights']}N</td>
    	        <td>{$row['destination']}</td>
    	        <td><a href='../PHP/updateSession.php?package_id={$row['package_id']}' class=' text-info btn bg-transparent'><i class='bi bi-pencil-square'></i> Edit</a> <br> <button class='delete-btn text-info btn bg-transparent' type='button' value='{$row['package_id']}'><i class='bi bi-trash'></i> Delete</button></td>
            </tr>";
	}
}

mysqli_close($conn);
