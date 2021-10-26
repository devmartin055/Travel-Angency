<?php


/* unset package image session */
if (isset($_SESSION["addPackage"])) {

    /* check if session is set, not empty and file existed */
    if (isset($_SESSION["addPackage"]["packageImage"]["tmp_name"]) && !empty($_SESSION["addPackage"]["packageImage"]["tmp_name"]) && file_exists($_SESSION["addPackage"]["packageImage"]["tmp_name"])) {
        unlink("../temp_uploads/" . $_SESSION["addPackage"]["packageImage"]["tmp_name"]);
    }
    /* check if session is set, not empty and file existed */
    if (isset($_SESSION["addPackage"]["accomodation"]["hotelImage"]["tmp_name"]) && !empty($_SESSION["addPackage"]["accomodation"]["hotelImage"]["tmp_name"]) && file_exists($_SESSION["addPackage"]["accomodation"]["hotelImage"]["tmp_name"])) {
        unlink("../temp_uploads/"  . $_SESSION["addPackage"]["accomodation"]["hotelImage"]["tmp_name"]);
    }
    unset($_SESSION["addPackage"]);
}
