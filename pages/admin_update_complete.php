<?php
ob_start();
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
session_start();

if (!isset($_SESSION["addPackage"]["insertSession"])) {
    header("location: admin_package.php");
}
unset($_SESSION["addPackage"]);
?>
<!DOCTYPE html>
<html>

<head>
    <?php

    include "../includes/libraries.php";    ?>

    <link rel="stylesheet" href="../CSS/index.css">
    <script src="../JS/validation.js"></script>

    <title>Add Package</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col col-lg-10 m-3">
                <div class="pagination ml-auto">
                    <p class="active-page" id="pageOne">1</p>
                    <p class="active-page" id="pageTwo">2</p>
                    <p class="active-page" id="pageThree">3</p>
                    <p class="active-page" id="pageFour">4</p>
                    <p class="active-page" id="pageFive">5</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-0 mb-3 mr-3 ml-3">
            <div class="col-12 col-lg-10 bg-white dropshadow my-border p-3 p-lg-5 ">
                <div class="alert alert-success" role="alert">
                    <h3>Success!</h3>
                </div>

                <div class="jumbotron jumbotron-fluid ">
                    <div class="container">

                        <p class="lead">The Package was updated successfully</p>
                        <p class="lead">The Package is now can be browse by the general public.</p>
                        <p class="lead">Click the ok button below to procceed.</p>

                        <div class="row justify-content-center">
                            <div class="col-6 col-lg-3">
                                <a class="btn btn-primary w-100 btn-lg align-center" href="admin_package.php" role="button">OK</a>
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