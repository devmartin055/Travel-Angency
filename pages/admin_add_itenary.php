<?php
ob_start();
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
session_start();

if (!isset($_SESSION["addPackage"]["insertSession"])) {
    header("location: admin_package.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php

    include "../includes/libraries.php";    ?>

    <link rel="stylesheet" href="../CSS/index.css">
    <script src="../JS/validation.js"></script>
    <!-- holds the input keys listener to constantly change the session values every key events -->
    <script src="../JS/temp_session.js"></script>
    <!-- <script src="js/insert_package.js"></script> -->
    <title>Add Package</title>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-lg-10 m-3 mt-5">
                <div class="pagination ml-auto">
                    <p class="active-page" id="pageOne">1</p>
                    <p class="active-page" id="pageTwo">2</p>
                    <p class="active-page" id="pageThree">3</p>
                    <p id="pageFour">4</p>
                    <p id="pageFive">5</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-0 mb-3 mr-3 ml-3">
            <div class="col-12 col-lg-10 bg-white dropshadow my-border p-3 pl-lg-5 pr-lg-5 pb-lg-5">
                <form id="itenary" action="admin_add_accomodation.php" class="needs-validation" enctype="multipart/form-data" method="POST" novalidate>
                    <div class="row mb-2 mb-lg-5 mt-5">
                        <div class="col">
                            <h4 class="my-heading">
                                <?php
                                if (isset($_SESSION["addPackage"]["package_id"])) {
                                    echo "Update Itenary Details";
                                } else {
                                    echo "Add Itenary Details";
                                }
                                ?>
                            </h4>
                            <hr>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION["addPackage"]["day"])) {
                        for ($i = 0; $i < $_SESSION["addPackage"]["day"]; $i++) {
                            echo "
                                    <div class='row mb-3 bg-skyblue rounded p-lg-3'>
                                        <div class='container-fluid'>
                                            <div class='row mb-3'>
                                                <div class='col'>
                                                    <span class='h3'>Day " . ($i + 1) . " </span>
                                                </div>
                                            </div>
                                            <div class='row justify-content-center mb-3'>
                                                <div class='col-12 col-lg-3 text-lg-right'>
                                                    <label for='destination" . ($i + 1) . "'>Destination <span class='text-danger'>*</span></label>
                                                </div>
                                                <div class='col-12 col-lg-8'>
                                                    <input value='";
                                                if (isset($_SESSION["addPackage"]["itenary"]["destination"][$i])) {
                                                    echo $_SESSION["addPackage"]["itenary"]["destination"][$i];
                                                }
                                                echo "' name='destination[{$i}]' id='destination" . ($i + 1) . "' type='text' class='form-control key-listener'>
                                                </div>
                                            </div>
                                            <div class='row justify-content-center mb-3 '>
                                                <div class='col-12 col-lg-3  text-lg-right'>
                                                    <label for='description" . ($i + 1) . "'>Description <span class='text-danger'>*</span></label>
                                                </div>
                                                <div class='col-12 col-lg-8'>
                                                    <textarea name='description[{$i}]' class='form-control key-listener' id='description1' cols='30' rows='5'>";
                                                if (isset($_SESSION["addPackage"]["itenary"]["description"][$i])) {
                                                    echo $_SESSION["addPackage"]["itenary"]["description"][$i];
                                                }
                                                echo "</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                        }

                        if (isset($_SESSION["addPackage"]["itenary"]["destination"]) && count($_SESSION["addPackage"]["itenary"]["destination"]) > $_SESSION["addPackage"]["day"]) {
                            $size = count($_SESSION["addPackage"]["itenary"]["destination"]);

                            for ($i = $_SESSION["addPackage"]["day"]; $i < $size; $i++) {
                                unset($_SESSION["addPackage"]["itenary"]["destination"]);
                                unset($_SESSION["addPackage"]["itenary"]["description"]);
                            }
                        }
                    }
                    ?>



                    <!-- navigation buttons -->
                    <div class="row">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <!-- reset -->
                                    <button id="resetAddForm" type="button" class="btn bg-transparent"> Reset Form </button>
                                </div>
                                <div class="col p-0 text-right">
                                    <!-- save -->
                                    <a type="button" href="admin_add_inclusion.php" class="btn btn-secondary" data-dismiss="modal">Back</a>
                                    <button type="submit" class="btn btn-primary" value="submit" name="submit">Proceed to next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>