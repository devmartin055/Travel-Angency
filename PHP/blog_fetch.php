<?php

include "../config/connection.php";

$sql = " SELECT * FROM blog";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>
            <a href='#'>
                <img class='img-thumbnail my-thumbnail' src='../uploads/{$row['cover']}' >
                <span class='text-info h5'>
                {$row['title']}
                </span>
            </a>
        </td>
        <td>
        {$row['author']}
        </td>
        <td>
            {$row['date']}
        </td>
        <td>
            <a class='btn text-info edit' href='../PHP/blog_edit.php?blog_id={$row['blog_id']}'><i class='bi bi-pencil-square'></i> Edit</a><br>
            <button class='btn text-info delete bg-transparent' value='{$row['blog_id']}'><i class='bi bi-trash'></i> Delete</button>
        </td>
    </tr>";
    }
}

mysqli_close($conn);
