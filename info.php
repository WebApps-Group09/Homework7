<?php
  session_start();
  if (!isset($_SESSION["id"])) {
    header('Location: index.php');
  }
  include 'page-views.php';
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
    if (isset($_COOKIE["fname"])) {
      echo '<p>Welcome back, '.$_COOKIE["fname"].'</p>';
    } else {
      echo '<p>Hello Guest</p>';
    }
    echo '<p><a href=home.php>Return Home</a></p>'
  ?>
    <h1>Information</h1>
  <?php
    $agent = $_SERVER["HTTP_USER_AGENT"];
    if(preg_match('/Linux/',$agent)) $os = 'Linux';
    elseif(preg_match('/Win/',$agent)) $os = 'Windows';
    elseif(preg_match('/Mac/',$agent)) $os = 'Mac';
    else $os = 'Unknown';

    echo '<h3>OS Information</h3>';
    echo '<p>'.$os.'</p>';

    echo '<h3>Browser Information</h3>';
    echo $agent;
    $browser = get_browser($agent, true);
    print_r($browser);

    echo '<h3>Browser Langauge</h3>';
    $lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
    print_r($lang);

    echo '<h3>IP address</h3>';
    $clientip = '';
      if (getenv('HTTP_CLIENT_IP'))
        $clientip = getenv('HTTP_CLIENT_IP');
      else if(getenv('HTTP_X_FORWARDED_FOR'))
        $clientip = getenv('HTTP_X_FORWARDED_FOR');
      else if(getenv('HTTP_X_FORWARDED'))
        $clientip = getenv('HTTP_X_FORWARDED');
      else if(getenv('HTTP_FORWARDED_FOR'))
        $clientip = getenv('HTTP_FORWARDED_FOR');
      else if(getenv('HTTP_FORWARDED'))
        $clientip = getenv('HTTP_FORWARDED');
      else if(getenv('REMOTE_ADDR'))
        $clientip = getenv('REMOTE_ADDR');
      else
        $clientip = 'UNKNOWN';
      print_r($clientip);

    echo '<h3>HTTPS Usage</h3>';
    if ($_SERVER["HTTPS"])
      print_r('You are using https');
    else
      print_r('You are not using https');

    echo '<h3>Current Server Timestamp</h3>';
    echo '<p>'.date('Y-m-d H:i:s').'</p>';

    echo '<h3>Total Page Visits</h3>';
    echo '<p><strong>Index Views:</strong> '..'<p>';
    echo '<p><strong>Profile-Edit Views:</strong> '..'<p>';
    echo '<p><strong>Profile Views:</strong> '..'<p>';
  ?>
  </div>
  <!-- JS for the navbar collapse -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
