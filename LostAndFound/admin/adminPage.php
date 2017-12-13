
<?php
session_start();
// include ('logout.php');
// echo $_SESSION['login_user'];
// if (isset($_SESSION['login_user'])) {
//     if ($_SESSION['login_user'] == "logout") {
//         session_unset();
//         header("Location:index.php");
//         exit();
//     }
// }
?>
<html lang="en">
<head>
<title>TU Lost and Found</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet"
	href="/LostAndFound/LostAndFound/lostandfound.css">
<style>
/* Remove the navbar's default margin-bottom and rounded borders */
.navbar {
	margin-bottom: 0;
	border-radius: 0;
}

/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
.row.content {
	height: 450px
}

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
	.row.content {
		height: auto;
	}
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

@
-webkit-keyframes fadeIn {
	from {opacity: 0;
}

to {
	opacity: 1;
}

}
@
keyframes fadeIn {
	from {opacity: 0;
}

to {
	opacity: 1;
}
}
</style>

</head>

<body>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#myNavbar">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href=towson></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="http://localhost/LostAndFound/about.html">About</a></li>
					<li><a href="http://localhost/LostAndFound/pickupdesk.html">Pick up
							Desk</a></li>
					<li><a href="http://localhost/LostAndFound/contact.html">Contact</a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li><label for="search" class="ui-hidden-accessible"><br></label> <input
						type="text" name="search" id="searchbar" placeholder="Search">
						<button type="submit" class="btn btn-default" onclick="search()">
							<span class="glyphicon glyphicon-search"></span>
						</button></li>
					<script>
                function search(){
                    var searchfield = document.getElementById('searchbar').value;
                    alert("You searched " + searchfield);
                }
            </script>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<form class="form-signin" role="form"
							action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"
							method="post">
							<input type="submit" name="logOutSub" id="logOutSub"
								value="Logout">
						</form>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-12">
				<center>
					<h2>TOWSON UNIVERSITY LOST AND FOUND</h2>
				</center>
			</div>




			<script type="text/javascript" src="script.js"></script>

			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2 align="center">Admin Page</h2>
						<div class="pull-right">
							<button class="btn btn-success" data-toggle="modal"
								data-target="#add_new_item_modal">Create Item</button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h4>Current Items:</h4>
						<script>readItems();</script>
						<div class="items_content"></div>
					</div>
				</div>
			</div>

			<!-- Modal to add new item-->
			<div class="modal fade" id="add_new_item_modal" tabindex="-1"
				role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">Create New Item</h4>
						</div>
						<div class="modal-body">

							<div class="form-group">
								<label for="description">Item Name</label> <input type="text"
									id="description" placeholder="Item Name" class="form-control" />
							</div>

							<div class="form-group">
								<label for="location">Location Found</label> <input type="text"
									id="location" placeholder="Location Found" class="form-control" />
							</div>

							<div class="form-group">
								<label for="turnedIn">Date Turned In</label> <input type="date"
									id="turnedIn" placeholder="Date Turned In" class="form-control" />
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default"
								data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary" onclick="addItem()">Add
								Item</button>
						</div>
					</div>
				</div>
			</div>
			<!-- End of modal -->


			<!-- Modal - Update item details -->
			<div class="modal fade" id="update_item_modal" tabindex="-1"
				role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="myModalLabel">Update</h4>
						</div>
						<div class="modal-body">

							<div class="form-group">
								<label for="update_description">Description</label> <input
									type="text" id="update_description" placeholder="Description"
									class="form-control" />
							</div>

							<div class="form-group">
								<label for="update_location">Location</label> <input
									type="text" id="update_location" placeholder="Location"
									class="form-control" />
							</div>

							<div class="form-group">
								<label for="update_turnedIn">Date Turned In</label> <input
									type="text" id="update_turnedIn" placeholder="Date Turned In"
									class="form-control" />
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default"
								data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary"
								onclick="updateItemDetails()">Save Changes</button>
							<input type="hidden" id="hidden_item_id">
						</div>
					</div>
				</div>
			</div>
			<!-- End of modal -->

		</div>
	</div>

	<footer class="container-fluid text-center">
		<p>This is Towson University's lost and found admin page</p>
	</footer>
</body>
</html>

