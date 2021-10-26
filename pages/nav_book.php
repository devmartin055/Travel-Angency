<?php
ob_start();
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: ../pages/login/login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php

    include "../config/connection.php";
    include "../includes/libraries.php";

    ?>

    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <title>Book Tours</title>
</head>

<body>
    <nav class="navbar sticky-top  navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
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

    <div class="grid-parent cover-header-container">
        <!-- cover background -->
        <div class="grid-item cover-photo-container">
            <img class="img-fluid" src="../images/book/Image 1.png" alt="">
        </div>
        <!-- example 6 - center on mobile -->
        <div class="grid-item">
            <div class="background-container">
                <div class="row">

                </div>
                <div class="page-heading-container">
                    <h1>Book Tours, <br> Activities & Things</h1>
                    <h2 class="sub-heading">
                        Best Price Guarantee - 100% Refund Policy - Book With Confidence
                    </h2>

                </div>
            </div>
        </div>
    </div>

    <!-- body -->
    <br>
    <div class="container">
        <div class="top-destination-header-container">
            Top Destinations
        </div>
        <hr>
    </div>
    <br>

    <div class="container top-destination-container">

        <div class="row">

            <?php

            $sql = "SELECT `package_id`, `package_name`,
            `package_image` FROM package";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col col-sm-6 col-md-6 col-lg-4'>
                             <div class='card dropshadow'>
                                <img class='card-img-top' src='../uploads/{$row['package_image']}' alt='Card image cap'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$row['package_name']}</h5>
                                    <a href='book_explore.php?package_id={$row['package_id']}' class='btn btn-primary'>Explore</a>
                                </div>
                            </div>
                        </div>";
                }
            }
            ?>
            <!--  <div class="col col-sm-6 col-md-6 col-lg">
                <div class="card dropshadow">
                    <img class="card-img-top" src="images/korea.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Best of Korea</h5>
                        <a href="pages/explore.php?tab=inclusion.php" class="btn btn-primary">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg">
                <div class="card dropshadow">
                    <img class="card-img-top" src="images/korea.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Best of Korea</h5>

                        <a href="#" class="btn btn-primary">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg m-auto">
                <div class="card dropshadow">
                    <img class="card-img-top" src="images/korea.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Best of Korea</h5>

                        <a href="#" class="btn btn-primary">Explore</a>
                    </div>
                </div>
            </div> -->
        </div>


    </div>
    <br>
    <br>
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
<?php 
ob_end_flush();
?>