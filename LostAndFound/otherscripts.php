<?php

 function checkUser($name, $conn){
             $sqlCheckUser = "select * from users where('$name' = userName)";
             $result = $conn->query($sqlCheckUser);
             if($result->num_rows == 0){
                 return true;
             }
                 return false;
         }
         
         function addUser($name,$pass,$conn){
             $sqlAddUser = "insert into users (userName, pass) values ('$name', sha2('$pass', 256));";
             $conn->query($sqlAddUser);
         }
         //add item to the database
         function addItem($description,$imagePath,$location,$conn){
             $date = date("Y-m-d");
             $sqlAddItem = "insert into items (description,imgPath,turnedIn,location,dibs) values ('$description','$imagePath',$date,'$location',false )";
             mysqli_query($conn, $sqlAddItem);
         }
         
         //delete item
         
         //call dibs on an item
        function dibs($itemNum){
             
        }
