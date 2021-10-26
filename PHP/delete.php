<?php

include "../config/connection.php";

function deleteInclusion($package_id)
{
    global $conn;
    $sql = "DELETE FROM `inclusion` WHERE package_id=" . $_POST["package_id"];
    /* returns zero if deletion of data was unsuccessful */
    $deleteOk = mysqli_query($conn, $sql);

    if (!$deleteOk) {
        echo "\n THERE WAS AN ERROR IN inclusion TABLE: \n";
        echo $sql . "\n";
        echo mysqli_error($conn) . "\n";
    }

    return $deleteOk;
}
function deleteItenary($package_id)
{

    global $conn;

    $sql = "DELETE FROM `itenary` WHERE package_id =" . $package_id;

    /* returns zero if deletion of data was unsuccessful */
    $deleteOk = mysqli_query($conn, $sql);

    if (!$deleteOk) {
        echo "\n THERE WAS AN ERROR IN itenary TABLE: \n";
        echo $sql . "\n";
        echo mysqli_error($conn) . "\n";
    }

    return $deleteOk;
}

function deleteAccomodation($package_id)
{
    global $conn;

    $sql = "SELECT `acc_hotel_image` FROM `accomodation` WHERE `package_id` =" . $package_id;

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        $target_file = "../uploads/" . $row["acc_hotel_image"];

        if (file_exists($target_file)) {
            unlink($target_file);
        } else {
            echo "FILE NOT EXIST! \n" . $target_file . "\n";
        }
    }

    $sql = "DELETE FROM `accomodation` WHERE `package_id`=" . $package_id;

    /* returns zero if deletion of data was unsuccessful */
    $deleteOk = mysqli_query($conn, $sql);

    if (!$deleteOk) {
        echo "\n THERE WAS AN ERROR IN accomodation TABLE: \n";
        echo $sql . "\n";
        echo mysqli_error($conn) . "\n";
    }

    return $deleteOk;
}

function deletePackage($package_id)
{
    global $conn;

    $sql = "SELECT `package_image` FROM `package` WHERE `package_id`=" . $package_id;

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        $target_file = "../uploads/" . $row["package_image"];

        if (file_exists($target_file)) {
            unlink($target_file);
        } else {
            echo "FILE NOT EXIST! \n" . $target_file . "\n";
        }
    }

    $sql = "DELETE FROM `package` WHERE `package_id`=" . $package_id;

    $deleteOk = mysqli_query($conn, $sql);

    if (!$deleteOk) {
        echo "\n THERE WAS AN ERROR IN inclusion TABLE: \n";
        echo $sql . "\n";
        echo mysqli_error($conn) . "\n";
    }
    return $deleteOk;
}

$package_id = $_POST["package_id"];

$deleteOk = false;
if (deleteInclusion($package_id)) {
    $deleteOk = true;
}

if ($deleteOk) {
    $deleteOk = deleteItenary($package_id);
}

if ($deleteOk) {
    $deleteOk = deleteAccomodation($package_id);
}

if ($deleteOk) {
    $deleteOk = deletePackage($package_id);
}


if ($deleteOk) {
    echo "\n Package successfully deleted!";
} else {
    echo "\n There was an error deleting the package!\npackage_id: " . $package_id;
}
