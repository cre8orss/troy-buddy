<!DOCTYPE html>
<html lang="en">

<head>
  <title>TroyBuddy | Login</title>
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
          <a class="nav-link active" href="login.php"><i class="bi bi-box-arrow-in-right"></i>Log In</a>
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

  <br>
  <div class="container">
    <form class="needs-validation" action="db.php" method="post">
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
        <div class="mb-3">
            <label for="input-email" class="form-label">Email</label>
            <input name="username" type="email" class="form-control" id="input-email" aria-describedby="email-help" required placeholder="Enter your email.">
        </div>
        <div class="mb-3">
            <label for="password-email" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="input-password" name="up2" aria-describedby="password-help" required placeholder="Enter your password">
        </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>
