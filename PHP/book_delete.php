<?php

include "../config/connection.php";

$sql = "DELETE FROM booking WHERE book_id = ".$_POST["book_id"];

if(!mysqli_query($conn, $sql)){
        echo "<br> THERE WAS AN ERROR DELETING THE RECORD! : <br>";
        echo $sql . "<br>";
        echo mysqli_error($conn) . "<br>";
}