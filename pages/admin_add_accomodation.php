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

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col col-lg-10 m-3">
                <div class="pagination ml-auto">
                    <p class="active-page" id="pageOne">1</p>
                    <p class="active-page" id="pageTwo">2</p>
                    <p class="active-page" id="pageThree">3</p>
                    <p class="active-page" id="pageFour">4</p>
                    <p id="pageFive">5</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-0 mb-3 mr-3 ml-3">
            <div class="col-12 col-lg-10 bg-white dropshadow my-border p-3 p-lg-5 ">
                <form id="accomodation" action="../PHP/perform_insert.php" class="needs-validation" enctype="multipart/form-data" method="POST" novalidate>
                    <div class="row">
                        <div class="col">
                            <h4 class="my-heading"> <h4 class="my-heading">
                                <?php
                                if (isset($_SESSION["addPackage"]["package_id"])) {
                                    echo "Update Accomodation Details";
                                } else {
                                    echo "Add Accomodation Details";
                                }
                                ?></h4>
                            <hr>
                        </div>
                    </div>
                    <!--hotel name -->
                    <div class='row m-0 ml-lg-5 mr-lg-5'>
                        <div class='col-12 col-lg-3 p-0'>
                            <!-- hotel name input -->
                            <label for="accomodationHotelName">Hotel Name <span class="text-danger font-weight-bold">*</span></label>
                        </div>
                        <div class='col-12 col-lg-9 p-0'>
                            <div class="form-group">

                                <input type="text" class="form-control key-listener" name="hotelName" id="accomodationHotelName" value='<?php
                                                                                                                                        if (isset($_SESSION["addPackage"]["accomodation"]["hotelName"])) {
                                                                                                                                            echo $_SESSION["addPackage"]["accomodation"]["hotelName"];
                                                                                                                                        }
                                                                                                                                        ?>' required placeholder="Enter Hotel Name">
                                <div class="invalid-feedback">
                                    Please enter meals
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--hotel address -->
                    <div class='row m-0 ml-lg-5 mr-lg-5'>
                        <div class='col-12 col-lg-3 p-0'>
                            <label for="inputHotelAddress">Address <span class="text-danger font-weight-bold">*</span></label>
                        </div>
                        <div class='col-12 col-lg-9 p-0'>
                            <div class="form-group">
                                <!-- Meals -->

                                <input type="text" class="form-control key-listener" name="hotelAddress" id="inputHotelAddress" value='<?php
                                                                                                                                        if (isset($_SESSION["addPackage"]["accomodation"]["hotelAddress"])) {
                                                                                                                                            echo $_SESSION["addPackage"]["accomodation"]["hotelAddress"];
                                                                                                                                        }
                                                                                                                                        ?>' required placeholder="e.g. Sun Trust Building, Barangay Asmara, Cuyapo, Nueva Ecija">
                                                                                                                                        <small>Building, Block, Street, City</small>
                                <div class="invalid-feedback">
                                    Please enter hotel address.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--hotel contact  -->
                    <div class='row m-0 ml-lg-5 mr-lg-5'>
                        <div class='col-12 col-lg-3 p-0'>
                            <!-- contact input-->
                            <label for="inputHotelContact">Contact <span class="text-danger font-weight-bold">*</span><br><small>Please follow the format.</small></label>
                            
                        </div>
                        <div class='col-12 col-lg-9 p-0'>
                            <div class="form-group">

                                <input type="tel" class="form-control key-listener" name="hotelContact" id="inputHotelContact" value='<?php
                                                                                                                                        if (isset($_SESSION["addPackage"]["accomodation"]["hotelContact"])) {
                                                                                                                                            echo $_SESSION["addPackage"]["accomodation"]["hotelContact"];
                                                                                                                                        }
                                                                                                                                        ?>' pattern="[9]{1}[0-9]{2} [0-9]{3} [0-9]{4}" placeholder="e.g. 9xx xxx xxxx" maxlength="12" required>
                                                                                                                                        <small>Format: 9xx xxx xxxx</small>

                                <div class="invalid-feedback">
                                    Please enter hotel contact.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- hotel description -->
                    <div class='row m-0 ml-lg-5 mr-lg-5'>
                        <div class='col-12 col-lg-3 p-0'>
                            <!-- hotel description text area -->
                            <label for="inputHotelDescription">Hotel Description <span class="text-danger font-weight-bold">*</span></label>
                        </div>
                        <div class='col-12 col-lg-9 p-0'>
                            <div class="form-group">

                                <textarea class="w-100 form-control key-listener" name="hotelDescription" id="inputHotelDescription" cols="30" rows="6" placeholder="Enter hotel description" maxlength="800" required><?php
                                                                                                                                                                                                        if (isset($_SESSION["addPackage"]["accomodation"]["hotelDescription"])) {
                                                                                                                                                                                                            echo $_SESSION["addPackage"]["accomodation"]["hotelDescription"];
                                                                                                                                                                                                        } ?></textarea>
                                <div class="invalid-feedback">
                                    Please enter flight details.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- upload hotel image -->
                    <div class='row m-0 ml-lg-5 mr-lg-5'>
                        <div class='col-12 col-lg-3 p-0'>
                            <label for="InputPackageName">Upload Hotel Picture <span class="text-danger font-weight-bold">*</span></label>
                        </div>
                        <div class='col-12 col-lg-9 p-0'>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input <?php if (!isset($_SESSION["addPackage"]["accomodation"]["hotelImage"]["name"])) {
                                                    echo "required";
                                                } ?> name="hotelImage" type="file" class="custom-file-input image-input" id="hotelImage" accept="image/png, image/gif, image/jpeg">
                                        <label id="outSelected" class="custom-file-label image-output" for="hotelImage">
                                            <?php
                                            if (isset($_SESSION["addPackage"]["accomodation"]["hotelImage"]["name"]) && !empty($_SESSION["addPackage"]["accomodation"]["hotelImage"]["name"])) {
                                                echo $_SESSION["addPackage"]["accomodation"]["hotelImage"]["name"];
                                            } else {
                                                echo "Choose file";
                                            }
                                            ?>
                                        </label>
                                    </div>
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
                                    <a type="button" href="admin_add_itenary.php" class="btn btn-secondary" data-dismiss="modal">Back</a>
                                    <button type="submit" class="btn btn-primary" value="submit" name="submit">Save Package</button>
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