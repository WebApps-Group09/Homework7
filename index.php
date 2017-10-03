<?php
  session_start();
  if (isset($_SESSION["id"])) {
    header('Location: home.php');
  } else if (!empty($_POST["username"])) {
    //TODO: check if the username exists, if not, create an entry in the db
    //TODO: log the user in
    $_SESSION["id"] = 0; //TODO: set session to id in db
    header('Location: home.php');
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
  <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Homework 7</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Edit Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Info</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Activity</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <h1>Login</h1>
  <?php
    if (isset($_SESSION["logout"])) {
      unset($_SESSION["logout"]);
      echo '<p>You have been logged out.</p>';
    }
  ?>
    <form method="post" action="index.php">
      <div class="row form-group">
        <label class="col-sm-2 control-label" for="username">Username</label>
        <div class="col-sm-10">
          <input class="form-control" name="username" id="username" type="text" required/>
        </div>
      </div>
      <div class="row form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
          <button type="submit" class="btn btn-secondary">Login</button>
        </div>
      </div>
    </form>
  </div>
</body>
