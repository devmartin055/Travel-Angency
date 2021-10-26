<?php
ob_start();
session_start();
?>
<html>

<head>
    <?php
    include "../config/connection.php";
    include "../includes/upload_image.php";
    if (!empty($_POST["update"])) {

        $blog_id = $_POST["blog_id"];
        $title = escapeString($_POST["title"]);
        $author = escapeString($_POST["author"]);
        $image = escapeString($_POST["current_image"]);
        $content = escapeString($_POST["content"]);
        $date = escapeString(date("F d, Y"));

        if ($_FILES["image"]["size"] != 0) {
            unlink("../uploads/" . $image);
            $image = escapeString(getImageFileName($_FILES["image"]["name"]));
        }
        $sql = "UPDATE `blog` SET `title`='$title',`author`='$author',`cover`='$image',`content`='$content',`date`='$date' WHERE `blog_id`=" . $blog_id;

        if (mysqli_query($conn, $sql)) {

            $uploadOk = uploadImage($image, $_FILES["image"]["tmp_name"], "../uploads/");

            if ($uploadOk) {
                header("location: blog_update_complete.php");
            }
        }
    }

    if (isset($_GET["blog_id"])) {
        $sql = "SELECT `blog_id`, `title`, `author`, `cover`, `content`, `date` FROM `blog` WHERE `blog_id` =" . $_GET["blog_id"];
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
        }
    } else {
        header("location: ../blog.php");
    }



    include "../includes/libraries.php"
    ?>


    <script src="../JS/validation.js"></script>
    <script src="../JS/imageout.js"></script>

    <link rel="stylesheet" href="../CSS/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>
        Update New Blog
    </title>
</head>

<body>
    <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
        <div class="container bg-light dropshadow my-border w-75 mt-5 mb-5 p-3 pl-lg-5 pr-lg-5 pt-5 mx-lg-auto">

            <div class="row mb-3">
                <div class="col">
                    <h4>Create New Blog</h4>
                    <hr>
                </div>
            </div>
            <div class="row mb-3">
                <input value="<?php
                                echo $row["blog_id"];
                                ?>" type="number" name="blog_id" hidden>
                <div class="col-12 col-lg-3 text-lg-right">
                    <label for="title">Blog Title <span class="font-weight-bold text-danger">*</span></label>
                </div>
                <div class="col-12 col-lg-9">
                    <input value="<?php
                                    echo $row["title"];
                                    ?>" type="text" class="form-control form-control-lg" name="title" placeholder="Enter Blog Title" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-lg-3 text-lg-right">
                    <label for="title">Author <span class="font-weight-bold text-danger">*</span></label>
                </div>
                <div class="col-12 col-lg-9">
                    <input value="<?php
                                    echo $row["author"];
                                    ?>" type="text" class="form-control" name="author" placeholder="Enter Author" required>
                </div>
            </div>
            <!-- upload image -->
            <div class="row mb-3">
                <div class="col-12 col-lg-3 text-lg-right">
                    <label for="image">Upload Blog Cover <span class="text-danger font-weight-bold">*</span></label>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="input-group input-group-lg">
                        <div class="custom-file">
                            <input type="text" name="current_image" value="<?php
                                                                            echo $row["cover"];
                                                                            ?>" hidden>
                            <input name="image" type="file" class="custom-file-input" id="image" accept="image/png, image/gif, image/jpeg">
                            <label id="outSelected" class="custom-file-label " for="image"><?php
                                                                                            echo $row["cover"];
                                                                                            ?></label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- content -->
            <div class="row mb-3">
                <div class="col-12 col-lg-3 text-lg-right">
                    <label for="image">Content <span class="text-danger font-weight-bold">*</span></label>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="input-group ">
                        <textarea class="w-100 form-control" name="content" id="content" cols="30" rows="10" placeholder="Enter blog content here..." maxlength="3000" required><?php
                                                                                                                                                                                echo $row["content"];
                                                                                                                                                                                ?></textarea>
                    </div>
                </div>
            </div>
            <!-- nav button -->
            <div class="row mb-3 justify-content-end">
                <div class="col-6 col-lg-3 ">
                    <a href="../blog.php" class="w-100 btn btn-secondary ">Cancel</a>
                </div>
                <div class="col-6 col-lg-3 ">
                    <input type="submit" class="w-100 btn btn-primary" name="update" id="submit" value="REPUBLISH">
                </div>
            </div>

        </div>
    </form>

</body>

</html>