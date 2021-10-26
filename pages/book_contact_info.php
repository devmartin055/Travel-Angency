<!DOCTYPE html>
<html>

<head>
    <?php
    include "../includes/libraries.php";
    ?>
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/contact.css">


    <script src="../JS/validation.js"></script>
    <title>Contact Info</title>
</head>

<body>
    <!-- navigation bar -->
    <nav class=" navbar sticky-top  navbar-expand-lg navbar-light bg-light shadow">
        <a class="navbar-brand" href="../index.php">
            <div class="logo-container">
                <img class="img-thumbnail logo" src="../images/LOGO/logo.jpg" alt="logo">
            </div>
        </a>

        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
            <ul class="navbar-nav ml-auto flex-nowrap">
                <li class="nav-item">
                    <a href="../index.php" class="nav-link m-2 menu-item ">Home</a>
                </li>
                <li class="nav-item">
                    <a href="nav_about_us.php" class="nav-link m-2 menu-item">About</a>
                </li>
                <li class="nav-item">
                    <a href="nav_blog.php" class="nav-link m-2 menu-item ">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="nav_contact_us.php" class="nav-link m-2 menu-item ">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="nav_book.php" class="nav-link m-2 menu-item nav-active">Book Now</a>
                </li>
                <li class="nav-item">
                    <a href="../php/session_logout.php" class="nav-link m-2 menu-item "><i class="bi bi-box-arrow-right"></i> Log out</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 bg-transparent">
                <li class="breadcrumb-item"><a href="nav_book.php">Book Now</a></li>
                <li class="breadcrumb-item"><a href="book_explore.php">Best of Korea</a></li>
                <li class="breadcrumb-item active">Contact Information</li>
            </ol>
        </nav>
    </div>
    <br>
    <br>
    <!-- progress bar -->
    <div class="container">
        <div class="row">
            <div class="col-4 col-lg-2 text-info">
                <i class="bi bi-circle-fill"></i> Contact Information
            </div>
            <div class="col-4 col-lg-2">
                <i class="bi bi-circle"></i> Secure Payment
            </div>
            <div class="col-4 col-lg-2">
                <i class="bi bi-circle"></i> Confirmation
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="progress">
                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: 33.33%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- form to input contacts -->
    <form action="book_payment.php" class="container needs-validation m-auto bg-light dropshadow p-5 needs-validation rounded" method="POST" novalidate>
        <input value="<?php echo $_POST["package_id"]; ?>" name="package_id" type="text" hidden>
        <input value="<?php echo $_POST["type"]; ?>" name="type_id" type="text" hidden>
        <input value="<?php echo $_POST["number_of_person"]; ?>" name="number_of_person" id="number_of_person" class="form-control " type="number" placeholder="Input" min="1" max=20 required hidden>
        <input value="<?php echo $_POST["date"]; ?>" name="date" type="text" class="form-control date-picker" placeholder="Select Date" hidden>
        <h4>Basic Information</h4>
        <hr>
        <br>

        <!-- contact name -->
        <div class="row justify-content-center mb-3">
            <label class="col-12 col-lg-2 form-label p-0" for="contactName">Contact Name <b class="text-danger">*</b></label>
            <div class="col-12 col-lg-8 p-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-lines-fill"></i></span>
                    </div>
                    <!-- contact name input -->
                    <input class="form-control" type="text" name="contactName" placeholder="Enter contact person" id="contactName" maxlength="32" required>
                    <div class="valid-feedback">
                        Ok!
                    </div>
                    <div class="invalid-feedback">
                        Please enter a contact person.
                    </div>
                </div>
            </div>
        </div>
        <!-- email input -->
        <div class="row justify-content-center mb-3">
            <!-- email address -->
            <label class="col-12 col-lg-2 form-label p-0" for="email">Email Address <b class="text-danger">*</b></label>
            <div class=" col-12 col-lg-3 p-0  mb-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">@</span>
                    </div>
                    <!-- email input -->
                    <input type="email" name="email" class="form-control" id="email" placeholder="example@gmail.com" maxlength="32" name='email' required>

                    <div class="valid-feedback">
                        Ok!
                    </div>
                    <div class="invalid-feedback">
                        Please enter valid email address.
                    </div>
                </div>
            </div>
            <!-- phone number -->
            <label class="col-12 col-lg-2 form-label p-0 text-lg-right" for="telNumber">Phone number <b class="text-danger">*</b></label>
            <div class="col-12 col-lg-3 p-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">+63</span>
                    </div>
                    <input name="contact" type="tel" class="form-control" pattern="[9]{1}[0-9]{2} [0-9]{3} [0-9]{4}" placeholder="i.e. 912 345 6789" id="telNumber" maxlength="12" required>
                    <div class="valid-feedback">
                        Ok!
                    </div>
                    <div class="invalid-feedback">
                        Please enter valid contact number.
                    </div>
                </div>
                <p>Format: 912 345 6789</p>

            </div>
        </div>
        <!-- country origin -->
        <div class="row justify-content-center mb-3">
            <label class="col-12 col-lg-2 form-label p-0" for="countryOrigin">Country Origin <b class="text-danger">*</b></label>
            <div class="col-12 col-lg-8 p-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                    </div>
                    <input class="form-control" type="text" name="countryOrigin" placeholder="Enter country origin" id="countryOrigin" required>
                    <div class="valid-feedback">
                        Ok!
                    </div>
                    <div class="invalid-feedback">
                        Please enter country origin.
                    </div>
                </div>
            </div>
        </div>

        <!-- country origin -->
        <div class="row justify-content-center mb-3">
            <label class="col-12 col-lg-2 form-label p-0" for="instruction">Special Instruction <small>(Optional)</small> </label>

            <div class="col-12 col-lg-8 p-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="bi bi-signpost-2-fill"></i></span>
                    </div>
                    <input class="form-control" type="text" name="instruction" placeholder="Enter instruction" id="instruction" s>
                </div>
            </div>
        </div>
        <!-- country origin -->

        <!-- submit -->
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 p-0">
                <div class="float-right">
                    <a href="#../explore.php" onclick="history.back();" class="btn btn-secondary">Go Back</a>
                    <button type="submit" class="btn btn-info">Save & Proceed to
                        Payment</button>
                </div>

            </div>
        </div>
        <!-- submit -->
    </form>
    <br><br><br>

    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4">

        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <!--  <h5 class="text-uppercase">Footer Content</h5> -->

                    <img class="footer-logo" src="../images/LOGO/logo.jpg" alt="">
                    <!--  <p>Here you can use rows and columns to organize your footer content.</p> -->

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">CONTACT US</h5>
                    <small>Nueva Ecija, Philippines<br>
                        (+637) 9272508227</small>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                    <!-- Links -->
                    <h5 class="text-uppercase">ABOUT US</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Our Mission</a>
                        </li>
                        <li>
                            <a href="#!">About Lakbay Travel & Tour</a>
                        </li>
                        <li>
                            <a href="#!">The Team</a>
                        </li>

                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2021 Lakbay Travel and Tour Pty Ltd
            <!-- <a href="https://mdbootstrap.com/"> MDBootstrap.com</a> -->
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

</body>

</html>