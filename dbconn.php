<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "dict_cube";

// Connect to the database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";


?>