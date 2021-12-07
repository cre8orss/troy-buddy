<?php

$user = 'root';
$pass = '';

// Create connection
$dbconn = new PDO("mysql:host=localhost;dbname=troybuddy", $user, $pass);

unset($_POST);
if (isset($_POST['suggestSubmit'])) {
	$loc_name = addslashes($_REQUEST['locationName']);
	$loc_desc = addslashes($_REQUEST['desc']);
	$loc_type = addslashes($_REQUEST['locationType']);
	$x_coor = $_REQUEST['longitude'];
	$y_coor = $_REQUEST['latitude'];

	printf('%s, %s, %s, %s, %s', $loc_name, $loc_desc, $loc_type, $x_coor, $y_coor);
	$sqlSuggest = "INSERT INTO troybuddy.locations (loc_name, loc_type, loc_desc, x_coor, y_coor) VALUES ('$loc_name','$loc_type','$loc_desc','$x_coor','$y_coor')";
	$stmtSuggest = $dbconn->query($sqlSuggest);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>TroyBuddy | Suggest</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
	<link href="assets/style.css" rel="stylesheet" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="assets/script.js" defer></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" />
	<script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.js"></script>
	<link href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js" integrity="sha512-c3Nl8+7g4LMSTdrm621y7kf9v3SDPnhxLNhcjFJbKECVnmZHTdo+IRO05sNLTH/D3vA6u1X32ehoLC7WFVdheg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<style>
		#map {
			position: absolute;
			top: 0;
			bottom: 0;
			width: 700px;
		}

		.marker {
			background-image: url("assets/images/mapbox-icon.png");
			background-size: cover;
			width: 50px;
			height: 50px;
			border-radius: 50%;
			cursor: pointer;
		}

		.mapboxgl-popup {
			max-width: 200px;
		}

		.mapboxgl-popup-content {
			text-align: center;
			font-family: "Open Sans", sans-serif;
		}

		.info {
			display: table;
			position: absolute;
			margin: 0px auto;
			word-wrap: anywhere;
			white-space: pre-wrap;
			padding: 10px;
			border: none;
			border-radius: 3px;
			font-size: 12px;
			text-align: center;
			color: #222;
			background: #fff;
		}
	</style>
</head>

<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-sm navbar-dark justify-content-center sticky-top">
		<div class="container">
			<a class="navbar-brand" href="index.html">
				<img src="assets/images/TroyBuddy-logos_transparent.png" alt="TroyBuddy logo" height="48" />
			</a>
			<ul class="navbar-nav">
				<!-- Navbar links -->
				<li class="nav-item">
					<a class="nav-link" href="index.html"><i class="bi bi-house"></i>Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="suggest.html"><i class="bi bi-lightbulb"></i>Suggest</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="explore.html"><i class="bi bi-binoculars"></i>Explore</a>
				</li>
				<li>
					<a class="nav-link" href="search.html"><i class="bi bi-search"></i>Search</a>
				</li>
				<li>
					<a class="nav-link" href="login.html"><i class="bi bi-box-arrow-in-right"></i>Log In</a>
				</li>
				<li>
					<a class="nav-link" href="signup.html"><i class="bi bi-pencil-square"></i>Sign Up</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="reportaproblem.html"><i class="bi bi-binoculars"></i>Report A Problem</a>
				</li>
			</ul>
		</div>
	</nav>

	<!-- Map with tracking marker-->
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<div id="map"></div>
			</div>
			<div class="col">
				<form method="POST" action="suggest.php">
					<div class="form-group">
						<label for="inputName">Location Name:</label>
						<input type="text" class="form-control" id="inputName" name="locationName" placeholder="Enter location name" />
					</div>
					<div class="form-group">
						<label for="inputLocationType">Location Type:</label>
						<input type="text" class="form-control" id="inputLocationType" name="locationType" placeholder="Enter location type" />
						<small id="inputLocationTypeHelp" class="form-text text-muted">Restaurant, monument, scenic view, etc.</small>
					</div>
					<div class="form-group">
						<label for="inputDesc">Description:</label>
						<input type="text" class="form-control" id="inputDesc" name="desc" placeholder="" />
					</div>

					<div class="form-group">
						<label for="inputLongitude">Longitude:</label>
						<input type="text" class="form-control" id="inputLongitude" name="longitude" placeholder="" />
					</div>
					<div class="form-group">
						<label for="inputLatitude">Latitude:</label>
						<input type="text" class="form-control" id="inputLatitude" name="latitude" placeholder="" />
					</div>
					<button type="submit" class="btn btn-primary" name="suggestSubmit">Submit</button>
				</form>
			</div>
		</div>
	</div>

	<!-- Displays the coordinates, to be use to add locations made by users -->
	<pre id="coordinates" class="info"></pre>

</body>

</html>