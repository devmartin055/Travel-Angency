<?php
ob_start();
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
    <!-- <script src="../../JS/script.js"></script> -->
    <title>Subscribe</title>
</head>

<body class="w-100">
    <div class="container-fulid">
        <!-- nav bar -->
        <nav class="navbar z-index-999 w-100 navbar-expand-lg navbar-light bg-light">
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
                    <li class="nav-item  active">
                        <!-- home  -->
                        <a href="../index.php" class="nav-link m-2 menu-item  nav-active">Home</a>
                    </li>
                    <li class="nav-item">
                        <!-- about -->
                        <a href="../about_us/about_us.php" class="nav-link m-2 menu-item">About</a>
                    </li>
                    <li class="nav-item">
                        <!-- blog -->
                        <a href="../blog/blog.php" class="nav-link m-2 menu-item">Blog</a>
                    </li>
                    <li class="nav-item">
                        <!-- contact -->
                        <a href="../contact_us/contact_us.php" class="nav-link m-2 menu-item ">Contact</a>
                    </li>
                    <li class="nav-item">
                        <!-- book now -->
                        <a href="../../Book/book.php" class="nav-link m-2 menu-item">Book Now</a>
                    </li>
                    <li class="nav-item">
                        <!-- username -->
                        <a href="../login/session_logout.php" class="nav-link m-2 menu-item"><i class="bi bi-box-arrow-in-right"></i> Log out</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- input field -->
        <div class="container-fluid position-absolute subscribe-container h-100">
            <div class="row h-100">
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 p-0">
                    <div class="subscribe-img-container">

                        <img src="../../images/HOME/homepic.png" alt="">
                    </div>

                </div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 d-flex align-items-center">
                    <div class="container w-75 ml-auto mr-auto">
                        <div class="row mb-3">
                            <div class="col">
                                <h1>Welcome to Lakbay!</h1>
                                <p>Make plans to travel with us</p>
                            </div>
                        </div>
                        <!-- subscribe text -->
                        <div class="row mb-3">
                            <div class="col-12 col-md-9 col-lg-9">
                                <p>Subscribe to our newsletter to stay
                                    updated every moment</p>
                            </div>
                        </div>
                        <!-- input email -->
                        <div class="row">
                            <div class="col">
                                <form action="#" class="needs-validation" novalidate>
                                    <input class="form-control form-control-lg mb-3" type="email" placeholder="Enter a valid email address">
                                    <input type="submit" class="btn btn-dark btn-lg w-100" value="SUBSCRIBE">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>