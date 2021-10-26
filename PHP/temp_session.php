<?php
session_start();

function addPackageForm()
{
    if (!empty($_POST['packageName'])) {
        $_SESSION["addPackage"]["packageName"] = $_POST['packageName'];
    } else {
        unset($_SESSION["addPackage"]["packageName"]);
    }
    if (!empty($_POST['day'])) {
        /* check if new number day is less than the previews entered number day */
        /* check if the session has initiated value before */

        $_SESSION["addPackage"]["day"] = $_POST['day'];
    } else {
        unset($_SESSION["addPackage"]["day"]);
    }

    if (!empty($_POST['night'])) {
        $_SESSION["addPackage"]["night"] = $_POST['night'];
    } else {
        unset($_SESSION["addPackage"]["night"]);
    }

    if (!empty($_POST['destination'])) {
        $_SESSION["addPackage"]["destination"] = $_POST['destination'];
    } else {
        unset($_SESSION["addPackage"]["destination"]);
    }

    /* store the image file in the session variable */
    /* store image original name */

    if ($_FILES["packageImage"]['size'] != 0) {

        if (isset($_SESSION["addPackage"]["packageImage"]["tmp_name"]) && !empty($_SESSION["addPackage"]["packageImage"]["tmp_name"])) {
            unlink($_SESSION["addPackage"]["packageImage"]["tmp_name"]);
        }

        /* change the name of the file to avoid rewrite */
        $name = basename($_FILES["packageImage"]["name"]);
        $imageFileType = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $random = rand(1, 1000000);
        /* store image temporary directory */
        $temp_location = "../temp_uploads/" . $random . "." . $imageFileType;

        $_SESSION["addPackage"]["packageImage"]["name"] = basename($_FILES["packageImage"]["name"]);

        if (move_uploaded_file($_FILES["packageImage"]["tmp_name"], $temp_location)) {
            echo "\n file was uploaded";
        } else {
            echo "\n file was not uploaded";
        }

        /* store image temporary directory */
        $_SESSION["addPackage"]["packageImage"]["tmp_name"] = $temp_location;
    }

    print_r($_SESSION["addPackage"]);
}



/* inclusion details */
function inclusion()
{
    if (!empty($_POST['flight'])) {
        $_SESSION["addPackage"]["inclusion"]["flight"] = $_POST['flight'];
    } else {
        unset($_SESSION["addPackage"]["inclusion"]["flight"]);
    }
    if (!empty($_POST['meals'])) {
        $_SESSION["addPackage"]["inclusion"]["meals"] = $_POST['meals'];
    } else {
        unset($_SESSION["addPackage"]["inclusion"]["meals"]);
    }
    if (!empty($_POST['tours'])) {
        $_SESSION["addPackage"]["inclusion"]["tours"] = $_POST['tours'];
    } else {
        unset($_SESSION["addPackage"]["inclusion"]["tours"]);
    }
    if (!empty($_POST['guide'])) {
        $_SESSION["addPackage"]["inclusion"]["guide"] = $_POST['guide'];
    } else {
        unset($_SESSION["addPackage"]["guide"]);
    }
    if (!empty($_POST['insurance'])) {
        $_SESSION["addPackage"]["inclusion"]["insurance"] = $_POST['insurance'];
    } else {
        unset($_SESSION["addPackage"]["inclusion"]["insurance"]);
    }

    /* remove the whole session if it is empty */
    if (isset($_SESSION["addPackage"]["inclusion"]) && empty($_SESSION["addPackage"]["inclusion"])) {
        unset($_SESSION["addPackage"]["inclusion"]);
    }

    print_r($_SESSION["addPackage"]);
}
/* returns the duration of the travel package */
function getDay()
{
    $day[] = $_SESSION["addPackage"]["day"];
    echo json_encode($day);
}

