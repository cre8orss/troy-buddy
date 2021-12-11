<!DOCTYPE html>
<html lang="en" id="rap">

  <head>
    <title>TroyBuddy | Report A Problem</title>
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
          <a class="nav-link" href="mailinglist.php"><i class="bi bi-envelope"></i>Mailing List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="reportaproblem.php"><i class="bi bi-binoculars"></i>Report A Problem</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="bi bi-box-arrow-in-right"></i>Log In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signup.php"><i class="bi bi-pencil-square"></i>Sign Up</a>
        </li>
      </ul>
    </div>

  </nav>

<div class="w-50 container">
    <h4 class="mt-5 display-3">Concerns? Fill Out This Form</h4>
    <form class="container mt-5 border-0 rounded needs-validation novalidate" action="email.php">
        <br>
        <div class="form-group my-3 position-relative">
            <label for="Fname" class="fs-5">First Name</label>
            <input type="text" class="form-control form-control-lg border-danger" placeholder="Required" id="Fname" name="Fname" required>
        </div>
        <div class="form-group my-3">
            <label for="LName" class="fs-5">Last Name</label>
            <input type="text" class="form-control form-control-lg input border-danger" placeholder="Required" id="LName" name="Lname" required>
        </div>
        <div class="form-group my-3">
            <label for="emailaddress" class="fs-5">Email Address</label>
            <input type="email" class="form-control form-control-lg border-danger" placeholder="Required" id="emailaddress" name="emailaddress" required>
        </div>
        <div class="form-group my-3">
            <label for="msg" class="fs-5">How Can We Help You</label>
            <textarea class="form-control form-control-lg border-danger" id="msg" name="msg" rows="5"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-danger btn-lg">Submit</button>
        <br>
        <br>
    </form>
</div>
<div class="issues card w-50 container">
  <div class="card-body">
    <h5 class="card-title">Pending Issues</h5>
    <p>Bootleggers page info not up-to-date. Currently being resolved.</p>
    <p>Some users not receiving emails from mailing list. Currently being resolved.</p>
    <p>Need colorblind support.</p>
    <br>
    <h5 class="card-title">Resolved Issues</h5>
    <p>Waterworks page info not up-to-date. Resolved.</p>
    <p>Mailing List link not working. Resolved.</p>
  </div>
</div>
</body>

</body>
