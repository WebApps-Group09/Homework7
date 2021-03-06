<?php
  session_start();
  if(!isset($_SESSION["id"])) {
    header("Location: index.php");
  }
  $_SESSION["page"] = "info";
  include "page-views.php";
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
  <title>Index</title>
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
          <li><a href="index.php">Profile</a></li>
          <li><a href="profile-edit.php">Edit Profile</a></li>
          <li class="active"><a href="info.php">Info</a></li>
          <li><a href="activity.php">Activity</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <h1>Welcome</h1>
  <?php
      echo "<p>Welcome back, ".$_SESSION["username"]."</p>";
  ?>
    <h1>Information</h1>
  <?php
    $agent = $_SERVER["HTTP_USER_AGENT"];

    echo "<h3>OS</h3>";
    if(strpos($agent, 'Linux')) {
      echo 'Linux';
    } else if(strpos($agent, 'Win')) {
      echo 'Windows';
    } else if(strpos($agent, 'Mac')) {
      echo 'Mac';
    } else {
      echo 'Unknown';
    }

    echo "<h3>Browser</h3>";
    if(strpos($agent, 'Chrome')) {
      echo 'Chrome';
    } else if(strpos($agent, 'Safari')) {
      echo 'Safari';
    } else if(strpos($agent, 'Opera')) {
      echo 'Opera';
    } else if(strpos($agent, 'Firefox')) {
      echo 'Firefox';
    } else if(strpos($agent, 'MSIE')) {
      echo 'Internet Explorer';
    } else {
      echo 'Unknown Browser';
    }

    echo "<h3>Langauge</h3>";
    $lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
    print_r($lang);

    echo "<h3>IP address</h3>";
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
    print_r($clientip);

    echo "<h3>HTTPS</h3>";
    if($_SERVER["HTTPS"]) {
      print_r("You are using https");
    } else {
      print_r("You are not using https");
    }

    echo "<h3>Timestamp</h3>";
    echo "<p>".date("Y-m-d H:i:s")."</p>";

    echo "<h3>Page Visits</h3>";
    $db_connection = pg_connect("host=localhost dbname=homework7 user=homework7 password=homework7");
    $query = "SELECT COUNT(*) FROM activity WHERE user_id= ".$_SESSION['id'].";";
    $result = pg_query($query);
    $views = pg_fetch_result($result, 0, "count");
    echo "<p>".$views."</p>";
    ?>
  </div>
  <!-- JS for the navbar collapse -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
