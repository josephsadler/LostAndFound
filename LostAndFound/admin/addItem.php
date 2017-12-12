<?php
    if(isset($_POST['description']) && isset($_POST['location']) && isset($_POST['turnedIn']))
    {
        include("db.php");
 
        // get values 
        $description = $_POST['description'];
        $location = $_POST['location'];
        $turnedIn = $_POST['turnedIn'];
 
        $query = "INSERT INTO items(description, location, turnedIn) VALUES('$description', '$location', '$turnedIn')";
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
        echo "Item Added!";
    }
?>