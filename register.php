<?php 
session_start(); 

$dbhost= "localhost";
$dbusername= "root";
$dbpassword = "";
$dbname = "troybuddy";

$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
if (!$conn) {
    echo "Connection failed!";
}
if(isset($_POST['register'])) {
  function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

  $uname = validate($_POST['username']);
  $pass = validate($_POST['password']);
  $fname = validate($_POST['fname']);

  if (empty($uname)) {
    header("Location: signup.php?error=Email is required");
    exit();
  } else if(empty($pass)) {
    header("Location: signup.php?error=Password is required");
    exit();
  } else {
    //FIX: character check

    //check if username exists
    $sql = "SELECT * FROM users WHERE username ='$uname'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) === 1) { //exists
    //FIX: SHWO MESSAGE
      header("Location: signup.php?error=Email already taken");
      exit();
    } else { //doesn't exist
      //hash and salt the password so we don't store in plain text
      $opt = [ "cost" => 12];
      $hashed = password_hash($pass, PASSWORD_BCRYPT, $opt);
      //insert into database
      $sql = "INSERT INTO users (username, password, fname) VALUES ('$uname', '$hashed', '$fname')";
      $result = mysqli_query($conn, $sql);
      if($result){
        //successful registration
        header("Location: login.php");
        exit();
      }
    }
  }
}
?>