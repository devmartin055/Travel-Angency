<?php
ob_start();
?>
<!DOCTYPE html>
<html>

<head>

    <?php
    include "../includes/libraries.php"
    ?>
    <link rel="stylesheet" href="../CSS/index.css">
    <!-- <script src="js/insert_package.js"></script> -->
    <title>Blog Published</title>
</head>

<body>
    <div class="container mt-5">
        
        <div class="row justify-content-center mt-0 mb-3 mr-3 ml-3">
            <div class="col-12 col-lg-10 bg-white dropshadow my-border p-3 p-lg-5 ">
                <div class="alert alert-success" role="alert">
                    <h3>Success!</h3>
                </div>

                <div class="jumbotron jumbotron-fluid m-0">
                    <div class="container">

                        <p class="lead">The blog was successfully republished!</p>
                        <p class="lead">General public can now see it.</p>
                        <p class="lead">Click the ok button below to procceed.</p>

                        <div class="row justify-content-center">
                            <div class="col-6 col-lg-3">
                                <a class="btn btn-primary w-100 btn-lg align-center" href="../pages/admin_blog.php" role="button">OK</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</body>

</html>