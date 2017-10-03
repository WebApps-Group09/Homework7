<?php
  session_start();
  if (isset($_SESSION["id"])) {
    header('Location: /home.php');
  } else if (!empty($_POST["username"])) {
    //TODO: check if the username exists, if not, create an entry in the db
    //TODO: log the user in
    $_SESSION["id"] = 0; //TODO: set session to id in db
    header('Location: /home.php');
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
  <div class="container">
    <h1>Login</h1>
  <?php
    if (isset($_POST["logout"])) {
      session_unset();
      echo '<p>You have been logged out.</p>'
    }
  ?>
    <form method="post" action="index.php">
      <div class="row form-group">
        <label class="col-sm-2 control-label" for="username">Username</label>
        <div class="col-sm-10">
          <input class="form-control" name="username" id="username" placeholder="username" type="text" required/>
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
