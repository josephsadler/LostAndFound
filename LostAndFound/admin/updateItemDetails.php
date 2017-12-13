
<?php
// include Database connection file
include("db.php");
 
// check request
if(isset($_POST))
{
    // get values
    $itemID = $_POST['itemID'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $turnedIn = $_POST['turnedIn'];
 
    // update item details
    $query = "UPDATE items SET description = '$description', location = '$location', turnedIn = '$turnedIn' WHERE itemID = '$itemID'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}