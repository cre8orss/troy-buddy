<!DOCTYPE html>
<html lang="en">
<head>
    <title>TroyBuddy | Concerns Successfully Sent</title>
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
        <li class="nav-item">
          <a class="nav-link" href="search.php"><i class="bi bi-search"></i>Search</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="bi bi-box-arrow-in-right"></i>Log In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php"><i class="bi bi-pencil-square"></i>Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="mailinglist.php"><i class="bi bi-envelope"></i>Mailing List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="reportaproblem.php"><i class="bi bi-binoculars"></i>Report A Problem</a>
        </li>
      </ul>
    </div>

  </nav>


<?php

error_reporting(0);
$first_name = $_POST['Fname'];
$last_name = $_POST['Lname'];
$email = $_POST['emailaddress'];

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=troybuddy", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
  try {
    $stmt = $conn->prepare("INSERT INTO `mailing_list`(`email`, `first_name`, `last_name`) VALUES ('$email','$first_name','$last_name')");
    $stmt->execute();

    echo "<div class='container mt-5 w-50'><p> You have been successfully added to the mailing list.</p>";
    echo "<a href='index.php'><button type='goback' class='btn btn-danger btn-lg'>Return to Home Page</button></a></div>";
    } catch (PDOException $e) {
      echo "<div class='container mt-5 w-50'><p>You have already been added to the mailing list.</p>";
      echo "<a href='index.php'><button type='goback' class='btn btn-danger btn-lg'>Return to Home Page</button></a>";
    }
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
?>
    
<div class="w-50 mt-5 container">
    <p> You have been successfully added to the mailing list.</p>
    <a href="index.php"><button type="goback" class="btn btn-danger btn-lg">Return to Home Page</button></a>
</div>
</body>
</html>
