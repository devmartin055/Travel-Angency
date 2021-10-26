<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>

<head><?php
        include "../includes/libraries.php";
        ?>
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/index.css">
    <script src="../JS/validation.js"></script>
    <script src="../JS/script.js"></script>
    <title>Contact Info</title>
</head>

<body>

    <!-- cover photo with navigation bar-->
    <!-- navigation bar -->
    <nav class="navbar fixed-top bg-dark-transparent navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <div class="logo-container">
                <!-- logo img -->
                <img class="img-thumbnail logo" src="../images/LOGO/logo.jpg" alt="logo">
            </div>
        </a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-1 text-right text-white" id="myNavbar">
            <ul class="navbar-nav ml-auto flex-nowrap text-secondary">
                <li class="nav-item">
                    <a href="../index.php" class="nav-link m-2 menu-item text-light">Home</a>
                </li>
                <li class="nav-item">
                    <a href="nav_about_us.php" class="nav-link m-2 menu-item text-light">About</a>
                </li>
                <li class="nav-item">
                    <a href="nav_blog.php" class="nav-link m-2 menu-item text-light">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link m-2 menu-item  nav-active text-light">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="nav_book.php" class="nav-link m-2 menu-item text-light">Book Now</a>
                </li>
                <li class="nav-item">
                    <a href="../php/session_logout.php" class="nav-link m-2 menu-item text-light"><i class="bi bi-box-arrow-right"></i> Log out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="fluid-container mb-5">
        <!-- cover -->
        <div class="row">
            <div class="col p-0">
                <img class="w-100" src="../images/CONTACT US/contactpic.jpg" alt="">
                <!-- about header -->
                <div class="center text-center w-75">
                    <p class="display-2 font-weight-bold p-5 bg-dark-transparent cover-heading bw-10 bs-solid bc-dark"> CONTACT US </p>
                </div>
            </div>
        </div>
    </div>

    <!-- We at Lakbay Travel & Tours are
excited to hear & see a message from  -->

    <div class="container-fluid mb-5 ">
        <div class="container">
            <div class="row mb-3">
                <div class="col col-md-8 col-lg-8">
                    <h1 class="font-weight-bold">We at Lakbay Travel & Tours are
                        excited to hear & see a message from </h1>
                </div>
            </div>
            <br>
            <div class="row mb-3">
                <div class="col col-md-10 col-lg-10">
                    <p class="h5 text-secondary">
                        The Lakbay Travel and Tour team will gladly assist you with any inquiries or bookings.
                        Simply call our office, send us an email, or fill out the form below to get in touch with us.
                    </p>
                </div>
            </div>
            <br>
            <div class="row mb-4">
                <div class="col col-md-10 col-lg-10">
                    <div class="d-flex align-items-center justify-content-start">
                        <!-- our mission -->
                        <img src="../images\LOGO/iconmonstr-phone-6-240.png" class=" weather" alt="">
                        <p class="h5 ml-3"> CALL (+637 ) 9272508227 </p>

                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col col-md-10 col-lg-10">
                    <div class="d-flex align-items-center justify-content-lg-start">
                        <!-- our mission -->
                        <img src="../images\LOGO/iconmonstr-location-26-240.png" class=" weather" alt="">
                        <p class="h5 ml-3"> Nueva Ecija, Philippines </p>

                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col col-md-10 col-lg-10">
                    <div class="d-flex align-items-center justify-content-lg-start">
                        <!-- our mission -->
                        <img src="../images\LOGO/iconmonstr-paper-plane-2-240.png" class=" weather" alt="">
                        <p class="h5 ml-3"> lakbaytour@mail.com </p>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <br>

    <!-- get in touch -->
    <div class="bg-gray mb-5">
        <div class="container pt-5 pb-5 w-75">
            <div class="row mb-3">
                <div class="col col-md-8 col-lg-8">
                    <p class="h3">Get In Touch Using The Form </p>
                </div>

            </div>
            <hr>
            <div class="row mb-3 mt-5 p-0  dropshadow">
                <div class="col-12 col-md-5 col-lg-6 p-0">
                    <div class=" w-100  contact-pick-container bg-dark h-100">
                        <img class="w-100 contact-pic" src="../images/CONTACT US/messagepic.PNG" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-6 p-0 bg-light">
                    <form action="../PHP/sendMessage.php" class="needs-validation" novalidate method="POST">
                        <div class="container">
                            <div class="row mt-3">
                                <div class="col">
                                    <p class="h3 font-weight-bold text-center">Send Us A Message</p>
                                    <hr>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <!-- first name -->
                                <div class="col-12">
                                    <label for="fullName">Full Name</label>
                                    <!-- input field -->
                                    <input name="fullName" id="fullName" class="form-control" type="text" placeholder="Enter Full Name" required>
                                    <div class="valid-feedback">
                                        <i class="bi bi-check2"></i> Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter full name.
                                    </div>
                                </div>

                            </div>
                            <!-- phone number -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="telNo">Phone Number (format: 0912 345 6789)</label>
                                    <!-- input field -->
                                    <input name="telNo" id="telNo" class="form-control" type="text" placeholder="Phone Number" required>
                                    <div class="valid-feedback">
                                        <i class="bi bi-check2"></i> Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter Phone Number.
                                    </div>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="email_address">Email</label>
                                    <!-- input field -->
                                    <input name="email_address" id="email_address" class="form-control" type="email" placeholder="Enter email address" required>
                                    <small> This email will receive our response </small>
                                    <div class="valid-feedback">
                                        <i class="bi bi-check2"></i> Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address.
                                    </div>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="subject">Subject</label>
                                    <!-- input field -->
                                    <input name="subject" id="subject" class="form-control" type="text" placeholder="Enter subject" required>

                                    <div class="valid-feedback">
                                        <i class="bi bi-check2"></i> Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter subject.
                                    </div>
                                </div>

                            </div>
                            <!-- Type your Message here -->
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="message">Message</label>
                                    <!-- input field -->
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="4" placeholder="Type your Message here..." required></textarea>

                                    <div class="valid-feedback">
                                        <i class="bi bi-check2"></i> Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter your concern here.
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12 text-right">
                                    <input type="submit" name='submit' class="btn btn-primary" value="Send Message">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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