<?php
ob_start();
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: login.php");
}
if (!isset($_GET["blog_id"])) {
    header("location: nav_blog.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <?php
    include "../config/connection.php";

    $sql = "SELECT * FROM blog where blog_id=" . $_GET["blog_id"];

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    include "../includes/libraries.php";
    ?>
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/index.css">

    <title>Blog</title>
</head>

<body>
    <!-- navigation -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-black navbar-light bg-light-transparent">
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
                    <a href="nav_blog.php" class="nav-link m-2 menu-item nav-active">Blog</a>
                </li>
                <li class="nav-item">
                    <a href="nav_contact_us.php" class="nav-link m-2 menu-item">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="nav_book.php" class="nav-link m-2 menu-item">Book Now</a>
                </li>
                <li class="nav-item">
                    <a href="../php/session_logout.php" class="nav-link m-2 menu-item text-light"><i class="bi bi-box-arrow-right"></i> Log out</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- bread crumbs -->
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb m-0 bg-transparent">
            <li class="breadcrumb-item"><a href="../blog.php">Blog</a></li>
            <li class="breadcrumb-item active">The Classic Mexican Margarita</li>
        </ol>
    </nav>

    <!-- content -->
    <div class="container mt-5 mb-5">
        <div class="row mb-3">
            <div class="col-12 col-sm-1  col-lg-1"></div>
            <div class="col col-md-8 col-lg-6">
                <h2><?php echo $row["title"] ?></h2>

                <div class="">
                    <p class="m-0"><?php echo $row["author"] ?></p>
                    <p><?php echo $row["date"] ?></p>
                </div>
            </div>

        </div>
        <div class="row mb-3 ">
            <div class="col-12 col-sm-1 col-lg-1"></div>
            <div class="col col-md-8 col-lg-6 text-center">
                <img class="w-100" src="../uploads/<?php echo $row["cover"] ?>" alt="">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-sm-1 col-lg-1"></div>
            <div class="col col-md-8 col-lg-6">
                <hr>
                <p class="blog-text">
                    <?php
                    $content = str_replace("\n", "<br>", $row["content"]);
                    echo $content
                    ?>

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