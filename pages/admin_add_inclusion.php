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
    <script src="../JS/temp_session.js"></script>
    <!-- <script src="js/insert_package.js"></script> -->
    <title>Add Package</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-lg-8 m-3 mt-5">
                <div class="pagination ml-auto">
                    <p class="active-page" id="pageOne">1</p>
                    <p class="active-page" id="pageTwo">2</p>
                    <p id="pageThree">3</p>
                    <p id="pageFour">4</p>
                    <p id="pageFive">5</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-0 mb-3 mr-3 ml-3">
            <div class="col-12 col-lg-10 bg-white dropshadow my-border p-3 pl-lg-5 pr-lg-5 pb-lg-5">
                <form id="inclusion" action="admin_add_itenary.php" class="needs-validation" enctype="multipart/form-data" method="POST" novalidate>
                    <div class="row mb-2 mb-lg-5 mt-5">
                        <div class="col">
                            <h4 class="my-heading"><?php
                                                    if (isset($_SESSION["addPackage"]["package_id"])) {
                                                        echo "Update Inclusion Details";
                                                    } else {
                                                        echo "Add Inclusion Details";
                                                    }
                                                    ?></h4>
                            <hr>
                        </div>
                    </div>

                    <!-- flight -->
                    <div class="row m-0 ml-lg-5 mr-lg-5">
                        <div class="col-12 col-lg-2 p-0">
                            <!-- Flight -->
                            <label for="flight">Flight <span class="text-danger font-weight-bold">*</span></label>
                        </div>
                        <div class="col-12 col-lg-10 p-0">
                            <div class="form-group mb-3">
                                <textarea class="w-100 form-control" name="flight" id="flight" cols="30" rows="3" placeholder="Enter flight and flight details" required><?php
                                                                                                                                                                            if (isset($_SESSION["addPackage"]["inclusion"]["flight"])) {
                                                                                                                                                                                echo $_SESSION["addPackage"]["inclusion"]["flight"];
                                                                                                                                                                            } ?></textarea>
                                <div class="invalid-feedback">
                                    Please enter flight details.
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Meals -->
                    <div class="row m-0 ml-lg-5 mr-lg-5">
                        <div class="col-12 col-lg-2 p-0">
                            <!-- Meals -->
                            <label for="inputMeals">Meals <span class="text-danger font-weight-bold">*</span></label>
                        </div>
                        <div class="col-12 col-lg-10 p-0">


                            <div class="form-group">
                                <textarea class="w-100 form-control" name="meals" id="inputMeals" cols="30" rows="3" placeholder="Enter included meals" required><?php

                                                                                                                                                                    if (isset($_SESSION["addPackage"]["inclusion"]["meals"])) {
                                                                                                                                                                        echo $_SESSION["addPackage"]["inclusion"]["meals"];
                                                                                                                                                                    }
                                                                                                                                                                    ?></textarea>
                                <div class="invalid-feedback">
                                    Please enter meals
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Tours -->
                    <div class="row m-0 ml-lg-5 mr-lg-5">
                        <div class="col-12 col-lg-2 p-0">
                            <!-- Tours -->
                            <label for="inputTours">Tours <span class="text-danger font-weight-bold">*</span></label>
                        </div>
                        <div class="col-12 col-lg-10 p-0">
                            <div class="form-group">

                                <textarea class="w-100 form-control" name="tours" id="inputTours" cols="30" rows="3" placeholder="Enter Tour Details" required><?php

                                                                                                                                                                if (isset($_SESSION["addPackage"]["inclusion"]["tours"])) {
                                                                                                                                                                    echo $_SESSION["addPackage"]["inclusion"]["tours"];
                                                                                                                                                                }
                                                                                                                                                                ?></textarea>
                                <div class="invalid-feedback">
                                    Please enter destination tours
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Guide -->
                    <div class="row m-0 ml-lg-5 mr-lg-5">
                        <div class="col-12 col-lg-2 p-0">
                            <!-- Guide -->
                            <label for="inputGuide">Guide <span class="text-danger font-weight-bold">*</span></label>
                        </div>
                        <div class="col-12 col-lg-10 p-0">
                            <div class="form-group">

                                <input name="guide" type="text" class="form-control" id="inputGuide" required placeholder="Enter Guide Details" value="<?php

                                                                                                                                                        if (isset($_SESSION["addPackage"]["inclusion"]["guide"])) {
                                                                                                                                                            echo $_SESSION["addPackage"]["inclusion"]["guide"];
                                                                                                                                                        }
                                                                                                                                                        ?>">
                                <div class="invalid-feedback">
                                    Please enter tour guide.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Insurance -->
                    <div class="row m-0 ml-lg-5 mr-lg-5">
                        <div class="col-12 col-lg-2 p-0">
                            <!-- Insurance -->
                            <label for="inputInsurance">Insurance <span class="text-danger font-weight-bold">*</span></label>
                        </div>
                        <div class="col-12 col-lg-10 p-0">
                            <div class="form-group">
                                <input name="insurance" type="text" class="form-control" id="inputInsurance" required placeholder="Enter Insurance Details" value="<?php

                                                                                                                                                                    if (isset($_SESSION["addPackage"]["inclusion"]["insurance"])) {
                                                                                                                                                                        echo $_SESSION["addPackage"]["inclusion"]["insurance"];
                                                                                                                                                                    }
                                                                                                                                                                    ?>">
                                <div class="invalid-feedback">
                                    Please Enter Insurance details.
                                </div>
                            </div>
                        </div>
                    </div>


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
                                    <a type="button" href="admin_package_insert.php" class="btn btn-secondary" data-dismiss="modal">Back</a>
                                    <button type="submit" class="btn btn-primary" form="inclusion" value="submit" name="submit">Proceed to next</button>
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