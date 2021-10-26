<?php
ob_start();
session_start();
include "../config/connection.php";

print_r($_SESSION);

function uploadImage($newFileName, $tmp_name, $location)
{
    /* the upload directory. folder were file will be stored */
    $upload_directory = $location . $newFileName;
    /* perform upload */
    /*  echo "tmp_name: ". $tmp_name;
    echo "<br>upload_directory: ".$upload_directory; */
    if (file_exists($tmp_name)) {
        if (rename($tmp_name, $upload_directory)) {
            echo $newFileName . "<br>was successfully saved!";
            return true;
        } else {
            echo "<br>ERROR UPLOADING THE IMAGE";
            return false;
        }
    } else {
        return true;
    }
}

function getImageFileName($name)
{
    $imageFileType = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    /* get date and time */
    $dateTime = date('mdYhis');
    /* create new name for the image */
    $newFileName = "lakbay_" . $dateTime . "_" . rand() . "." . $imageFileType;

    return $newFileName;
}



function insertInclusion($package_id)
{
    global $conn;
    $flight = escapeString($_SESSION["addPackage"]["inclusion"]["flight"]);
    $meals = escapeString($_SESSION["addPackage"]["inclusion"]["meals"]);
    $tours = escapeString($_SESSION["addPackage"]["inclusion"]["tours"]);
    $guide = escapeString($_SESSION["addPackage"]["inclusion"]["guide"]);
    $insurance = escapeString($_SESSION["addPackage"]["inclusion"]["insurance"]);


    $sql = "INSERT INTO `inclusion`(`inclusion_id`, `package_id`, `inclusion_flight`, `inclusion_meal`, `inclusion_tours`, `inclusion_guide`, `inclusion_insurance`) VALUES (null,{$package_id}, '{$flight}', '{$meals}', '{$tours}', '{$guide}', '{$insurance}') ";

    /* perform insert */
    if (mysqli_query($conn, $sql)) {
        echo " <br>inclusion successsfully inserted successfully inserted!";
        return true;
    } else {
        echo " <br>THERE WAS AN ERROR IN inclusion TABLE: <br>";
        echo $sql . "<br>";
        echo mysqli_error($conn) . "<br>";
        return false;
    }
    //echo $sql . "<br>";
}

function inserItenary($package_id)
{
    global $conn;
    $destination = "";
    $description = "";


    end($_SESSION["addPackage"]["itenary"]['destination']);
    $end = key($_SESSION["addPackage"]["itenary"]['destination']);


    foreach ($_SESSION["addPackage"]["itenary"]['destination'] as $key => $value) {
        $destination .= $value;
        $description .= str_replace("\n", "<br>", $_SESSION["addPackage"]["itenary"]['description'][$key]);
        /* add new line (\n) if the current index is not the last element */
        if ($key !=  $end) {
            $destination .= "/-breakhear-/";
            $description .= "/-breakhear-/";
        }
    }
    /* make the variable safe */
    $destination = escapeString($destination);
    $description = escapeString($description);

    $sql = "INSERT INTO `itenary`(`itenary_id`, `package_id`, `destination`, `description`) VALUES (null,{$package_id},'{$destination}','{$description}')";

    /* perform insert */
    if (mysqli_query($conn, $sql)) {
        echo " <br>itenary successsfully inserted successfully inserted!";
        return true;
    } else {
        echo " <br>THERE WAS AN ERROR IN itenary TABLE: <br>";
        echo $sql . "<br>";
        echo mysqli_error($conn) . "<br>";
        return false;
    }

    /* echo $sql . "<br>"; */
}

function insertAccomodation($package_id)
{
    global $conn;

    $hotel = escapeString($_SESSION["addPackage"]["accomodation"]["hotelName"]);
    $addres = escapeString($_SESSION["addPackage"]["accomodation"]["hotelAddress"]);
    $contact = escapeString($_SESSION["addPackage"]["accomodation"]["hotelContact"]);
    $description = escapeString($_SESSION["addPackage"]["accomodation"]["hotelDescription"]);
    $image = escapeString(getImageFileName($_SESSION["addPackage"]["accomodation"]["hotelImage"]["name"]));
    $sql = "INSERT INTO `accomodation`(`acc_id`, `package_id`, `acc_hotel_name`, `acc_hotel_address`, `acc_hotel_contact`, `acc_hotel_description`, `acc_hotel_image`) VALUES (null,{$package_id},'{$hotel}','{$addres}','{$contact}','{$description}','$image')";


    /* perform insert */
    if (mysqli_query($conn, $sql)) {
        echo "<br>itenary successsfully inserted successfully inserted!";
        /* perform upload */
        $uploadOk =  uploadImage($image, $_SESSION["addPackage"]["accomodation"]["hotelImage"]["tmp_name"], "../uploads/");
        return $uploadOk;
    } else {
        echo "<br>THERE WAS AN ERROR IN itenary TABLE: <br>";
        echo $sql . "<br>";
        echo mysqli_error($conn) . "<br>";
        return false;
    }


    /*  echo $sql . "<br>"; */
}

