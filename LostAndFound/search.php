

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


    $rowNum = 0;

//    while ($row = mysqli_fetch_array($results)) {
//        if($numRows >2){
//        echo '<div class ="row justify-content-between" align="center">
//                <a class ="col-3 btn btn-primary" href="#" role="button" id="img1" onclick="dibsPopUp1()">
//                    <span class="dibs" id="dibs1">Click me to dibs</span>
//                    <div>
//                        <img src="catImage1.jpg" alt="Image 1" height="195" width="195">
//                        <p><br>Hey I describe the image 1</p>
//                    </div>
//
//                </a>
//                <a class ="col-3 btn btn-primary" href="#" role="button" id="img2">
//                    <span class="dibs" id="dibs1">Click me to dibs</span>
//                    <div>
//                        <img src="catImage2.jpg" alt="Image 2" height="195" width="195">
//                        <p><br>Hey I describe the image 2</p>
//                    </div>
//                </a>
//                <a class ="col-3 btn btn-primary" href="#" role="button" id="img3">
//                    <span class="dibs" id="dibs1">Click me to dibs</span>
//                    <div>
//                        <img src="catImage3.jpg" alt="Image 3" height="195" width="195">
//                        <p><br>Hey I describe the image 3</p>
//                    </div>
//                </a>
//
//
//            </div>';
//        $numRows-=3;
//        }
//        else if($numRows >1){
//            //2images priting
//        echo '<div class ="row justify-content-between" align="center">
//                <a class ="col-3 btn btn-primary" href="#" role="button" id="img1" onclick="dibsPopUp1()">
//                    <span class="dibs" id="dibs1">Click me to dibs</span>
//                    <div>
//                        <img src="catImage1.jpg" alt="Image 1" height="195" width="195">
//                        <p><br>Hey I describe the image 1</p>
//                    </div>
//
//                </a>
//                <a class ="col-3 btn btn-primary" href="#" role="button" id="img2">
//                    <span class="dibs" id="dibs1">Click me to dibs</span>
//                    <div>
//                        <img src="catImage2.jpg" alt="Image 2" height="195" width="195">
//                        <p><br>Hey I describe the image 2</p>
//                    </div>
//                </a>
//               
//            </div>';
//        $numRows-=2;
//        }else{
//            //only 1 image printing
//            $numRows--;
//        echo '<div class ="row justify-content-between" align="center">
//                <a class ="col-3 btn btn-primary" href="#" role="button" id="img1" onclick="dibsPopUp1()">
//                    <span class="dibs" id="dibs1">Click me to dibs</span>
//                    <div>
//                        <img src="catImage1.jpg" alt="Image 1" height="195" width="195">
//                        <p><br>Hey I describe the image 1</p>
//                    </div>
//
//                </a>
//            </div>';
//        }





    while ($row = mysqli_fetch_array($results)) {
        echo '<div class ="row justify-content-between" align="center">
            <a class ="col-3 btn btn-primary" href="#" role="button" id="img' . $rowNum . '" onclick="dibsPopUp1()">
               <span class="dibs" id="dibs1">Click me to dibs</span>
               <div> <img src=' . $row[2] . ' alt = "Could not load image" height="195" width="195">
                <p><br>' . $row[1] . '</p>
              </div></a>';

        $rowNum = $rowNum + 1;
    }
}
?>