function itenary()
{
    if (!empty(array_filter($_POST["destination"]))) {
        $index = 0;
        foreach ($_POST["destination"] as $value) {
            /* check if post destination has value */
            if (!empty($value)) {
                $_SESSION["addPackage"]["itenary"]['destination'][$index] = $value;
            } else {/* unsey the session if none or empty */
                unset($_SESSION["addPackage"]["itenary"]['destination'][$index]);
            }
            $index++;
        }
    } else {
        /* unset the whole itenary destination session if the post array has empty value */
        unset($_SESSION["addPackage"]["itenary"]['destination']);
    }
    /* if description is not empty */
    if (!empty(array_filter($_POST["description"]))) {
        $index = 0;
        foreach ($_POST["description"] as $value) {
            if (!empty($value)) {
                /* check if the index has real value */
                $_SESSION["addPackage"]["itenary"]['description'][$index] = $value;
            } else {
                /* else unset if none */
                unset($_SESSION["addPackage"]["itenary"]['description'][$index]);
            }
            $index++;
        }
    }
    /* else unset the session for description itenary */ else {
        unset($_SESSION["addPackage"]["itenary"]['description']);
    }



    /* if both destination and description in itenary form are empty 
    then unset the itenary key in session addPackage */
    if (empty($_SESSION["addPackage"]["itenary"]['destination']) && empty($_SESSION["addPackage"]["itenary"]['description'])) {
        unset($_SESSION["addPackage"]["itenary"]);
    }

    print_r($_SESSION["addPackage"]);
}
/* accomodation */
function accomodation()
{
    /* if not empty */
    if (!empty($_POST['hotelName'])) {
        $_SESSION["addPackage"]["accomodation"]["hotelName"] = $_POST['hotelName'];
    } else {/* else unset the variable */
        unset($_SESSION["addPackage"]["accomodation"]["hotelName"]);
    }
    /* if not empty */
    if (!empty($_POST['hotelAddress'])) {
        $_SESSION["addPackage"]["accomodation"]["hotelAddress"] = $_POST['hotelAddress'];
    } else {/* else unset the variable */
        unset($_SESSION["addPackage"]["accomodation"]["hotelAddress"]);
    }
    /* if not empty */
    if (!empty($_POST['hotelContact'])) {
        $_SESSION["addPackage"]["accomodation"]["hotelContact"] = $_POST['hotelContact'];
    } else {/* else unset the variable */
        unset($_SESSION["addPackage"]["accomodation"]["hotelContact"]);
    }
    /* if not empty */
    if (!empty($_POST['hotelDescription'])) {
        $_SESSION["addPackage"]["accomodation"]["hotelDescription"] = $_POST['hotelDescription'];
    } else {/* else unset the variable */
        unset($_SESSION["addPackage"]["accomodation"]["hotelDescription"]);
    }

    /* store the image file in the session variable */
    /* store image original name */

    if ($_FILES["hotelImage"]['size'] != 0) {
        if (isset($_SESSION["addPackage"]["accomodation"]["hotelImage"]["tmp_name"]) && !empty($_SESSION["addPackage"]["accomodation"]["hotelImage"]["tmp_name"])) {
            unlink($_SESSION["addPackage"]["accomodation"]["hotelImage"]["tmp_name"]);
        }


        /* change the name of the file to avoid rewrite */
        $name = basename($_FILES["hotelImage"]["name"]);
        $imageFileType = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $random = rand(1, 10000);
        /* store image temporary directory */
        $temp_location = "../temp_uploads/" . $random . "." . $imageFileType;



        if (move_uploaded_file($_FILES["hotelImage"]["tmp_name"], $temp_location)) {
            echo "\n file was uploaded";
        } else {
            echo "\n file was not uploaded";
        }

        $_SESSION["addPackage"]["accomodation"]["hotelImage"]["tmp_name"] = $temp_location;
        $_SESSION["addPackage"]["accomodation"]["hotelImage"]["name"] = $name;
    }
    print_r($_SESSION["addPackage"]);
}

/* drives the ajax call whether what table it should do its query */
if ($_POST["formID"] == "itenary") {
    itenary();
} else if ($_POST["formID"] == "getDay") {
    getDay();
} else if ($_POST["formID"] == "inclusion") {
    inclusion();
} else if ($_POST["formID"] == "addPackageForm") {
    addPackageForm();
} else if ($_POST["formID"] == "accomodation") {
    accomodation();
}
