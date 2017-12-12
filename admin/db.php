<?php
 
// Connection variables 
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "dibs";
 
// Connect to database
$con = new mysqli($host, $user, $password, $database);
 
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
 
?>