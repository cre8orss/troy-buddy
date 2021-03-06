<?php

$user = 'root';
$pass = '';

// Create connection
$dbconn = new PDO("mysql:host=localhost;dbname=troybuddy", $user, $pass);
$sqlLocTable = 'SELECT * FROM troybuddy.locations';
$stmtLocTable = $dbconn->query($sqlLocTable);
$rowsLocTable = $stmtLocTable->fetchAll();

// code that submits the location information into the database

// testing function to print out the entire locations table
if (isset($_POST['printAllLoc'])) {
	foreach ($rowsLocTable as $loc) {
		printf("%s %s %s %s %s <br>", $loc['loc_name'], $loc['loc_type'], $loc['loc_desc'], $loc['lng'], $loc['lat']);
	}
}

// reloads the locations from the locations table if for some reason they don't load in
if (isset($_POST['jsonReload'])) {
	$geojson = '{
		"type": "FeatureCollection",
		"features": [';

	foreach ($rowsLocTable as $loc) {
		$geojson .= '{
			"type": "Feature",
			 "geometry": {
				 "type": "Point",
				 "coordinates": [' . $loc['lng'] . ',' . $loc['lat'] . ']
			 },
			 "properties": {
				 "title": "' . $loc['loc_name'] . '",
				 "description": "' . $loc['loc_desc'] . '",
				"locationType": "' . $loc['loc_type'] . '"
			 }
		},';
	}
	$geojsonfinal = rtrim($geojson, ", ");
	$geojsonfinal .= ']}';

	// opens the geojson.json file, writes contents of geojsonfinal variable, and then closes file
	$myfile = fopen("assets/geojson.json", "w") or die("Unable to open file.");
	fwrite($myfile, $geojsonfinal);
	fclose($myfile);

	header("Refresh:0");
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
			<a class="navbar-brand" href="index.php">
				<img src="assets/images/TroyBuddy-logos_transparent.png" alt="TroyBuddy logo" height="48" />
			</a>
			<ul class="navbar-nav">
				<!-- Navbar links -->
				<li class="nav-item">
					<a class="nav-link" href="index.php"><i class="bi bi-house"></i>Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="suggest.php"><i class="bi bi-lightbulb"></i>Suggest</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="explore.php"><i class="bi bi-binoculars"></i>Explore</a>
				</li>
				<li>
					<a class="nav-link" href="search.php"><i class="bi bi-search"></i>Search</a>
				</li>
				<li>
					<a class="nav-link" href="login.php"><i class="bi bi-box-arrow-in-right"></i>Log In</a>
				</li>
				<li>
					<a class="nav-link" href="signup.php"><i class="bi bi-pencil-square"></i>Sign Up</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="mailinglist.php"><i class="bi bi-envelope"></i>Mailing List</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="reportaproblem.php"><i class="bi bi-binoculars"></i>Report A Problem</a>
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
				<div class="row">
					<!-- form that asks user to submit location name, type, and description
					longtitude and latitude are filled in by Mapbox pointer and not user -->
					<form method="POST" action="suggest.php">
						<div class="form-group">
							<label for="inputName">Location Name:</label>
							<input type="text" class="form-control" id="inputName" name="locationName" placeholder="Enter location name" />
						</div>
						<div class="form-group">
							<label for="inputLocationType">Location Type:</label>
							<select multiple class="form-control" id="inputLocationType" name="locationType">
								<option>Restaurant</option>
								<option>Monument</option>
								<option>Landmarks</option>
								<option>Student Hub</option>
								<option>Education</option>
								<option>Venues</option>
							</select>
							<small id="inputLocationTypeHelp" class="form-text text-muted">Click to choose</small>
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
						<button type="submit" class="btn btn-primary" name="jsonReload">Reload Map</button>
						<!-- <button type="submit" class="btn btn-primary" name="printAllLoc">Show entire database</button> -->
					</form>
				</div>
				<div class="row">
					<?php
					if (isset($_POST['suggestSubmit'])) {
						// Required field names
						$required = array('locationName', 'desc', 'locationType', 'longitude', 'latitude');

						// Loop over field names, make sure each one exists and is not empty
						$error = false;
						foreach ($required as $field) {
							if (empty($_POST[$field])) {
								$error = true;
							}
						}

						if ($error) {
							echo "All fields are required.";
						} else {
							$loc_name = addslashes($_REQUEST['locationName']); // the addslashes escapes characters that would otherwise create errors
							$loc_desc = addslashes($_REQUEST['desc']);
							$loc_type = addslashes($_REQUEST['locationType']);
							$lng = $_REQUEST['longitude'];
							$lat = $_REQUEST['latitude'];

							// inserts data into the locations table
							$sqlSuggest = "INSERT INTO troybuddy.locations (loc_name, loc_type, loc_desc, lng, lat) VALUES ('$loc_name','$loc_type','$loc_desc','$lng','$lat')";
							$stmtSuggest = $dbconn->query($sqlSuggest);

							// reads through entire locations table and generates the geojson.json file for the Mapbox API
							$geojson = '{
								"type": "FeatureCollection",
								"features": [';

							foreach ($rowsLocTable as $loc) {
								$geojson .= '{
									"type": "Feature",
									 "geometry": {
										 "type": "Point",
										 "coordinates": [' . $loc['lng'] . ',' . $loc['lat'] . ']
									 },
									 "properties": {
										 "title": "' . $loc['loc_name'] . '",
										 "description": "' . $loc['loc_desc'] . '",
										"locationType": "' . $loc['loc_type'] . '"
									 }
								},';
							}
							$geojsonfinal = rtrim($geojson, ", ");
							$geojsonfinal .= ']}';

							// opens the geojson.json file, writes contents of geojsonfinal variable, and then closes file
							$myfile = fopen("assets/geojson.json", "w") or die("Unable to open file.");
							fwrite($myfile, $geojsonfinal);
							fclose($myfile);

							header("Refresh:0");
						}
					}

					?>
				</div>
			</div>
		</div>
	</div>

	<!-- Displays the coordinates, to be use to add locations made by users -->
	<pre id="coordinates" class="info"></pre>

</body>

</html>