function insertPackage()
{
    global $conn;
    /* fetch all the data first */
    $name = escapeString($_SESSION['addPackage']['packageName']);
    $day = $_SESSION['addPackage']['day'];
    $night = $_SESSION['addPackage']['night'];
    $image = escapeString(getImageFileName($_SESSION['addPackage']['packageImage']['name']));
    $destination = escapeString($_SESSION['addPackage']['destination']);

    /* query statemt */
    $sql = "INSERT INTO `package`(`package_id`, `package_name`, `no_of_days`, `no_of_nights`, `package_image`, `destination`) VALUES (null,'{$name}',{$day},{$night},'{$image}','{$destination}')";

    if (mysqli_query($conn, $sql)) {
        echo " <br>package successfully inserted!";
        /* get last inserted ID */
        $last_id = mysqli_insert_id($conn);
        /* insert package inclusion */

        $insertOK = true;

        /* if upload image was successful it returns true otherwise false*/
        $insertOK = uploadImage($image, $_SESSION['addPackage']['packageImage']['tmp_name'], "../uploads/");

        /* insertion of the image was failed do not execute others */
        if ($insertOK) {

            $insertOK = insertInclusion($last_id);
        }
        /* if above query was failed do not execute */
        if ($insertOK) {

            $insertOK = inserItenary($last_id);
        }
        if ($insertOK) {
            $insertOK = insertAccomodation($last_id);
        }

        if ($insertOK) {
            echo "<br> PACKAGE SUCCESSFULLY SAVED!";

            return true;
        } else {
            echo "<br> ERROR SAVING THE PACKAGE";
            return false;
        }
    } else {
        echo "<br> THERE WAS AN ERROR IN PACKAGE TABLE: <br>";
        echo $sql . "<br>";
        echo mysqli_error($conn) . "<br>";
        return false;
    }

    //echo $sql . "<br>";
}

/* ************ */
/* update query */
/* ************ */


function updateInclusion($package_id)
{
    global $conn;
    $flight = escapeString($_SESSION["addPackage"]["inclusion"]["flight"]);
    $meals = escapeString($_SESSION["addPackage"]["inclusion"]["meals"]);
    $tours = escapeString($_SESSION["addPackage"]["inclusion"]["tours"]);
    $guide = escapeString($_SESSION["addPackage"]["inclusion"]["guide"]);
    $insurance = escapeString($_SESSION["addPackage"]["inclusion"]["insurance"]);


    $sql = "UPDATE `inclusion` SET `inclusion_flight`='{$flight}',`inclusion_meal`='{$meals}',`inclusion_tours`='{$tours}',`inclusion_guide`='{$guide}',`inclusion_insurance`='{$insurance}' WHERE `package_id` = " . $package_id;


    /* perform insert */
    if (mysqli_query($conn, $sql)) {
        echo " <br>inclusion successfully updated!";
        return true;
    } else {
        echo " <br>THERE WAS AN ERROR IN inclusion TABLE: <br>";
        echo $sql . "<br>";
        echo mysqli_error($conn) . "<br>";
        return false;
    }
}

function updateItenary($package_id)
{

    global $conn;
    $destination = "";
    $description = "";

    end($_SESSION["addPackage"]["itenary"]['destination']);
    $end = key($_SESSION["addPackage"]["itenary"]['destination']);


    foreach ($_SESSION["addPackage"]["itenary"]['destination'] as $key => $value) {
        $destination .= $value;
        $description .= str_replace("\n", "<br>", $_SESSION["addPackage"]["itenary"]['description'][$key]);
        /* add new line (\n) if the current index is not the last element */
        if ($key !=  $end) {
            $destination .= "/-breakhear-/";
            $description .= "/-breakhear-/";
        }
    }
    /* make the variable safe */
    $destination = escapeString($destination);
    $description = escapeString($description);

    $sql = "UPDATE `itenary` SET  `destination`='{$destination}',`description`='{$description}' WHERE package_id = " . $package_id;


    /* perform insert */
    if (mysqli_query($conn, $sql)) {
        echo " <br>itenary successsfully updated";
        return true;
    } else {
        echo " <br>THERE WAS AN ERROR IN itenary TABLE: <br>";
        echo $sql . "<br>";
        echo mysqli_error($conn) . "<br>";
        return false;
    }
}

