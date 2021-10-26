<?php
ob_start();
session_start();
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


    <!-- <script src="../JS/script.js"></script> -->
    <title>Log in</title>
</head>

<body class="w-100">
    <div class="container-fulid">

        <!-- input field -->
        <div class="container-fluid position-absolute subscribe-container h-100">
            <div class="row h-100">
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 p-0">
                    <div class="subscribe-img-container">

                        <img src="../images/LOGIN/loginpic.jpg" alt="">
                    </div>

                </div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 d-flex align-items-center">
                    <div class="container w-75 ml-auto mr-auto">

                        <div class="row mb-3">
                            <div class="col">
                                <h2>Welcome to Lakbay!</h2>
                                <p class="text-secondary">Please log in to your account</p>
                            </div>
                        </div>
                        <?php
                        if (isset($_GET['invalid'])) {
                            echo "<div class='alert alert-danger' role='alert'>
                                            Invalid username or password!
                                        </div>";
                        }
                        ?>
                        <form action="../PHP/login_confirm.php" class="needs-validation" method="POST" novalidate>
                            <!-- email -->
                            <div class="row justify-content-center mb-3">
                                <div class="col">
                                    <div class="input-group">
                                        <!-- contact name input -->
                                        <input class="form-control" type="text" name="email" placeholder="Email address" id="email" value="<?php if (isset($_SESSION["username"])) {
                                                                                                                                                echo $_SESSION["username"];
                                                                                                                                            } ?>" maxlength="32" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-lines-fill"></i></span>
                                        </div>
                                        <div class="valid-feedback">
                                            Ok!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter valid email.
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- password -->
                            <div class="row justify-content-center mb-3">
                                <div class="col">
                                    <div class="input-group">
                                        <!-- password -->
                                        <input value="<?php if (isset($_SESSION["username"])) {
                                                            echo $_SESSION["password"];
                                                        } ?>" class="form-control" type="password" name="password" placeholder="Password" id="" maxlength="32" required>
                                        <div class="input-group-append">
                                            <button type="button" class="input-group-text btn"><i class="bi bi-eye-fill"></i></button>
                                        </div>

                                        <div class="valid-feedback">
                                            Ok!
                                        </div>
                                        <div class="invalid-feedback">
                                            Password is minimum of 8 characters.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- remember checkbox and forgot password -->
                            <div class="row justify-content-center mb-3">
                                <div class="col">
                                    <div class="form-group form-check">
                                        <input name="rememberMe" type="checkbox" class="form-check-input" id="rememberMe" <?php if (isset($_SESSION["rememberMe"])) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                </div>
                                <div class="col text-right">
                                    <a href="#">forgot password?</a>
                                </div>
                            </div>
                            <!-- submit -->
                            <div class="row justify-content-center mb-3">
                                <div class="col">
                                    <input type="submit" name="submit" value="Sign In" class="btn w-100 btn-primary font-weight-bold">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>