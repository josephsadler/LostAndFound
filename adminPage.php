<!DOCTYPE html>
<?php
        session_start();
        include('logout.php');
        echo $_SESSION['login_user'];
        if(isset($_SESSION['login_user'])){
        if($_SESSION['login_user'] == "logout"){
                     session_unset(); 
                     header("Location:index.php");
                    exit();
                }
	}
        ?>
<html lang="en">
<head>
  <title>Lost and Found v1.0</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="lostfound.css">
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
  
  <style>
     .dibs {
         position: relative;
        display: inline-block;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
        .dibs .dibstext {
    visibility: hidden;
    width: 160px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
}
.dibs .dibstext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}
.dibs .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
}
@-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
}
@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
}
  </style>
  
</head>
 
<body background="towson2.jpg">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <a class="navbar-brand" href=towson></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="http://localhost/LostAndFound/about.html">About</a></li>
        <li><a href="http://localhost/LostAndFound/pickupdesk.html">Pick up Desk</a></li>
        <li><a href="http://localhost/LostAndFound/contact.html">Contact</a></li>
      </ul>
        <ul class="nav navbar-nav">
            <li>
                <label for="search" class="ui-hidden-accessible"><br></label>
                <input type="text" name="search" id="searchbar" placeholder="Search">
                <button type="submit" class="btn btn-default" onclick="search()"><span class="glyphicon glyphicon-search"></span></button>
            </li>
            <script>
                function search(){
                    var searchfield = document.getElementById('searchbar').value;
                    alert("You searched "+searchfield);
                }
            </script>
        </ul>
      <ul class="nav navbar-nav navbar-right">
          <li>
          <form class = "form-signin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
          <input type="submit" name="logOutSub" id="logOutSub" value="Logout">
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">    
  <div class="row justify-content-center">
      <div class="col-12">
          <center><h2>TOWSON UNIVERSITY LOST AND FOUND</h2></center>
      </div>
  </div>
    <div class ="row justify-content-between" align="center">
        <a class ="col-3 btn btn-primary" href="#" role="button" id="img1" onclick="dibsPopUp1()">
            <span class="dibs" id="dibs1">Click me to dibs</span>
            <div>
                <img src="catImage1.jpg" alt="Image 1" height="195" width="195">
                <p><br>Hey I describe the image 1</p>
            </div>
            
        </a>
        <a class ="col-3 btn btn-primary" href="#" role="button" id="img2">
            <span class="dibs" id="dibs1">Click me to dibs</span>
           <div>
                <img src="catImage2.jpg" alt="Image 2" height="195" width="195">
                <p><br>Hey I describe the image 2</p>
            </div>
        </a>
        <a class ="col-3 btn btn-primary" href="#" role="button" id="img3">
            <span class="dibs" id="dibs1">Click me to dibs</span>
            <div>
                <img src="catImage3.jpg" alt="Image 3" height="195" width="195">
                <p><br>Hey I describe the image 3</p>
            </div>
        </a>
         
        
    </div>
    <br>
    <div class ="row justify-content-between" align="center">
        <a class ="col-3 btn btn-primary" href="#" role="button" id="img4">
            <span class="dibs" id="dibs1">Click me to dibs</span>
            <div>
                
                <img src="catImage4.jpg" alt="Image 5" height="195" width="195">
                <p><br>Hey I describe the image 4</p>
            </div>
            
        </a>
        <a class ="col-3 btn btn-primary" href="#" role="button" id="img5">
            <span class="dibs" id="dibs1">Click me to dibs</span>
           <div>
                <img src="catImage5.jpg" alt="Image 5" height="195" width="195">
                <p><br>Hey I describe the image 5</p>
            </div>
        </a>
        <a class ="col-3 btn btn-primary" href="#" role="button" id="img6">
            <span class="dibs" id="dibs1">Click me to dibs</span>
            <div>
                <img src="catImage6.jpg" alt="Image 6" height="195" width="195">
                <p><br>Hey I describe the image 6</p>
            </div>
        </a>
        <script>
    function dibsPopUp1(){
        var dibs1 = document.getElementById("img1");
        dibs1.classList.toggle("show");
    }
    function dibsPopUp2(){
        var dibs2 = document.getElementById("img2");
        dibs2.classList.toggle("show");
    }
    function dibsPopUp3(){
        var dibs3 = document.getElementById("img3");
        dibs3.classList.toggle("show");
    }
    function dibsPopUp4(){
        var popup4 = document.getElementById("img4");
        popup4.classList.toggle("show");
    }
    function dibsPopUp5(){
        var popup5 = document.getElementById("img5");
        popup5.classList.toggle("show");
    }
    function dibsPopUp6(){
        var popup6 = document.getElementById("img6");
        popup6.classList.toggle("show");
    }
    
    </script>
    </div>

    <button data-inline="true" id="next">Next</button>
</div>
    
    

<footer class="container-fluid text-center">
  <p>This is Towson University lost and found web page</p>
</footer>
</body>
</html>



