<?php
ob_start();
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: login.php");
}
?><!DOCTYPE html>
<html>

<head>
    <?php
    
    include "../PHP/checkSession.php";

    include "../includes/libraries.php";
    ?>

    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="stylesheet" href="../CSS/admin.css">

    <script src="../JS/validation.js"></script>
    <script src="../JS/blog.js"></script>

    <title>Blog</title>
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
                        <ul class="nav flex-column w-100">
                            <li class="nav-item">
                                <a class="nav-link " href="admin_package.php"><i class="bi bi-box-seam"></i> Package</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="admin_package_type.php"><i class="bi bi-tags"></i></i> Package Type</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admin_booking.php"><i class="bi bi-bookmarks"></i> Booking</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link  nav-active" href="#"><i class="bi bi-pencil-square"></i> Blog</a>
                            </li>

                            <li class="nav-item d-lg-none d-sm-block">
                                <a class="nav-link" href="create_new_blog.php"><i class=" bi bi-plus-square"></i> Create new Blog</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="../PHP/session_logout.php"><i class="bi bi-door-open"></i> Sign out</a>
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
                            <div class="row  pt-3">
                                <div class="col text-center">
                                    <img class="brand" src="../images/LOGO/labkay.png" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-right pb-3">
                                    <a class="ml-auto btn btn-primary rounded mr-auto" href="../pages/create_new_blog.php"><i class="bi bi-pen"></i> Create New Blog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- table -->
                    <div class="row ">
                        <div class="col-12 p-0">
                            <div class="table-responsive">
                                <table id="blogTable" class="table table-striped table-hover td-center my-underline">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Published Date</th>
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




    <!-- modal -->

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
                                <p>Do you really want to delete these record? This process cannot be undone.</p>
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