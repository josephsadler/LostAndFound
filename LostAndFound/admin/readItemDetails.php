
<?php
// include Database connection file
include("db.php");
 
// check request
if(isset($_POST['itemID']) && isset($_POST['itemID']) != "")
{
    // get item id
    $item_id = $_POST['itemID'];
 
    // get item details
    $query = "SELECT * FROM items WHERE itemID = '$item_id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
?>