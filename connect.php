<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "pblog";

// try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
// }
// catch(PDOException $e){
//    echo "Connection failed: " . $e->getMessage();
// }
?> 



<?php
// Database configuration
$host = 'localhost'; // Change this to your database host
$username = "root"; // Change this to your database username
$password = ''; // Change this to your database password
$dbname = 'pblog'; // Change this to your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
