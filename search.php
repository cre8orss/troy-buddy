<!DOCTYPE html>
<html lang="en">

<head>
  <title>TroyBuddy | Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="assets/style.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="assets/script.js"></script>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-sm navbar-dark justify-content-center sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="assets/images/TroyBuddy-logos_transparent.png" alt="TroyBuddy logo" height="48">
      </a>
      <ul class="navbar-nav">
        <!-- Navbar links -->
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="bi bi-house"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="suggest.php"><i class="bi bi-lightbulb"></i>Suggest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="explore.php"><i class="bi bi-binoculars"></i>Explore</a>
        </li>
        <li>
          <a class="nav-link active" href="search.php"><i class="bi bi-search"></i>Search</a>
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

  <!-- Branding/Logo -->
  <img id="search-logo" src="assets/images/TroyBuddy-logos_black.png" alt="TroyBuddy logo">
  
  <!-- Search Bar -->
  <form method="post">
    <div class="form-group">
      <input type="search" name="search" class="form-control rounded" id="search-bar" aria-label="Search" aria-describedby="search-addon" placeholder="Search Troy...">
    </div>
    <button type="submit" id="search-btn" class="btn btn-outline-primary" name="submit">
      <img id="search-icon" src="assets/images/baseline_search_black_24dp.png" alt="search icon"></img>
      Search
    </button>
  </form>
</body>

</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=troybuddy",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `search_locations` WHERE name = '$str'");

	$sth -> setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<table class="form-control search_table">
			<tr>
				<th>Name: </th>
				<td><?php echo $row->name; ?></td>
			</tr>
			<tr>
				<th>Address: </th>
				<td><?php echo $row->address;?></td>
			</tr>
            <tr>
				<th>Phone: </th>
				<td><a href="tel:<?php echo $row->phone;?>"><?php echo $row->phone;?></a></td>
			</tr>
            <tr>
				<th>Website: </th>
				<td><a href="<?php echo $row->website;?>"><?php echo $row->website;?></a></td>
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo '<script>alert("Location is not in the TroyBuddy Database.")</script>';
		}


}

?>
