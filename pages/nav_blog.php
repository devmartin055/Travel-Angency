<?php
ob_start();
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: ../login.php");
}
?><!DOCTYPE html>
<html>

<head>
    <?php
    include "../config/connection.php";
    include "../includes/libraries.php";
    ?>
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/index.css">
    <script src="../JS/validation.js"></script>
    <script src="../JS/script.js"></script>
    <title>Travel Blog</title>
</head>

<body>


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
        <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
            <ul class="navbar-nav ml-auto flex-nowrap ">
                <li class="nav-item ">
                    <!-- home  -->
                    <a href="../index.php" class="nav-link m-2 menu-item text-light">Home</a>
                </li>
                <li class="nav-item">
                    <!-- about -->
                    <a href="nav_about_us.php" class="nav-link m-2 menu-item text-light">About</a>
                </li>
                <li class="nav-item  active">
                    <!-- blog -->
                    <a href="nav_blog" class="nav-link m-2 menu-item text-light nav-active">Blog</a>
                </li>
                <li class="nav-item">
                    <!-- contact -->
                    <a href="nav_contact_us.php" class="nav-link m-2 menu-item text-light  ">Contact</a>
                </li>
                <li class="nav-item">
                    <!-- book now -->
                    <a href="nav_book.php" class="nav-link m-2 menu-item text-light">Book Now</a>
                </li>
                <li class="nav-item">
                    <!-- username -->
                    <a href="../php/session_logout.php" class="nav-link m-2 menu-item text-light"><i class="bi bi-box-arrow-right"></i> Log out</a>
                </li>

            </ul>
        </div>
    </nav>
    <!-- cover photo-->
    <div class="fluid-container mb-5">
        <!-- cover -->
        <div class="row">
            <div class="col p-0">
                <img class="w-100" src="../images/BLOG/Image 1.png" alt="">
                <!-- about header -->
                <div class="center text-center w-75">
                    <p class="display-2 font-weight-bold p-5 bg-dark-transparent cover-heading bw-10 bs-solid bc-dark"> TRAVEL BLOG </p>
                </div>
            </div>
        </div>
    </div>

    <!-- items content -->
    <div class="container mx-auto mb-5">
        <!-- heading -->
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-10 col-lg-10 text-center h2">
                Explore our Travel articles for Inspiration
                for your Next Getaway.
            </div>
        </div>
        <div class="row justify-content-center">
            <?php
            $sql = "SELECT * FROM blog";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-12 col-md-4 col-lg-3 mb-3'>
                                <div class='bg-light rounded dropshadow'>
                                    <a href='blog_content.php?blog_id={$row['blog_id']}' class='blog-item'>
                                        <img src='../uploads/{$row['cover']}' class='card-img-top' alt='...'>
                                        <div class='card-body'>
                                            <div class='row justify-content-end'>
                                                <p class='text-secondary'>
                                                {$row['date']}
                                                </p>
                                            </div>
                                            <div class='row h6 text-center font-italic'>
                                            {$row['title']}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>";
                }
            }
            ?>
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