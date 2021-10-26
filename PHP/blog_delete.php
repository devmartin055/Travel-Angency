<?php


include "../config/connection.php";

$sql = "SELECT `cover` FROM `blog` WHERE `blog_id` =" . $_POST["blog_id"];

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);

    $target_file = "../uploads/" . $row["cover"];
    if (file_exists($target_file)) {
        unlink($target_file);

        $sql = "DELETE FROM blog WHERE blog_id = " . $_POST["blog_id"];

        if (mysqli_query($conn, $sql)) {

            echo "blog successfully deleted";
        }
    } else {
        echo "FILE DOES NOT EXIST!";
    }
}
