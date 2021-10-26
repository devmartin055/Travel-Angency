<?php
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
