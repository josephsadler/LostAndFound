<?php

$host         = "localhost";
$username     = "smiko1";
$password     = "";
$dbname       = "dibs";
$result = 0;

/* Create connection */
$conn = new mysqli($host, $username, $password, $dbname);
/* Check connection */
if ($conn->connect_error) {
    die("Connection to database failed: " . $conn->connect_error);
}

/* Get data from Client side using $_POST array */
$description  = $_POST['description'];
$location  = $_POST['location'];
$turnedIn  = $_POST['turnedIn'];
/* validate whether user has entered all values. */
if(!$description || !$location || !$turnedIn){
    $result = 2;
else {
    //SQL query to get results from database
    
    $sql    = "insert into items (description, location, turnedIn) values (?, ?, ?)  ";
    $stmt   = $conn->prepare($sql);
    $stmt->bind_param('sss', $description, $location, $turnedIn);
    if($stmt->execute()){
        $result = 1;
    }
}
echo $result;
$conn->close();

?>
