<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "avianca";


$conn = new mysqli($servername, $username, $password, $dbname);


function closeConnection($conn) { $conn->close();
}

?>
