<?php
ob_start();
session_start();
if (!isset($_GET["package_id"])) {
    header("location: nav_book.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <?php

    include "../config/connection.php";

    //include "../admin/package/package_image/";

    include "../includes/libraries.php";
    ?>
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/explore.css">
    <link rel="stylesheet" href="../CSS/index.css">

    <script src="../JS/validation.js"></script>
    <script src="../JS/book.js"></script>

    <title>Explore Korea</title>
</head>


<body>

    <?php
    if (isset($_GET["package_id"])) {
        $sql = "SELECT 
        p.package_id as package_id,
        p.package_name as p_name, 
        p.no_of_days as p_day, 
        p.no_of_nights as p_night, 
        p.package_image as p_image,
        p.destination as p_destination, 
        i.inclusion_flight as i_flight, 
        i.inclusion_meal as i_meals, 
        i.inclusion_tours as i_tours, 
        i.inclusion_guide as i_guide, 
        i.inclusion_insurance as i_insurance, 
        it.destination as it_destination, 
        it.description as it_description, 
        a.acc_hotel_name as h_name, 
        a.acc_hotel_address as h_address, 
        a.acc_hotel_contact as h_contact, 
        a.acc_hotel_description as h_description,
        a.acc_hotel_image as h_image
                    FROM package p 
                        JOIN inclusion i on i.package_id = p.package_id
                        JOIN itenary it on it.package_id = p.package_id
                        JOIN accomodation a on a.package_id = p.package_id
                    AND
                        p.package_id =" . $_GET["package_id"];


        $result = mysqli_query($conn, $sql);

        $row;
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            //print_r($row);

            /* template */
            /*  echo "<input type='text' name='' id='' value='{$row['']}' hidden>";
            echo "<textarea name='' id='' cols='30' rows='10' hidden>{$row['']}</textarea>"; */

            /* inclusion */
            echo "<form id='inclusion' method='POST'>";
            echo "<input type='text' name='package_id' id='package_id' value='{$row['package_id']}' hidden>";
            echo "<textarea name='i_flight' id='i_flight' cols='30' rows='10' hidden>{$row['i_flight']}</textarea>";
            echo "<input type='text' name='h_name' id='h_name' value='{$row['h_name']}' hidden>";
            echo "<textarea name='i_meals' id='i_meals' cols='30' rows='10' hidden>{$row['i_meals']}</textarea>";
            echo "<textarea name='i_tours' id='i_tours' cols='30' rows='10' hidden>{$row['i_tours']}</textarea>";
            echo "<input type='text' name='i_guide' id='i_guide' value='{$row['i_guide']}' hidden>";
            echo "<input type='text' name='i_insurance' id='i_insurance' value='{$row['i_insurance']}' hidden>";
            echo "</form>";

            /* itenarary */
            echo "<form id='itenarary'>";
            echo "<input type='text' name='package_id' id='package_id' value='{$row['package_id']}' hidden>";
            echo "<textarea name='it_destination' id='it_destination' cols='30' rows='10' hidden>{$row['it_destination']}</textarea>";
            echo "<textarea name='it_description' id='it_description' cols='30' rows='10' hidden>{$row['it_description']}</textarea>";
            echo "</form>";

            /* accomodation */
            echo "<form id='accomodation'>";
            echo "<input type='text' name='package_id' id='package_id' value='{$row['package_id']}' hidden>";
            echo "<input type='text' name='h_name' id='h_name' value='{$row['h_name']}' hidden>";
            echo "<input type='text' name='h_address' id='h_address' value='{$row['h_address']}' hidden>";
            echo "<input type='text' name='h_contact' id='h_contact' value='{$row['h_contact']}' hidden>";
            echo "<input type='text' name='h_image' id='h_image' value='{$row['h_image']}' hidden>";
            echo "<textarea name='h_description' id='h_description' cols='30' rows='10' hidden>{$row['h_description']}</textarea>";
            echo "</form>";
        }
    }
    ?>


    <!-- nav bar -->
    <nav class="navbar sticky-top  navbar-expand-lg navbar-black bg-light">
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
                    <a href="nav_contact_us.php" class="nav-link m-2 menu-item">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="nav_book.php" class="nav-link m-2 menu-item nav-active">Book Now</a>
                </li>
                <li class="nav-item">
                    <a href="../php/session_logout.php" class="nav-link m-2 menu-item text-light"><i class="bi bi-box-arrow-right"></i> Log out</a>
                </li>
            </ul>
        </div>
    </nav>


    <!-- cover background -->
    <div class="cover-photo-container mb-3">
        <img class="img-fluid" src="../uploads/<?php echo $row["p_image"] ?>" alt="">
    </div>

    <!-- heading -->

    <!-- bread crumbs -->
    <nav aria-label="breadcrumb " class="container">
        <ol class="breadcrumb m-0 ">
            <li class="breadcrumb-item"><a href="nav_book.php">Book Now</a></li>
            <li class="breadcrumb-item active"><?php echo $row["p_name"] ?></li>
        </ol>
    </nav>
    <br>
    <!-- trip title -->
    <div class="container">
        <div class="row justify-content-center">

            <div class="col">
                <h1 class="explore-page-heading"><?php echo $row["p_name"] ?></h1>
                <hr>
            </div>
        </div>
    </div>
    <br>
    <!-- trip basic information -->
    <div class="container mb-3">
        <div class="row justify-content-center">

            <div class="col-6 col-sm-4 col-md-3 col-lg-3">
                <h3><i class="bi bi-calendar text-warning"></i> <?php echo $row["p_day"] . "D" . $row["p_night"] . "N" ?></h3>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-lg-3 text-right">
                <h3><i class="bi bi-geo-alt-fill text-danger"></i> <?php echo $row["p_destination"] ?></h3>
            </div>
        </div>
        <br>

    </div>


    <div class="container alert alert-info p-3">
        <form class="needs-validation" action="book_contact_info.php" method="POST" novalidate>
            <input type="text" name="package_id" value="<?php echo $row["package_id"] ?>" hidden>
            <div class="row justify-content-center mb-3">
                <!-- book now button -->
                <div class="col text-center">
                    <h3>BOOK NOW!</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col col-lg-5 mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="personNumber">Select Accomodation Type</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="selectType">Options</label>
                                </div>
                                <select class="custom-select custom-select-lg " name="type" id="selectType" required>
                                    <?php
                                    $sql = "SELECT * FROM package_type";

                                    $result = mysqli_query($conn, $sql);
                                    echo "<option value=''>Choose...</option>";
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($option = mysqli_fetch_assoc($result)) {
                                            echo "<option value={$option['type_id']}>{$option['type_name']}</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5 mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="">Select Date Departure</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-daterange input-group input-group-lg" id="datepicker">
                                <input name="date" type="text" class="form-control date-picker" placeholder="Select Date" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-5 mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="number_of_person">Number of Person (max: 20)</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group  input-group-lg ">

                                <input id="number_of_person" class="form-control " type="number" name="number_of_person" placeholder="Input" min="1" max=20 required>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5 mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="">Price</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group input-group-lg ">
                                <div id="price" class=" text-danger form-control font-weight-bold bg-transparent  border border-info border-dash text-center">
                                    ₱ 0
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-12 col-lg-2 mb-3">
                    <div class="row d-none d-lg-block">
                        <div class="col">
                            <label for="personNumber">&nbsp;</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <button class="btn btn-info btn-lg w-100">BOOK</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>

    <br>

    <!-- tabs itenary, inclusion accomodation -->
    <div class="container m-auto">
        <ul class="nav nav-tabs my-nav">
            <li class="nav-item text-info">
                <a class="nav-link active" id="btnInclusion" value="inclusion">Inclusion</a>
            </li>
            <li class="nav-item text-info">
                <a class="nav-link cursor-pointer" id="btnItenary" value="itenary">Itenerary</a>
            </li>
            <li class="nav-item text-info">
                <a class="nav-link cursor-pointer" id="btnAccomodation">Accomodation</a>
            </li>
        </ul>
        <!-- inclusion, itenerary, accomodation tab -->
        <div class="container border-left border-right border-bottom bg-light">
            <br>
            <div id='packageInformation' class="mb-4">

            </div>
            <hr>
            <br>
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