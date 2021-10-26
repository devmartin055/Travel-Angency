<!DOCTYPE html>
<html>

<head>
    <?php

    include "../includes/libraries.php";
    ?>
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/contact.css">
    <link rel="stylesheet" href="../CSS/payment.css">


    <script src="../JS/validation.js"></script>
    <script src="../JS/payment.js"></script>

    <title>Payment Option</title>
</head>

<body>
    <!-- include -->
    <nav class="navbar sticky-top  navbar-expand-lg navbar-black bg-light">
        <a class="navbar-brand" href="#">
            <div class="logo-container">
                <!-- logo img -->
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
                <li class="breadcrumb-item"><a href="book_contact_info.php">Contact Information</a></li>
                <li class="breadcrumb-item active">Payment</li>
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
            <div class="col-4 col-lg-2 text-info">
                <i class="bi bi-circle-fill"></i> Secure Payment
            </div>
            <div class="col-4 col-lg-2">
                <i class="bi bi-circle"></i> Confirmation
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="progress">
                    <div class="progress-bar bg-info  progress-bar-striped progress-bar-animated" role="progressbar" style="width: 66.67%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <br>


    <!-- container -->
    <div class="container bg-light dropshadow rounded p-5">
        <div class="row">
            <div class="col">
                <h4>Choose Payment Option</h4>
                <hr>
            </div>
        </div>

        <form id="paymentForm" class="needs-validation" action="book_insert.php" method="POST" novalidate>
            <input value="<?php echo $_POST["package_id"]; ?>" name="package_id" type="text" hidden required>
            <input value="<?php echo $_POST["type_id"]; ?>" name="type_id" type="text" hidden required>
            <input value="<?php echo $_POST["contactName"]; ?>" name="contact_person" class="form-control" type="text" placeholder="Enter contact person" id="contactName" maxlength="32" required hidden>
            <input value="<?php echo $_POST["email"]; ?>" name='email' type="email" class="form-control" id="email" placeholder="example@gmail.com" maxlength="32" required hidden>
            <input value="<?php echo $_POST["contact"]; ?>" name='contact_number' type="tel" class="form-control" pattern="[9]{1}[0-9]{2} [0-9]{3} [0-9]{4}" placeholder="e.g. 912 345 6789" id="telNumber" maxlength="12" required hidden>
            <input value="<?php echo $_POST["countryOrigin"]; ?>" name="country_origin" class="form-control" type="text" placeholder="Enter country origin" id="countryOrigin" required hidden>
            <input value="<?php echo $_POST["instruction"]; ?>" name="instruction" class="form-control" type="text" placeholder="Enter instruction" id="instruction" hidden>
            <input value="<?php echo $_POST["number_of_person"]; ?>" name="number_of_person" id="number_of_person" class="form-control " type="number" placeholder="Input" min="1" max=20 required hidden>
            <input value="<?php echo $_POST["date"]; ?>" name="date" type="text" class="form-control date-picker" placeholder="Select Date" hidden>
            <!-- pay with credit card -->
            <div class="row">
                <div class="col">
                    <!-- credit card -->
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="paymentOption" name="paymentOption" value="Credit Card" required>
                        <label class="custom-control-label h5" for="paymentOption">Credit Card</label>

                    </div>

                    <!-- collasible element -->
                    <div class="collapse" id="cardInformation">
                        <div class="card card-body">
                            <div class="row p-0">
                                <div class="col-1">

                                </div>
                                <div class="col-10 p-0">
                                    <!-- input card info -->
                                    <div class="row p-0 mb-3">

                                        <div class="col-12 col-lg-2 text-lg-right">
                                            <!-- label -->
                                            <label for="cardNumber" class="h6">Card Number <b class="text-danger">*</b></label>
                                        </div>

                                        <div class="col-12 col-lg-4">
                                            <!-- inpu-field -->
                                            <input class="form-control" type="number" placeholder="Enter card number">
                                            <div class="invalid-feedback">Please enter card number.</div>
                                        </div>
                                    </div>

                                    <!-- expiry date -->
                                    <div class="row p-0 mb-3">

                                        <div class="col-12 col-lg-2 text-lg-right">
                                            <!-- label -->
                                            <label for="cardNumber" class="h6">Expiry Date <b class="text-danger">*</b></label>
                                        </div>

                                        <div class="col-12 col-lg-4">
                                            <div id="sandbox-container">
                                                <div class="input-group date">
                                                    <!-- input field -->
                                                    <input type="text" class="form-control">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2"><i class="bi bi-calendar-event"></i></span>
                                                    </div>

                                                    <div class="invalid-feedback">Please select card date expiration.</div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- pin code -->
                                        <div class="col-12 col-lg-2 text-lg-right">
                                            <!-- label -->
                                            <label for="cardNumber" class="h6">Card Security Code <b class="text-danger">*</b></label>
                                        </div>

                                        <div class="col-12 col-lg-4">
                                            <!-- input field -->
                                            <input class="form-control" type="password" placeholder="Card pin code">
                                            <small>We will not share it to anyone</small>
                                            <div class="invalid-feedback">Please enter card security code.</div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="Paypal" name="paymentOption" value="Paypal" required>
                        <label class="custom-control-label h5" for="Paypal">Paypal</label>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="gpay" name="paymentOption" value="G Pay" required>
                        <label class="custom-control-label h5" for="gpay">G Pay</label>
                        <div class="invalid-feedback">Please select your payment option.</div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col justiy-content-center text-right ">
                    <a class="btn btn-secondary" href="#contact_info.php" onclick="history.back();">Go Back</a>
                    <input name="submit" value="Complete Booking" class="btn btn-info" type="submit">
                </div>
            </div>
        </form>

    </div>

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