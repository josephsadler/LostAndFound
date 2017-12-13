
<?php
// include Database connection file
include("db.php");
// check request
if(isset($_POST['itemID']) && isset($_POST['itemID']) != "")
{

    // get item id
    $item_id = $_POST['itemID'];

    // delete item
    $query = "DELETE FROM items WHERE itemID = '$item_id'";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
}
?>
