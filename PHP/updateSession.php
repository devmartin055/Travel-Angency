<?php
session_start();

include "../config/connection.php";

/* init session */
$_SESSION["addPackage"]["insertSession"] = rand(1, 10000);

/* populate package Session */
function fetchPackage($package_id)
{

    global $conn;
    $sql = "SELECT * FROM package WHERE package_id = $package_id";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION["addPackage"]["package_id"] = $package_id;
        $_SESSION["addPackage"]["packageName"] = $row["package_name"];
        $_SESSION["addPackage"]["day"] = $row["no_of_days"];
        $_SESSION["addPackage"]["night"] = $row["no_of_nights"];
        $_SESSION["addPackage"]["destination"] = $row["destination"];
        $_SESSION["addPackage"]["packageImage"]["name"] = $row["package_image"];
        $_SESSION["addPackage"]["packageImage"]["currentImage"] = $row["package_image"];
    }
}

/* fetch inclusions */
function fetchInclusion($package_id)
{
    global $conn;
    $sql = "SELECT `inclusion_id`, `package_id`, `inclusion_flight`, `inclusion_meal`, `inclusion_tours`, `inclusion_guide`, `inclusion_insurance` FROM `inclusion` WHERE package_id=" . $package_id;

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION["addPackage"]["inclusion"]["flight"] = $row["inclusion_flight"];
        $_SESSION["addPackage"]["inclusion"]["meals"] = $row["inclusion_meal"];
        $_SESSION["addPackage"]["inclusion"]["tours"] = $row["inclusion_tours"];
        $_SESSION["addPackage"]["inclusion"]["guide"] = $row["inclusion_guide"];
        $_SESSION["addPackage"]["inclusion"]["insurance"] = $row["inclusion_insurance"];
    }
}

function fetchItenary($package_id)
{
    global $conn;
    $sql = "SELECT `itenary_id`, `package_id`, `destination`, `description` FROM `itenary` WHERE package_id=" . $package_id;

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        $destination = explode("/-breakhear-/", $row["destination"]);
        $description = explode("/-breakhear-/", $row["description"]);

        foreach ($destination as $key => $value) {
            $_SESSION["addPackage"]["itenary"]['destination'][$key] = str_replace("<br>", "\n", $value);
            
        }
        foreach($description as $key => $value){
            $_SESSION["addPackage"]["itenary"]['description'][$key] = str_replace("<br>", "\n", $value);
        }
        /* $_SESSION["addPackage"]["itenary"]['destination'][$index] */
    }
}

function fetchAccomodation($package_id)
{
    global $conn;
    $sql = "SELECT
    `acc_hotel_name`,
    `acc_hotel_address`,
    `acc_hotel_contact`,
    `acc_hotel_description`,
    `acc_hotel_image`
FROM
    `accomodation`
WHERE package_id=" . $package_id;

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        $_SESSION["addPackage"]["accomodation"]["hotelName"] =  $row["acc_hotel_name"];
        $_SESSION["addPackage"]["accomodation"]["hotelAddress"] =  $row["acc_hotel_address"];
        $_SESSION["addPackage"]["accomodation"]["hotelContact"] =  $row["acc_hotel_contact"];
        $_SESSION["addPackage"]["accomodation"]["hotelDescription"] =  $row["acc_hotel_description"];

        $_SESSION["addPackage"]["accomodation"]["hotelImage"]["name"] =  $row["acc_hotel_image"];
        $_SESSION["addPackage"]["accomodation"]["hotelImage"]["currentImage"] =  $row["acc_hotel_image"];
    }
}


/* get the id */
$package_id = $_GET["package_id"];

fetchPackage($package_id);
fetchInclusion($package_id);
fetchItenary($package_id);
fetchAccomodation($package_id);

mysqli_close($conn);
header("location: ../pages/admin_package_insert.php");
