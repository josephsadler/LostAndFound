

<?php

error_reporting(E_ALL & ~E_NOTICE);
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'dibs';

$conn = new mysqli($host, $user, $pass, $db) or die("Unable to connect to the database");


$search = mysqli_real_escape_string($conn, $_POST["text"]);
$query = "select * from items "
        . "where match(description, location) against('$search' in natural language mode)";

$results = mysqli_query($conn, $query);

$numRows = count($results);

if ($numRows == 0) {
    echo 'No results found';
} else {
    echo $numRows . " results found for '" . $search . "'";
    echo '
                <table>
                    <tr>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Date Recovered</th> 
                        <th>Location</th> 
                    </tr>';

    while ($row = mysqli_fetch_array($results)) {
        echo '<tr><td>', $row[2], '</td>
                          <td>', $row[1], '</td>   
                          <td>', $row[3], '</td>
                          <td>', $row[4], '</td></tr>';
    }
    echo '</table>';
}
?>

