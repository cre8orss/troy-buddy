<!DOCTYPE html>
<html lang="en">

<head>
  <title>TroyBuddy | Home</title>
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
    crossorigin="anonymous" defer></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous" defer></script>
  <script src="assets/script.js" defer></script>
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
          <a class="nav-link active" href="index.php"><i class="bi bi-house"></i>Home</a>
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
          <a class="nav-link" href="signup.php"><i class="bi bi-pencil-square"></i>Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reportaproblem.php"><i class="bi bi-binoculars"></i>Report A Problem</a>
        </li>
      </ul>
    </div>

  </nav>

  <div id="demo" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/images/bootleggers.png" alt="Bootleggers">
      </div>
      <div class="carousel-item">
        <img src="assets/images/troyMonument.png" alt="Troy Monument">
      </div>
      <div class="carousel-item">
        <img src="assets/images/uncleSamMonument-cropped.png" alt="Uncle Sam Monument">
      </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <br>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Explore Troy!</h1>
      </div>
    </div>
  </div>
  <br>

  <div class="row">
    <div class="leftcolumn">
      <div class="card" style="background-color: lightgray;">
        <p>
          Get to know the ins and outs of Troy through TroyBuddy's
          interface! From the hole-in-the-wall bars to histroically
          rich streets, TroyBuddy has it all!
        </p>
        <h4>About Troy</h4>
        <p>
          Located on the Hudson River, the City of Troy boasts exquisite
          architecture, excellent educational institutions, strong residential
          communities and a dynamic business culture, working together to create
          an environment that embraces its history while preparing for an even
          stronger future.
        </p>
        <p>
          No matter the season, the City of Troy has something for everyone to enjoy!
          There are dozens of family-friendly events, activities, live music, incredible
          cuisine, and recreational opportunities to experience during your next visit to Troy.
        </p>
        <p>The City also is proud of the tremendous quality of life offered to its
          residents. Troy is home to a number of family friendly attractions and
          events such as the historic Troy Savings Bank Music Hall, featuring world
          renowned acoustics and an eclectic array of concerts by national and
          international artists. Events like the Annual Troy Victorian Stroll transform
          the historic streets of downtown Troy into a magical stage of song, dance
          and family enjoyment, bringing the Victorian Era back to life. Free summer
          time festivals such as the River Street Festival, Rockin’ On The River, Chowder
          Fest and the Troy Pig Out offer fun for the entire family, all for free. The Arts
          Center of the Capital Region annually welcomes more 70,000 artists, patrons,
          students and performers at its 36,000-square-foot facility in Monument Square, or
          wholesome shopping at the Waterfront Farmer’s Market, Troy offers a variety of
          activities appealing to people of all ages and interests.</p>
      </div>
      <div class="card" style="background-color: #6c782e;">
        <h2>Join our Mailing List!</h2>
        <div class="container">
          <form>
            <div class="mb-3">
              <label for="input-name" class="form-label">Name</label>
              <input type="name" class="form-control" id="input-name" aria-describedby="name-help" required
                placeholder="Enter your name.">
            </div>
            <div class="mb-3">
              <label for="input-email" class="form-label">Email</label>
              <input type="email" class="form-control" id="input-email" aria-describedby="email-help" required
                placeholder="Enter your email.">
            </div>
            <button type="submit" class="btn btn-primary-1">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <div class="rightcolumn">
      <div class="card" style="background-color: #FDA909;">
        <h2>Now Trending</h2>
        <ol>
          <li><a href="https://www.troymarket.org/">Troy Farmer's Market</a></li>
          <li><a href="https://www.facebook.com/IronWorksGrill/">Iron Works Grill</a></li>
          <li><a href="https://rpi.edu/">Rensselaer Polytechnic Institute</a></li>
          <li><a href="https://www.troymusichall.org/">Troy Savings Bank Music Hall</a></li>
          <li><a
              href="https://www.newyorkupstate.com/capital-region/2016/01/uncle_sams_grave_where_is_it_what_to_expect_more_information.html">"Uncle"
              Sam Wilson Gravesite Oakwood Cemetery</a></li>
        </ol>
      </div>
      <div class="card" style="background-color: #263857;">
        <iframe
          src="https://www.meteoblue.com/en/weather/widget/three/troy_united-states-of-america_5141502?geoloc=fixed&nocurrent=0&noforecast=0&days=4&tempunit=FAHRENHEIT&windunit=MILE_PER_HOUR&layout=dark"
          frameborder="0" scrolling="NO" allowtransparency="true"
          sandbox="allow-same-origin allow-scripts allow-popups allow-popups-to-escape-sandbox"
          style="height: 586px"></iframe>
        <div>
          <!-- DO NOT REMOVE THIS LINK --><a
            href="https://www.meteoblue.com/en/weather/week/troy_united-states-of-america_5141502?utm_source=weather_widget&utm_medium=linkus&utm_content=three&utm_campaign=Weather%2BWidget"
            target="_blank"></a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
