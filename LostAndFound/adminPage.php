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
  <link rel="stylesheet" href="lostandfound.css">
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
    table, tr, th, td {
        border: 1px solid #e3e3e3;
        padding: 10px;
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
 
<body>

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
      
      
      
      
      
   
   
   
 <!--  <div id = "create" style="display:none"> -->  
<!--    <h3>Create new item</h3> -->
<!--    <p><strong>Please fill in the form and click save.</strong></p> -->
<!--    <div id="message"></div> -->
<!--     <form name='form1'> -->
<!--       <table align = ""> -->
<!--         <tr><td></td></tr> -->
<!--          <tr> -->
<!--             <td> -->
<!--               <label>Item Name:</label>&nbsp; -->
<!--             </td> -->
<!--             <td> -->
<!--               <input type='text' placeholder='Item Name' name='description' id= 'description' required ><br /> -->
<!--             </td> -->
<!--           </tr> -->
<!--           <tr> -->
<!--             <td> -->
<!--                 <label>Location:</label>&nbsp; -->
<!--             </td> -->
<!--             <td> -->
<!--               <input type='text' placeholder='Location' name='location' id='location' required ><br /> -->
<!--             </td> -->
<!--           </tr> -->
<!--           <tr> -->
<!--             <td> -->
<!--               <label>Date Turned In:</label>&nbsp; -->
<!--             </td> -->
<!--             <td> -->
<!--               <input type='date' name='turnedIn' placeholder='Date Turned In' id='turnedIn' required ><br /> -->
<!--             </td> -->
<!--           </tr> -->
<!--           <tr> -->
<!--             <td>&nbsp;</td> -->
<!--             <td> -->
<!--               <input class='btn' type="button" id = "saveitem" value = "Save" /> -->
<!--             </td> -->
<!--           </tr> -->
<!--         </table> -->
<!--     </form> -->
<!--   </div> -->
  
  <button id="showcreate" onclick="location.href='create_item.html'">Create Item</button>
  
<!-- <!--   <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script> -->
<!-- <!--   <script type="text/javascript"> -->
<!-- //     $(function(){ -->
<!-- //         $("#saveitem").on('click', function(){ -->
<!-- //             var description  = $("#description").val(); -->
<!-- //             var location   = $("#location").val(); -->
<!-- //             var turnedIn       = $("#turnedIn").val(); -->

<!-- //             $.ajax({ -->
<!-- //               method: "POST", -->
<!-- //               url:    "save_info.php", -->
<!-- //               data: { "description": description, "location": location, "turnedIn": turnedIn}, -->
<!-- //              }).done(function( data ) { -->
<!-- //                 var result = $.parseJSON(data); -->
<!-- //                 var str = ''; -->
<!-- //                 var cls = ''; -->
<!-- //                 if(result == 1) { -->
<!-- //                   str = 'User record saved successfully.'; -->
<!-- //                   cls = 'success'; -->
<!-- //                 }else if( result == 2) { -->
<!-- //                   str = 'All fields are required.'; -->
<!-- //                   cls = 'error'; -->
<!-- //                 }else{ -->
<!-- //                   str = 'User data could not be saved. Please try again'; -->
<!-- //                   cls = 'error'; -->
<!-- //                 } -->
<!-- //               $("#message").show(3000).html(str).addClass('success').hide(5000); -->
<!-- //           }); -->
<!-- //        }); -->
<!-- //      }); -->

<!--   </script> -->
  
  
      
      
      
      
      

<div class = "container" > 

        <h3><u>Lost Items Submitted</u></h3>

        <p><strong>Click on the button to display lost items.</strong></p> 
        
        <div id="item"></div>  
    </div> 

    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
   
    <script type="text/javascript"> 

         $(function(){ 

//           $("#getitems").on('click', function(){ 
	$(document).ready(function () {

          $.ajax({ 

            method: "GET", 
            
            url: "get_info.php",

          }).done(function(data) { 

            var result= $.parseJSON(data); 

            var string='<table width="100%"><tr> <th>#</th><th>Item</th> <th>Location</th> <th>Date Turned In</th></tr>';
     
           /* from result create a string of data and append to the div */
          
            $.each(result, function(key, value) { 
              
			string += "<tr> <td>" + value['itemID'] + "</td> <td>" + value['description'] + "</td> <td>" + value['location'] + "</td> <td>" + value['turnedIn'] + "</td> </tr>"; 
                  }); 

                 string += '</table>'; 

              $("#item").html(string); 
           }); 
        }); 
    }); 
    </script> 
    
      </div>
    <button data-inline="true" id="next">Next</button>
</div>

<footer class="container-fluid text-center">
  <p>This is Towson University's lost and found admin page</p>
</footer>
</body>
</html>



