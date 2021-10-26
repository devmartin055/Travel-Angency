<?php
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'lakbay');

/* 000webhost */
/* define('HOST', 'localhost');
define('USERNAME', 'id17823717_marvelousmartin');
define('PASSWORD', 'M/mf^)T+6J{jaj{Y');
define('DATABASE', 'id17823717_lakbay'); */

/* inifityfree */
/* define('HOST', 'sql304.epizy.com');
define('USERNAME', 'epiz_30155649');
define('PASSWORD', '9acoRHMaUfRw');
define('DATABASE', 'epiz_30155649_lakbaydb');
 */



define("SENDGRID_API_KEY", "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");
define("NAME_SENDER", "Labkay Travel and Tour");
define("EMAIL_SENDER","lakbaytour@gmail.com");
define("REPLY_TO", "lakbaytour@gmail.com");

$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

function escapeString($string){
    global $conn;

    return (mysqli_real_escape_string($conn, $string));
}
