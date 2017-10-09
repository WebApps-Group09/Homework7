<?php
  session_start();
  if(!isset($_SESSION["id"])) {
    header("Location: index.php");
  }
  include "page-views.php";
  include "get-profile.php";
    $clientip = "";
    if(getenv("HTTP_CLIENT_IP")) {
      $clientip = getenv("HTTP_CLIENT_IP");
    } else if(getenv("HTTP_X_FORWARDED_FOR")) {
      $clientip = getenv("HTTP_X_FORWARDED_FOR");
    } else if(getenv("HTTP_X_FORWARDED")) {
      $clientip = getenv("HTTP_X_FORWARDED");
    } else if(getenv("HTTP_FORWARDED_FOR")) {
      $clientip = getenv("HTTP_FORWARDED_FOR");
    } else if(getenv("HTTP_FORWARDED")) {
      $clientip = getenv("HTTP_FORWARDED");
    } else if(getenv("REMOTE_ADDR")) {
      $clientip = getenv("REMOTE_ADDR");
    } else {
      $clientip = "UNKNOWN";
    }
  $db_connection = pg_connect("host=localhost dbname=homework7 user=homework7 password=homework7");
  $query = "INSERT INTO activity (user_id,ip_address,time_stamp) VALUES (".$_SESSION['id'].", '".$clientip."', ".CURRENT_TIMESTAMP.");";//.date('Y-m-d H:i:s').");";
  pg_query($query);

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Home</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato|Roboto+Slab" rel="stylesheet" type="text/css">
  <link href="src/css/custom.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Profile</a></li>
          <li><a href="profile-edit.php">Edit Profile</a></li>
          <li><a href="info.php">Info</a></li>
          <li><a href="activity.php">Activity</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
  <?php
    echo "<h1>Profile</h1>";
    echo "<h3>Full Name</h3>";
      echo "<p>".$first_name." ".$last_name."</p>";
    echo "<h3>Address</h3>";
      echo "<p>".$address."</p>";
      echo "<p>".$city.", ".$state." ".$zip."</p>";
    echo "<h3>Dorm</h3>";
      echo "<p>".$dorm."</p>";
    echo "<h3>Current Year</h3>";
      echo "<p>".$year."</p>";
    echo "<h3>Favorite Sports</h3>";
      foreach(explode(":", $sports) as $sport) {
        echo $sport."<br>";
      }
    echo "<h3>Favorite Quote</h3>";
      echo "<p>".$quote."</p>";
  ?>
  </div>
  <!-- JS for the navbar collapse -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
