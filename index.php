<?php
  session_start();
  if (isset($_SESSION["id"])) {
    header("Location: home.php");
  } else if (!empty($_POST["username"])) {
    $db_connection = pg_connect("host=localhost dbname=homework7 user=homework7 password=homework7");
    $id_query = "SELECT id FROM users WHERE username='".$_POST["username"]."'";
    $result = pg_query($db_connection, $id_query);
    if (pg_num_rows($result) == 0) {
      $query = "INSERT INTO users (username, registration) VALUES ('".$_POST["username"]."', CURRENT_TIMESTAMP)";
      pg_query($db_connection, $query);
      $result = pg_query($db_connection, $id_query);
    }
    $_SESSION["id"] = pg_fetch_result($result, 0, "id");
    $_SESSION["username"] = $_POST["username"];
    header("Location: home.php");
  }
  include "page-views.php";
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
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
  <?php
    if (isset($_SESSION["logout"])) {
      unset($_SESSION["logout"]);
      echo '<p style="color:#c0c0c0">You have been logged out.</p>';
    }
  ?>
    <h1>Login</h1>
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
  <!-- JS for the navbar collapse -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
