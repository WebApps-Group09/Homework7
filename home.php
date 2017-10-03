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
  <title>Home</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato|Roboto+Slab" rel="stylesheet" type="text/css">
  <link href="src/css/custom.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php">Homework 7</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile-edit.php">Edit Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="info.php">Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="activity.php">Activity</a>
        </li>
      </ul>
    </div>
  </nav>
<?php
  //TODO: retrieve info from db
?>
  <div class="container">
  <?php
    echo '<h1>Profile</h1>';
    echo '<h3>Full Name</h3>';
      echo '<p>'.$fname.' '.$lname.'</p>';
    echo '<h3>Address/Dorm</h3>';
      echo '<p>'.$address.' '.$dorm.'</p>';
    echo '<h3>City/State/Zip</h3>';
      echo '<p>'.$city.' '.$state.' '.$zip.'</p>';
    echo '<h3>Current Year</h3>';
      echo '<p>'.$year.'</p>';
    echo '<h3>Favorite Sports</h3>';
      foreach ($sports as $sport) {
        echo ' '.$sport;
      }
    echo '<h3>Favorite Quote</h3>';
      echo '<p>'.$quote.'</p>';
  ?>
  <br>
  <form method="post" action="logout.php">
    <button type="submit" class="btn btn-secondary">Logout</button>
  </form>
  </div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
