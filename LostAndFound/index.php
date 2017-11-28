
<?php
        //login the admin
        
        //checking to see if the username already exists
        function login(){
            $conn = getConn();
            $name = $_POST['usrnm'];
            $pass = $_POST['pswd'];
            $sqlLogin = "select * from users where('$name' = userName && sha2('$pass',256)";
            $result = $conn->query($sqlLogin);
            if($result->num_rows == 0){
                 return true;
             }
                 return false;
        }
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
        function getConn(){
            $schema = "lostandfound";
        $username = "root";
        $password = "root";
        $myHost = "127.0.0.1";
        $conn = mysqli_connect($myHost,$username,$password,$scheme);
        if(!$conn){
            echo "Connection was not successful";
            die("Connection failed you should feel bad: " . $conn->connect_error);
        }
        return $conn;
        }
         
        //the search function
        //function search()
        
        ?>