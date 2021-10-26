<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: pages/login.php");
}
if (isset($_SESSION["user_type"])) {
    if ($_SESSION["user_type"] == 0) {
        header("location: pages/admin_package.php");
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <?php
    include "config/connection.php";
    include "includes/libraries.php";
    ?>
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/index.css">
    <script src="js/home.js"></script>
    <title>Home</title>
</head>

<body>
    <!-- navigation -->
    <nav class="navbar fixed-top navbar-expand-lg bg-light-transparent navbar-black">
        <a class="navbar-brand" href="index.php">
            <div class="logo-container">
                <!-- logo img -->
                <img class="img-thumbnail logo" src="images/LOGO/logo.jpg" alt="logo">
            </div>
        </a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
            <ul class="navbar-nav ml-auto flex-nowrap">
                <li class="nav-item">
                    <a href="" class="nav-link m-2 menu-item nav-active">Home</a>
                </li>
                <li class="nav-item">
                    <a href="pages/nav_about_us.php" class="nav-link m-2 menu-item">About</a>
                </li>
                <li class="nav-item">
                    <a href="pages/nav_blog.php" class="nav-link m-2 menu-item">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="pages/nav_contact_us.php" class="nav-link m-2 menu-item">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="pages/nav_book.php" class="nav-link m-2 menu-item ">Book Now</a>
                </li>
                <li class="nav-item">
                    <a href="PHP/session_logout.php" class="nav-link m-2 menu-item"><i class="bi bi-box-arrow-right"></i> Log out</a>
                </li>

            </ul>
        </div>
    </nav>

    <!-- cover photo -->
    <div class="grid-parent cover-header-container mb-5">
        <!-- cover background -->
        <div class="grid-item cover-photo-container">
            <img class="img-fluid" src="images/HOME/t.jpg" alt="">
        </div>
        <!-- example 6 - center on mobile -->
        <div class="grid-item w-100">
            <div class="container-fluid p-0 h-100">
                <div class="row justify-content-end p-0  h-100">
                    <div class="col-12 col-lg-6 d-flex align-items-center p-0 bg-dark-transparent">
                        <div class="header-container p-5">
                            <div>Go! MAKE PLANS</div>
                            <div class="h2">
                                to TRAVEL
                            </div>
                            <div class="h2">
                                the world with us
                            </div>
                            <br>
                            <div class="subscribe">
                                <a href="pages/subscribe.php" class="btn p-3"><span class="h4"> SUBSCRIBE →</span> </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- transactions statistics -->
    <div class="container mb-5">
        <div class="row justify-content-center">
            <!-- client -->
            <div class="col-12 col-lg-3 text-center">
                <div class="card p-5 mb-3">
                    <img src="images\LOGO\iconmonstr-user-29-240.png" class="card-img-top m-auto mr-auto w-25" alt="...">
                    <div class="card-body p-0">
                        <p class="card-text border-bottom pb-2"><span class="h2">2708</span></p>

                        <p class="card-text">CLIENTS</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3 text-center">
                <div class="card p-5 mb-3">
                    <img src="images\LOGO\iconmonstr-paper-plane-2-242.png" class="card-img-top m-auto mr-auto w-25" alt="...">
                    <div class="card-body p-0">
                        <p class="card-text border-bottom pb-2"><span class="h2">725</span></p>

                        <p class="card-text">FLIGHTS</p>
                    </div>
                </div>
            </div>
            <!-- SUCCESSFUL TRIP -->
            <div class="col-12 col-lg-3 text-center">
                <div class="card p-5 mb-3 ">
                    <img src="images\LOGO\iconmonstr-thumb-10-240.png" class="card-img-top m-auto mr-auto w-25" alt="...">
                    <div class="card-body p-0">
                        <p class="card-text border-bottom pb-2"><span class="h2">270</span></p>

                        <p class="card-text">SUCCESSFUL TRIP</p>
                    </div>
                </div>
            </div>
            <!-- schedule -->
            <div class="col col-lg-3 text-center">
                <div class="card mb-3 p-5">
                    <img src="images\LOGO\iconmonstr-calendar-7-240.png" class="card-img-top m-auto mr-auto w-25 " alt="...">
                    <div class="card-body p-0">
                        <p class="card-text border-bottom pb-2"><span class="h2">257</span></p>
                        <p class="card-text">SCHEDULED TRIP</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- brief description about website -->
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12 col-lg-4 p-5 text-lg-left text-center bg-secondary">
                <div class="display-3 font-weight-bold text-dark">
                    WE ARE LAKBAY
                </div>
                <p class="h4 text-light">Travel and Tours</p>
            </div>
            <div class="col-12 col-lg-8 p-5 text-lg-left text-center bg-dark">
                <p class="h2 mb-5 text-light">
                    Making your next travel destination
                    into the best experiences. We'll take
                    care of the rest after you've decided
                    on a place.
                </p>
                <a href="pages/nav_about_us.php" class="btn btn-light btn-lg  c-mustard">READ MORE</a>
            </div>

        </div>
    </div>

    <!-- wonderful destinations -->
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col col-md-8 col-lg-5">
                <div class="h2 text-center font-weight-bold">
                    Wonderful Destinations to
                    explore
                </div>
            </div>

        </div>
        <div class="row justify-content-center mb-5">
            <div class="col">
                <div class="text-center">
                    Come travel the world with us and have the time of your life. We provide tours to every corner of the globe.
                </div>
            </div>
        </div>
        <!-- item content destinations -->

        <div class="row justify-content-center">
            <?php

            $sql = "SELECT * FROM package LIMIT 4";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-12 col-md-3 col-lg-3 mb-3'>
                            <a class='my-hover-remove text-info' href='pages/book_explore.php?package_id={$row['package_id']} '>
                                    <img src='uploads/{$row['package_image']}' class='card-img-top' alt='...'>
                                    <div class='card-body bg-light dropshadow mb-3'>
                    
                                        <div class='row h5 text-center'>

                                            <!-- trip description -->
                                            <div class='col '>
                                                <i class='bi bi-calendar c-mustard h5'></i><br>  {$row['no_of_days']}D {$row['no_of_nights']}N
                                            </div>

                                            <div class='col '>
                                                <i class='bi bi-geo-alt-fill text-danger h5'></i><br> {$row['destination']}
                                            </div>

                                        </div>

                                        <div class='row'>
                                            <div class='col'>
                                                <!-- trip title -->
                                                <div class='h4  font-weight-bold fit-in'>
                                                    {$row['package_name']}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </a>
                        </div>";
                }
            }
            ?>
        </div>

        <!-- read more button -->
        <div class="row">
            <div class="col text-center">
                <a href="pages/nav_book.php" class="btn btn-light btn-lg border c-mustard">READ MORE</a>
            </div>
        </div>
    </div>


    <!-- DISCOVER THE WORLD -->
    <div class="container-fluid bg-yellow p-0">
        <div class="container  pt-5 pb-5">
            <div class="row mb-3">
                <div class="col">
                    <div class="h2 text-center font-weight-bold">
                        DISCOVER THE WORLD
                    </div>
                </div>
            </div>
            <img>
            <div class="row justify-content-center">
                <?php
                $sql = "SELECT `blog_id`, `title`, `author`, `cover`, `date` FROM blog LIMIT 2";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "  <div class='col-12 col-md-5 col-lg-5 mb-3'>
                                    <a class='my-hover-remove text-info' href='pages/blog_content.php?blog_id={$row['blog_id']}'>
                                        <div class='bg-light pt-4 pl-5 pb-4 pr-5 rounded'>
                                            <img src='uploads/{$row['cover']}' class='card-img-top' alt='...'>
                                            <div class='card-body'>
                    
                                                <div class='row justify-content-end'>
                                                    <p>
                                                        {$row['date']}
                                                    </p>
                                                </div>
                                                <div class='row h5 text-center font-italic'>
                                                {$row['title']}
                                                </div>
                                            </div>
                                        </div>
                                      </a>
                                </div>";
                    }
                }
                ?>
            </div>

            <!-- read more button -->
            <div class="row">
                <div class="col text-center">
                    <a href="pages/nav_blog.php" class="btn btn-light btn-lg border c-mustard">READ MORE</a>
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

                    <img class="footer-logo" src="images/LOGO/logo.jpg" alt="">
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