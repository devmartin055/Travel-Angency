<?php
ob_start();
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>

    <?php
    
    include "../includes/libraries.php";
    ?>
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/index.css">
    <script src="../JS/validation.js"></script>
    <script src="../JS/script.js"></script>
    <title>About</title>
</head>

<body>
    <!--navigation bar -->



    <!-- cover photo with navigation bar-->
    <div class="fluid-container mb-5">
        <!-- nav container -->
        <div class="nav-container w-100">
            <!-- nav body -->
            <nav class="navbar bg-dark-transparent position-fixed w-100 navbar-expand-lg navbar-light">
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
                        <li class="nav-item active">
                            <!-- about -->
                            <a href="#" class="nav-link m-2 menu-item  nav-active text-light">About</a>
                        </li>
                        <li class="nav-item">
                            <!-- blog -->
                            <a href="nav_blog.php" class="nav-link m-2 menu-item text-light">Blog</a>
                        </li>
                        <li class="nav-item">
                            <!-- contact -->
                            <a href="nav_contact_us.php" class="nav-link m-2 menu-item text-light">Contact</a>
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
        </div>
        <!-- cover -->
        <div class="row">
            <div class="col w-100">
                <img class="img-fluid w-100" src="../images\ABOUT US\aboutpic.jpg" alt="">
                <!-- about header -->
                <div class="center text-center w-75">
                    <p class="display-2 font-weight-bold p-5 bg-dark-transparent cover-heading bw-10 bs-solid bc-dark"> ABOUT US </p>
                </div>
            </div>
        </div>
    </div>

    <!-- our mission -->
    <div class="container bg-light pt-5 rounded dropshadow mb-3">
        <div class="row mb-3 justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                    <!-- our mission -->
                    <p class="h3 font-weight-bold mr-2"> OUR MISSION </p>
                    <img src="../images\LOGO\iconmonstr-weather-2-240.png" class=" weather" alt="">
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-lg-10 p-0">
                <img class="w-75 rounded" src="../images\ABOUT US\MissionPic.jpg" alt="">
                <div class="p-3 position-absolute h-100 mission">
                    <div class="row justify-content-lg-end">
                        <div class="col-lg-5 col-md-6 tb-border p-0">
                            <p class="p-3 h4 transparent font-weight-bold mt-3 mb-3">
                                LAKBAY's mission is to
                                provide innovative and better
                                travel experiences for
                                customers, starting with
                                location discovery and
                                continuing through the
                                booking process even after a
                                trip has occurred.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row bg-gray p-5">
            <div class="col">
                <!-- row for logo -->
                <div class="row p-0 mb-3">
                    <div class="col-3">
                        <img class="w-100" class="img-thumbnail logo" src="../images\LOGO\labkay.png" alt="logo">
                    </div>
                </div>
                <!-- row for text -->
                <div class="row justify-content-center mb-5">
                    <div class="col-12 col-md-8 col-lg-10">
                        <div class="tb-border">
                            <p class="p-3 h4 transparent mt-3 mb-3 text-center">
                                Lakbay has been transforming the world of travel since its start in
                                2021 by allowing consumers to go on adventures that inspire them.
                                The ground-breaking and accessible platform assists travelers from
                                across country in their exploration of Southeast Asia
                            </p>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>

    <!-- the team -->
    <div class="container p-3 dropshadow">
        <div class="row">
            <div class="col">
                <div class="text-center">
                    <p class="font-weight-bold h1">THE TEAM</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col  col-md-8 col-lg-10">
                <p class="font-italic text-center">
                    The Lakbay team makes it possible for tourists to experience the world's most stunning
                    secret spots. Also, joining us guarantees you'll save time and money while enjoying the
                    experience
                </p>

            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-center">
                <div class="card w-75 dropshadow rounded">
                    <!-- image with social media icons -->
                    <div class="position-relative">
                        <img class="card-img-top border border-secondary" src="../images\ABOUT US\me@3x.png" alt="Card image cap">
                        <div class="position-absolute social p-3">
                            <div class="account-icon mb-3">
                                <a href="#" class="h2 text-secondary"><i class="bi bi-facebook "></i></a>

                            </div>
                            <div class="account-icon  mb-3">
                                <a href="#" class="h2 text-secondary"><i class="bi bi-instagram "></i></a>

                            </div>
                            <div class="account-icon  mb-3">
                                <a href="#" class="h2 text-secondary"><i class="bi bi-twitter"></i></a>

                            </div>
                            <div class="account-icon  mb-3">
                                <a href="#" class="h2 text-secondary "><i class="bi bi-google"></i></a>

                            </div>
                        </div>
                    </div>
                    <!-- card body -->
                    <div class="card-body">

                        <p class="h5 text-secondary">CEO, CO-FOUNDER</p>
                        <p class="h3 text-info">Martin De Guzman</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-center">
                <div class="card w-75 dropshadow rounded">
                    <!-- image with social media icons -->
                    <div class="position-relative">
                        <img class="card-img-top border border-secondary" src="../images\ABOUT US\dee.png" alt="Card image cap">
                        <div class="position-absolute social p-3">
                            <div class="account-icon mb-3">
                                <a href="#" class="h2 text-secondary"><i class="bi bi-facebook "></i></a>

                            </div>
                            <div class="account-icon  mb-3">
                                <a href="#" class="h2 text-secondary"><i class="bi bi-instagram "></i></a>

                            </div>
                            <div class="account-icon  mb-3">
                                <a href="#" class="h2 text-secondary"><i class="bi bi-twitter"></i></a>

                            </div>
                            <div class="account-icon  mb-3">
                                <a href="#" class="h2 text-secondary "><i class="bi bi-google"></i></a>

                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <p class="h5 text-secondary">CEO, CO-FOUNDER</p>
                        <p class="h3 text-info">DEE SARMIENTO</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-center">
                <div class="card w-75 dropshadow rounded">

                    <div class="position-relative">
                        <img class="card-img-top border border-secondary" src="../images\ABOUT US\jolene.png" alt="Card image cap">
                        <div class="position-absolute social p-3">
                            <div class="account-icon mb-3">
                                <a href="#" class="h2 text-secondary"><i class="bi bi-facebook "></i></a>

                            </div>
                            <div class="account-icon  mb-3">
                                <a href="#" class="h2 text-secondary"><i class="bi bi-instagram "></i></a>

                            </div>
                            <div class="account-icon  mb-3">
                                <a href="#" class="h2 text-secondary"><i class="bi bi-twitter"></i></a>

                            </div>
                            <div class="account-icon  mb-3">
                                <a href="#" class="h2 text-secondary "><i class="bi bi-google"></i></a>

                            </div>
                        </div>
                    </div>


                    <div class="card-body">

                        <p class="h5 text-secondary">CEO, CO-FOUNDER</p>
                        <p class="h3 text-info">JOLENE TECSON</p>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- lakbay -->

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