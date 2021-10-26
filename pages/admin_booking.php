<?php

ob_start();
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: login/login.php");
} ?>
<!DOCTYPE html>
<html>

<head>
    <?php
    
    include "../PHP/checkSession.php";
    include "../includes/libraries.php";
    ?>

    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/admin.css">
    <script src="../JS/admin_book.js"></script>

    <title>Booking</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- navigation -->
            <div class="col-12  col-lg-2 p-0">
                <div class="text-center d-none d-lg-block">
                    <span class="display-1 "><i class="bi bi-person-circle"></i></span>
                    <p>ADMIN</p>
                </div>

                <nav class="navbar navbar-expand-lg navbar-light">

                    <a class="navbar-brand d-block d-lg-none" href="#">
                        <div class="logo-container">
                            <!-- logo img -->
                            <img class="img-thumbnail logo" src="../images/LOGO/logo.jpg" alt="logo">
                        </div>
                    </a>
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="admin_package.php"><i class="bi bi-box-seam"></i> Package</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="admin_package_type.php"><i class="bi bi-tags"></i></i> Package Type</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-active" href="#"><i class="bi bi-bookmarks"></i> Booking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admin_blog.php"><i class="bi bi-pencil-square"></i> Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=" ../PHP/session_logout.php"><i class="bi bi-door-open"></i> Sign out</a>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>
            <!-- content  -->
            <div class="col-12 col-lg-10 p-0">
                <div class="container-fluid m-0">
                    <!-- heading -->
                    <div class="row mb-3">
                        <div class="container d-none d-lg-block bg-skyblue">
                            <div class="row p-5">
                                <div class="col text-center">
                                    <img class="brand" src="../images/LOGO/labkay.png" alt="">
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- table -->
                    <div class="row ">
                        <div class="col-12 p-0">
                            <div class="table-responsive">
                                <table id="bookTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Package</th>
                                            <th>Departure Date</th>
                                            <th>Contact Person</th>
                                            <th>Contact No.</th>
                                            <th>Email</th>
                                            <th>Origin</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!-- to be field with ajax -->
                                        <!-- <tr>
                                            <td>
                                                <img class="img-thumbnail package-img" src="../Book/images/korea.png" alt="">
                                                <a class="ml-3" href="#"> Best of Korea</a>
                                            </td>
                                            <td>4D3N</td>
                                            <td>Korea</td>
                                            <td> <a href="#">Edit</a> <br> <a href="#">Delete</a> </td>
                                        </tr> -->

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- view modal -->
    <div class="modal fade" id="viewBookModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Book Complete Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="package_name"> Package Name</label>
                                <input value="Best of Korea" id="package_name" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-lg-6 col-sm-6 col-md-6 ">
                                <label for="booked_date"> Booked Date</label>
                                <input value="Whole Apartment" id="booked_date" class="form-control" type="text" readonly>
                            </div>
                            <div class="col-12 col-lg-6 col-sm-6 col-md-6">
                                <label for="date_departure"> Departure Date</label>
                                <input value="2" id="date_departure" class="form-control  border border-warning" type="text" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-lg-6 col-sm-6 col-md-6 ">
                                <label for="type_name"> Accomodation Type</label>
                                <input value="Whole Apartment" id="type_name" class="form-control" type="text" readonly>
                            </div>
                            <div class="col-12 col-lg-6 col-sm-6 col-md-6">
                                <label for="number_of_person"> Number of Person</label>
                                <input value="2" id="number_of_person" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-lg-6 col-sm-6 col-md-6">
                                <label for="contact_person"> Contact Person</label>
                                <input value="Whole Apartment" id="contact_person" class="form-control" type="text" readonly>
                            </div>
                            <div class="co-12l col-lg-6 col-sm-6 col-md-6">
                                <label for="contact_number">Contact Number</label>
                                <input value="Whole Apartment" id="contact_number" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12 col-lg-6 col-sm-6 col-md-6">
                                <label for="email">Email Address</label>
                                <input value="Whole Apartment" id="email" class="form-control" type="text" readonly>
                            </div>
                            <div class="col-12 col-lg-6 col-sm-6 col-md-6">
                                <label for="country_origin">Origin</label>
                                <input value="Whole Apartment" id="country_origin" class="form-control" type="text" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="instruction">Instruction</label>
                                <textarea class="form-control w-100" id="instruction" cols="30" rows="5" readonly></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button id="viewModaldelete" type="button" class="btn btn-danger delete"><i class="bi bi-trash"></i> Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-confirm" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">


                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col">


                            <div class="icon-box">
                                <i class="material-icons">&#xE5CD;</i>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h4 class="modal-title">Are you sure?</h4>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="modal-body">
                                <p>Do you really want to delete these records? This process cannot be undone.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row m-auto">
                        <div class="col">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                <button id="delete" type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>


</html>