function updateAccomodation($package_id)
{
    global $conn;

    $hotel = escapeString($_SESSION["addPackage"]["accomodation"]["hotelName"]);
    $addres = escapeString($_SESSION["addPackage"]["accomodation"]["hotelAddress"]);
    $contact = escapeString($_SESSION["addPackage"]["accomodation"]["hotelContact"]);
    $description = escapeString($_SESSION["addPackage"]["accomodation"]["hotelDescription"]);
    $image = escapeString($_SESSION["addPackage"]["accomodation"]["hotelImage"]["name"]);

    if (strcmp($_SESSION['addPackage']['accomodation']['hotelImage']['name'], $_SESSION['addPackage']['accomodation']['hotelImage']['currentImage'])) {
        $image = escapeString(getImageFileName($_SESSION['addPackage']['packageImage']['name']));

        /* delete image */
        /* deleteImageFile("../../../package_image/" . $_SESSION['addPackage']['packageImage']['currentImage']); */

        if (unlink("../uploads/" . $_SESSION['addPackage']['accomodation']['hotelImage']['currentImage'])) {
        } else {
            echo "<br>ERROR DELETING THE FILE";
        }

        echo " <br> ../uploads/" . $_SESSION['addPackage']['accomodation']['hotelImage']['currentImage'] . "<br>";
    }

    $sql = "UPDATE `accomodation` SET `acc_hotel_name`='{$hotel}',`acc_hotel_address`='{$addres}',`acc_hotel_contact`='{$contact}',`acc_hotel_description`='{$description}',`acc_hotel_image`='{$image}' WHERE package_id =" . $package_id;


    /* perform update */
    if (mysqli_query($conn, $sql)) {
        echo "<br>accomodation successfully updated";
        /* perform upload */
        $uploadOk = true;
        if (isset($_SESSION["addPackage"]["accomodation"]["hotelImage"]["tmp_name"])) {
            $uploadOk =  uploadImage($image, $_SESSION["addPackage"]["accomodation"]["hotelImage"]["tmp_name"], "../uploads/");
        }

        return $uploadOk;
    } else {
        echo "<br>THERE WAS AN ERROR IN accomodation table: <br>";
        echo $sql . "<br>";
        echo mysqli_error($conn) . "<br>";
        return false;
    }


    /*  echo $sql . "<br>"; */
}


function updatePackage($package_id)
{
    global $conn;
    /* fetch all the data first */
    $name = escapeString($_SESSION['addPackage']['packageName']);
    $day = $_SESSION['addPackage']['day'];
    $night = $_SESSION['addPackage']['night'];

    $image = escapeString($_SESSION['addPackage']['packageImage']['name']);

    if (strcmp($_SESSION['addPackage']['packageImage']['name'], $_SESSION['addPackage']['packageImage']['currentImage'])) {
        $image = escapeString(getImageFileName($_SESSION['addPackage']['packageImage']['name']));

        /* delete image */
        /* deleteImageFile("../../../package_image/" . $_SESSION['addPackage']['packageImage']['currentImage']); */

        if (unlink("../uploads/" . $_SESSION['addPackage']['packageImage']['currentImage'])) {
        } else {
            echo "<br>ERROR DELETING THE FILE";
        }

        echo "<br>../uploads/" . $_SESSION['addPackage']['packageImage']['currentImage'];
    }

    $destination = escapeString($_SESSION['addPackage']['destination']);

    $sql = "UPDATE
    `package`
    SET
    `package_name` = '{$name}',
    `no_of_days` = {$day},
    `no_of_nights` = {$night},
    `package_image` = '{$image}',
    `destination` = '{$destination}'
    WHERE
    package_id = " . $package_id;

    if (mysqli_query($conn, $sql)) {
        echo "<br>package successfully updated!";

        $insertOK = true;

        /* if upload image was successful it returns true otherwise false*/

        if (isset($_SESSION['addPackage']['packageImage']['tmp_name'])) {
            $insertOK = uploadImage($image, $_SESSION['addPackage']['packageImage']['tmp_name'], "../uploads/");
        }

        echo "<br> insertOK: " . $insertOK;

        /* insertion of the image was failed do not execute others */
        if ($insertOK) {

            $insertOK = updateInclusion($package_id);
        }
        /* if above query was failed do not execute */
        if ($insertOK) {

            $insertOK = updateItenary($package_id);
        }
        if ($insertOK) {
            $insertOK = updateAccomodation($package_id);
        }

        if ($insertOK) {
            echo "<br> PACKAGE SUCCESSFULLY SAVED!";

            return true;
        } else {
            echo "<br> ERROR SAVING THE PACKAGE";
            return false;
        }

        if ($insertOK) {
            return true;
        } else {
            return false;
        }
    } else {
        echo "<br> THERE WAS AN ERROR IN PACKAGE TABLE: <br>";
        echo $sql . "<br>";
        echo mysqli_error($conn) . "<br>";
        return false;
    }
}

if (isset($_SESSION["addPackage"]["package_id"])) {
    if (updatePackage($_SESSION["addPackage"]["package_id"])) {
        mysqli_close($conn);
        header("location: ../pages/admin_update_complete.php");
    }
} else {
    /* call insertPackage function */
    if (insertPackage()) {
        mysqli_close($conn);
        header("location: ../pages/admin_add_complete.php");
    }
}
ob_end_flush();
?>
