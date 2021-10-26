<?php
ob_start();
/* include upload image and rename function */
include "../includes/upload_image.php";

if (isset($_POST["submit"])) {
    include "../config/connection.php";

    $title =  escapeString($_POST["title"]);
    $author = escapeString($_POST["author"]);


    $image = "";
    if ($_FILES["image"]["size"] != 0) {
        $image = escapeString(getImageFileName($_FILES["image"]["name"]));
    }
    $content = escapeString($_POST["content"]);
    $date = escapeString(date("F d, Y"));

    $sql = "INSERT INTO `blog`(`blog_id`, `title`, `author`, `cover`, `content`, `date`) VALUES (null,'$title','$author','$image','$content','$date')";


    if (mysqli_query($conn, $sql)) {
        echo "<br>BLOG SUCCESSFULLY INSERTED!<br>";

        if (uploadImage($image, $_FILES["image"]["tmp_name"], "../uploads/")) {
            header("location: blog_add_complete.php");
        } else {
            echo "UPLOAD IMAGE FAILED!";
        }
    } else {
        echo "<br> THERE WAS AN ERROR PUBLISHING THE BLOG! : <br>";
        echo $sql . "<br>";
        echo mysqli_error($conn) . "<br>";
    }


}

ob_end_flush();