<?php
ob_start();
session_start();

if (!isset($_SESSION["addPackage"]["insertSession"])) {
    header("location: admin_package.php");
}

?>
<!DOCTYPE html>
<html>

<head>
    <?php

    include "../includes/libraries.php";
    ?>
    <link rel="stylesheet" href="../CSS/index.css">

    <script src="../JS/validation.js"></script>
    <script src="../JS/insert_package.js"></script>

    <title>Add Package</title>
</head>

<body>


    <div class="container">

        <div class="row justify-content-center">
            <div class="col col-lg-8 m-3 mt-5">
                <div class="pagination ml-auto">
                    <p class="active-page" id="pageOne">1</p>
                    <p id="pageTwo">2</p>
                    <p id="pageThree">3</p>
                    <p id="pageFour">4</p>
                    <p id="pageFive">5</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-0 mb-3 mr-3 ml-3">
            <div class="col-12 col-lg-10 bg-white dropshadow my-border p-3 pl-lg-5 pr-lg-5 pb-lg-5">
                <form id="addPackageForm" action="admin_add_inclusion.php" class="needs-validation" enctype="multipart/form-data" method="POST" novalidate>
                    <div class="row mb-2 mb-lg-5 mt-5">
                        <div class="col">
                            <h4 class="my-heading">
                                <?php
                                if (isset($_SESSION["addPackage"]["package_id"])) {
                                    echo "Update Package Information";
                                } else {
                                    echo "Add New Package";
                                }
                                ?>
                            </h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row m-0 ml-lg-5 mr-lg-5">
                        <div class="col-12 col-lg-3 p-0">
                            <label for="InputPackageName">Package Name <span class="text-danger font-weight-bold">*</span></label>
                        </div>
                        <div class="col-12 col-lg-9 p-0">
                            <div class="form-group">
                                <!-- package name -->
                                <input value="<?php if (isset($_SESSION["addPackage"]["packageName"])) {
                                                    echo $_SESSION["addPackage"]["packageName"];
                                                }
                                                ?>" name="packageName" type="text" class="form-control" id="inputPackageName" minlength="6" maxlength="30" required placeholder="Enter Package Name">
                                <div class="invalid-feedback">
                                    Please enter package name.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- days and night -->
                    <div class="row m-0 ml-lg-5 mr-lg-5 mb-3">
                        <div class="col-12 col-lg-3 p-0">
                            <label for="InputPackageName">Number of Days <span class="text-danger font-weight-bold">*</span></label>
                        </div>
                        <div class="col-12 col-lg-3 pl-3 pr-3 mb-3 mb-lg-0">
                            <div class="row">
                                <button id="decrementDays" type="button" role="button" class="col-4 btn btn-sm rounded-0">-</button>
                                <!-- input -->
                                <input id="daysValue" name="day" type="number" class="p-1 col-4 form-control rounded-0 text-center" value="<?php if (isset($_SESSION["addPackage"]["day"])) {
                                                                                                                                                echo $_SESSION["addPackage"]["day"];
                                                                                                                                            } else {
                                                                                                                                                echo 0;
                                                                                                                                            }
                                                                                                                                            ?>" min="1" max="20" required>
                                <button id="incrementDays" type="button" role="button" class="col-4 btn btn-sm rounded-0">+</button>
                                <div class="invalid-feedback">
                                    Please enter number of days.
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 p-0 pl-lg-2">
                            <label for="InputPackageName">Number of Nights <span class="text-danger font-weight-bold">*</span></label>
                        </div>
                        <div class="col-12 col-lg-3 pl-3 pr-3">
                            <div class="row ">

                                <button id="decNight" type="button" role="button" class="col-4 btn btn-sm rounded-0">-</button>
                                <input id="night" type="number" name="night" class="p-1 col-4 form-control rounded-0 text-center" value="<?php if (isset($_SESSION["addPackage"]["night"])) {
                                                                                                                                                echo $_SESSION["addPackage"]["night"];
                                                                                                                                            } else {
                                                                                                                                                echo 0;
                                                                                                                                            }
                                                                                                                                            ?>" min="1" max="20" required>
                                <button id="incNight" type="button" role="button" class="col-4 btn btn-sm rounded-0">+</button>

                                <div class="invalid-feedback">
                                    Please enter number of nights.
                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- destination -->
                    <div class="row m-0 ml-lg-5 mr-lg-5">
                        <div class="col-12 col-lg-3 p-0">
                            <label for="InputDestination">Destination<span class="text-danger font-weight-bold">*</span></label>
                        </div>
                        <div class="col-12 col-lg-9 p-0">
                            <div class="form-group">
                                <div class="form-group mb-3">
                                    <!-- destination -->

                                    <input name="destination" type="text" class="form-control" id="inputDestination" minlength="4" maxlength="30" value="<?php if (isset($_SESSION["addPackage"]["destination"])) {
                                                                                                                                                                echo $_SESSION["addPackage"]["destination"];
                                                                                                                                                            }
                                                                                                                                                            ?>" required placeholder="Enter Destination">
                                    <div class="invalid-feedback">
                                        Please enter destination.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- upload image -->
                    <div class="row m-0 ml-lg-5 mr-lg-5 mb-3">
                        <div class="col-12 col-lg-3 p-0">
                            <label for="InputPackageName">Package Image <span class="text-danger font-weight-bold">*</span></label>
                        </div>
                        <div class="col-12 col-lg-9 p-0">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input <?php if (!isset($_SESSION["addPackage"]["packageImage"]["name"])) {
                                                echo "required";
                                            } ?> name="packageImage" type="file" class="custom-file-input" id="packageImage" aria-describedby="inputGroupFileAddon01" accept="image/png, image/gif, image/jpeg">
                                    <label id="outSelected" class="custom-file-label" for="packageImage">
                                        <?php
                                        if (isset($_SESSION["addPackage"]["packageImage"]["name"]) && !empty($_SESSION["addPackage"]["packageImage"]["name"])) {
                                            echo $_SESSION["addPackage"]["packageImage"]["name"];
                                        } else {
                                            echo "Choose file";
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">



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
                                    <a id="backToAdmin" type="button" href="#../../../admin.php" class="btn btn-secondary" data-dismiss="modal">Back</a>
                                    <button type="submit" class="btn btn-primary" form="addPackageForm" value="submit" name="submit">Proceed to next</button>
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