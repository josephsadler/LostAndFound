<?php
    // Database connection file 
    include("db.php");
 
    $data = '<table class="table table-bordered table-striped">
                        <tr>
                            <th>No.</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Date Turned In</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>';
 
    $query = "SELECT * FROM items";
 
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
 
    if(mysqli_num_rows($result) > 0)
    {
        $number = 1;
        while($row = mysqli_fetch_assoc($result))
        {
            $data .= '<tr>
                <td>'.$number.'</td>
                <td>'.$row['description'].'</td>
                <td>'.$row['location'].'</td>
                <td>'.$row['turnedIn'].'</td>
                <td>
                    <button onclick="GetUserDetails('.$row['itemID'].')" class="btn btn-warning">Update</button>
                </td>
                <td>
                    <button onclick="DeleteUser('.$row['itemID'].')" class="btn btn-danger">Delete</button>
                </td>
            </tr>';
            $number++;
        }
    }
    else
    {

        $data .= '<tr><td colspan="6">Items not found!</td></tr>';
    }
 
    $data .= '</table>';
 
    echo $data;
?>