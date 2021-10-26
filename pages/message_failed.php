<?php
ob_start();
if (!isset($_SESSION["user_id"])) {
    header("location: login.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <?php
    include "../includes/libraries.php";
    ?>
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/index.css">


    <title>Contact Us</title>
</head>

<body>
    <!-- include -->
    <nav class="navbar sticky-top  navbar-expand-lg navbar-black bg-light">
        <a class="navbar-brand" href="#">
            <div class="logo-container">
                <!-- logo img -->
                <img class="img-thumbnail logo" src="../../images/LOGO/logo.jpg" alt="logo">
            </div>
        </a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
            <ul class="navbar-nav ml-auto flex-nowrap">
                <li class="nav-item">
                    <a href="../../index.php" class="nav-link m-2 menu-item">Home</a>
                </li>
                <li class="nav-item">
                    <a href="../about_us/about_us.php" class="nav-link m-2 menu-item">About</a>
                </li>
                <li class="nav-item">
                    <a href="../blog/blog.php" class="nav-link m-2 menu-item">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="../contact_us/contact_us.php" class="nav-link m-2 menu-item nav-active">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="../../Book/book.php" class="nav-link m-2 menu-item ">Book Now</a>
                </li>
                <li class="nav-item">
                    <a href="../../login/session_logout.php" class="nav-link m-2 menu-item text-light"><i class="bi bi-box-arrow-right"></i> Log out</a>
                </li>

            </ul>
        </div>
    </nav>

    <br>

    <!-- container -->
    <div class="container bg-light dropshadow rounded p-5">
        <div class="alert alert-danger" role="alert">
            <h3>FAILED TO SEND THE MESSAGE</h3>
        </div>

        <div class="jumbotron jumbotron-fluid ">
            <div class="container">

                <p class="lead">Encountered an error while trying to send the message</p>

                <p class="lead">
                    <a class="btn btn-primary btn-lg align-center w-25" href="../../index.php" role="button">Home</a>
                </p>
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

                    <img class="footer-logo" src="../../images/LOGO/logo.jpg" alt="">
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