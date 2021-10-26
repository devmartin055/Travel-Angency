<?php
ob_start();
include "../config/connection.php";
require '../vendor/autoload.php'; // If you're using Composer (recommended)


if (isset($_POST["submit"])) {

    $package_id = $_POST["package_id"];
    $type_id = $_POST["type_id"];
    $number_of_person = $_POST["number_of_person"];
    $contact_person = escapeString($_POST["contact_person"]);
    $email = escapeString($_POST["email"]);
    $contact_number = escapeString($_POST["contact_number"]);
    $country_origin = escapeString($_POST["country_origin"]);
    $instruction = escapeString($_POST["instruction"]);
    $booked_date = escapeString(date("F j, Y"));
    $date_departure = escapeString($_POST["date"]);

    $sql = "INSERT INTO `booking`(
                `book_id`, 
                `package_id`,
                `type_id`,
                `number_of_person`,
                `contact_person`, 
                `email`, 
                `contact_number`, 
                `country_origin`,
                `instruction`,
                `booked_date`,
                `date_departure`) 
            VALUES (
                null,
                $package_id,
                $type_id,
                $number_of_person,
                '$contact_person',
                '$email',
                '$contact_number',
                '$country_origin',
                '$instruction',
                '$booked_date',
                '$date_departure'
                )";


    if (!mysqli_query($conn, $sql)) {
        echo "<br> THERE WAS AN ERROR SAVING THE RECORD! : <br>";
        echo $sql . "<br>";
        echo mysqli_error($conn) . "<br>";
    } else {
        sendMessage(mysqli_insert_id($conn));
        header("location: book_complete.php");
    }

    if ($sendMessage) {
    }
} else {
    echo "<h2> Could not process your request.</h2>";
    echo "<p> Missing package id. </p>";
}

function sendMessage($id)
{

    global $conn;
    $sql = "SELECT 
    p.package_name as package_name,
     pt.type_name as type_name,
     b.number_of_person as number_of_person,
     b.contact_person as contact_person,
     b.contact_number as contact_number,
     b.email as email,
     b.country_origin as country_origin,
     b.instruction as instruction,
     b.booked_date as booked_date,
     b.date_departure as date_departure
     FROM booking b
     JOIN package p ON p.package_id = b.package_id
     JOIN package_type pt ON pt.type_id = b.type_id
     WHERE b.book_id=" . $id;

    $result = mysqli_query($conn, $sql);

    $isFound = true;
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
    } else {
        echo mysqli_error($conn);
        $isFound = false;
    }

    if ($isFound) {

        $phpmailer = new \SendGrid\Mail\Mail();
        $phpmailer->setFrom(EMAIL_SENDER, NAME_SENDER);
        $phpmailer->setSubject("Lakbay Travel and Tour");
        $phpmailer->addTo($row['email'], $row['contact_person']);
        $phpmailer->addContent(
            "text/html",
            " <p style='font-family:Segoe UI;'>
                Dear {$row['contact_person']},<br>
                we have received your inquiry.<br>
                We are greatful that you chose our service!<br>
                <br>
                Below are your package Details.<br>
                We are pleased to serve you! Thank you for choosing Lakbay Travel and Tour!
            </p>
            <div class='container' style='display:block; width: 100%; max-width:800px; margin: auto; background:#E4F3FA; border-radius: 15px; padding: 15px'>
                <div style='max-width: 80%; margin:auto;'>
                    <h1 style='font-family:Segoe UI;'>Booked Details</h1>
                    <hr style='margin-bottom: 15px;'>
        
                    <label style='font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' for='package_name' style='font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;'> Package Name</label>
                    <input style='margin-bottom:15px; padding: 8px; font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' value='{$row['package_name']}' id='package_name' class='form-control' type='text' readonly>
        
        
                    <label style='font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' for='booked_date'> Booked Date</label>
                    <input style='margin-bottom:15px; padding: 8px; font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' value='{$row['booked_date']}' id='booked_date' class='form-control' type='text' readonly>
        
        
                    <label style='font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' for='date_departure'> Departure Date</label>
                    <input style='margin-bottom:15px; padding: 8px; font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' value='{$row['date_departure']}' id='date_departure' class='form-control  border border-warning' type='text' readonly>
        
                    <label style='font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' for='type_name'> Accomodation Type</label>
                    <input style='margin-bottom:15px; padding: 8px; font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' value='{$row['type_name']}' id='type_name' class='form-control' type='text' readonly>
        
                    <label style='font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' for='number_of_person'> Number of Person</label>
                    <input style='margin-bottom:15px; padding: 8px; font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' value='{$row['number_of_person']}' id='number_of_person' class='form-control' type='text' readonly>
        
        
                    <label style='font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' for='contact_person'> Contact Person</label>
                    <input style='margin-bottom:15px; padding: 8px; font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' value='{$row['contact_person']}' id='contact_person' class='form-control' type='text' readonly>
        
                    <label style='font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' for='contact_number'>Contact Number</label>
                    <input style='margin-bottom:15px; padding: 8px; font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' value='{$row['contact_number']}' id='contact_number' class='form-control' type='text' readonly>
        
                    <label style='font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' for='phpmailer'>Email Address</label>
                    <input style='margin-bottom:15px; padding: 8px; font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' value='{$row['email']}' id='email' class='form-control' type='text' readonly>
        
        
                    <label style='font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' for='country_origin'>Origin</label>
                    <input style='margin-bottom:15px; padding: 8px; font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' value='{$row['country_origin']}' id='country_origin' class='form-control' type='text' readonly>
        
        
                    <label style='font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' for='instruction'>Instruction</label>
                    <textarea style='font-family:Segoe UI, Roboto; display: block; width: 100%; font-size: 14pt;' class='form-control w-100' id='instruction' cols='30' rows='5' readonly>{$row['instruction']}</textarea>
                </div>
            </div>"
        );
        $sendgrid = new \SendGrid(SENDGRID_API_KEY);
        try {
            $response = $sendgrid->send($phpmailer);
            /* print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n"; */
        } catch (Exception $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
    }
}



mysqli_close($conn);
