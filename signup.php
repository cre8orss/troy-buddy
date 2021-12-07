<?php
session_start();

/**
 * Include ircmaxell's password_compat library.
 */
require 'lib/password.php';

$dbhost= "localhost";
$dbusername= "root";
$dbpassword = "";
$dbname = "troybuddy";

$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
if (!$conn) {
    echo "Connection failed!";
}

if (isset($_POST['username']) && isset($_POST['password'])) {
  function validate($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
  }

  $uname = validate($_POST['username']);
  $pass = validate($_POST['password']);

  if (empty($uname) || empty($pass)) {
    header("Location: login.php?error=User Name/Password is required");
    exit();
  } else {
    $sql = "SELECT * FROM users WHERE username = '$uname'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      header('Location: login.php?error=That username already exists!');
      exit();
    } else {
      //Hash the password as we do NOT want to store our passwords in plain text.
      $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
      $sql = "INSERT INTO users (username, password) VALUES ('$uname', '$passwordHash')";
      $result = mysqli_query($conn, $sql);
      //If the signup process is successful.
      if($result){
        //What you do here is up to you!
        echo 'Thank you for registering with our website.';
        header("Location: index.php");
        exit();
      }
    }   
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>TroyBuddy | Sign Up</title>
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
          <a class="nav-link" href="search.php"><i class="bi bi-search"></i>Search</a>
        </li>
        <li>
          <a class="nav-link" href="login.php"><i class="bi bi-box-arrow-in-right"></i>Log In</a>
        </li>
        <li>
          <a class="nav-link active" href="signup.php"><i class="bi bi-pencil-square"></i>Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reportaproblem.php"><i class="bi bi-binoculars"></i>Report A Problem</a>
        </li>
      </ul>
    </div>

  </nav>

  <br>
  <div class="container">
    <form>
        <div class="mb-3">
            <label for="input-name" class="form-label">First Name</label>
            <input type="name" class="form-control" id="input-name" aria-describedby="name-help" required placeholder="Enter your first name.">
        </div>
        <div class="mb-3">
            <label for="input-name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="input-name" aria-describedby="name-help" required placeholder="Enter your last name.">
          </div>
        <div class="mb-3">
            <label for="input-email" class="form-label">Email</label>
            <input type="email" class="form-control" id="input-email" aria-describedby="email-help" required placeholder="Enter your email.">
        </div>
        <div class="mb-3">
            <label for="password-email" class="form-label">Password</label>
            <input type="password" class="form-control" id="input-password" name="up2" aria-describedby="password-help" required placeholder="Enter your password">
        </div>
        <button type="submit" name="register" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>
