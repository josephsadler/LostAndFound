 <?php
session_start();

if (isset($_POST['submit'])) 
{
	if (empty($_POST['user']) || empty($_POST['passw'])) 
	{
		$_SESSION['login_user']="invalid username or password";
	}
	else
	{

        $schema = "lostandfound";
        $username = "root";
        $password = "root";
        $myHost = "127.0.0.1";
        $conn = mysqli_connect($myHost,$username,$password,$schema);
        if(!$conn){
            echo "Connection was not successful";
            die("Connection failed you should feel bad: " . $conn->connect_error);
        }
            $name = $_POST['user'];
            $pass = $_POST['passw'];
            $sqlLogin = "select * from users where('admin' = userName && sha2('admin',256) = pass)";
            $result = $conn->query($sqlLogin);
            if(mysqli_num_rows($result) > 0){
                 $row = mysqli_fetch_assoc($result);
		$_SESSION['login_user']= $row["userName"];
            }
            else{
                $_SESSION['login_user']= "no user found";
            }
    
        }
}
         
        //the search function
        //function search()
        ?>