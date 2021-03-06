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
  <title>Edit Profile</title>
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
          <li class="active"><a href="profile-edit.php">Edit Profile</a></li>
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
    <h1>Edit Profile</h1>
    <form method="post" action="set-profile.php">
      <div class="row form-group">
        <label class="col-sm-2 control-label">Full Name</label>
        <div class="col-sm-5">
          <input class="form-control" name="first_name" placeholder="First" type="text" value="<?php echo $first_name; ?>" required/>
        </div>
        <div class="col-sm-5">
          <input class="form-control" name="last_name" placeholder="Last" type="text" value="<?php echo $last_name; ?>" required/>
        </div>
      </div>
      <div class="row form-group">
        <label class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
          <input class="form-control" name="address" placeholder="Address" type="text" value="<?php echo $address; ?>" required/>
        </div>
      </div>
      <div class="row form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-4">
          <input class="form-control" name="city" placeholder="City" type="text" value="<?php echo $city; ?>" required/>
        </div>
        <div class="col-sm-3">
          <input class="form-control" name="state" placeholder="State" type="text" value="<?php echo $state; ?>" required/>
        </div>
        <div class="col-sm-3">
          <input class="form-control" name="zip" placeholder="Zip" type="number" value="<?php echo $zip; ?>" required/>
        </div>
      </div>
      <div class="row form-group">
        <label class="col-sm-2 control-label">Dorm/Year</label>
        <div class="col-sm-5">
          <input class="form-control" name="dorm" placeholder="Dorm" type="text" value="<?php echo $dorm; ?>" required/>
        </div>
        <div class="col-sm-5">
          <input class="form-control" name="year" placeholder="ex: Senior" type="text" value="<?php echo $year; ?>">
        </div>
      </div>
      <div class="row form-group">
        <label class="col-sm-2 control-label">Favorite Sports</label>
        <div class="col-sm-10">
          <input type="checkbox" name="sports[]" value="Ice Skating" <?php if(strpos($sports, 'Ice Skating') !== false){ echo 'checked'; } ?> > Ice Skating<br>
          <input type="checkbox" name="sports[]" value="Curling" <?php if(strpos($sports, 'Curling') !== false){ echo 'checked'; } ?> > Curling<br>
          <input type="checkbox" name="sports[]" value="Ballet" <?php if(strpos($sports, 'Ballet') !== false){ echo 'checked'; } ?> > Ballet<br>
          <input type="checkbox" name="sports[]" value="Tennis" <?php if(strpos($sports, 'Tennis') !== false){ echo 'checked'; } ?> > Tennis<br>
          <input type="checkbox" name="sports[]" value="Golf" <?php if(strpos($sports, 'Golf') !== false){ echo 'checked'; } ?> > Golf<br>
          <input type="checkbox" name="sports[]" value="Basketball" <?php if(strpos($sports, 'Basketball') !== false){ echo 'checked'; } ?> > Basketball<br>
          <input type="checkbox" name="sports[]" value="Gymnastics" <?php if(strpos($sports, 'Gymnastics') !== false){ echo 'checked'; } ?> > Gymnastics<br>
          <br>
        </div>
      </div>
      <div class="row form-group">
        <label class="col-sm-2 control-label">Favorite Quote</label>
        <div class="col-sm-10">
          <input class="form-control" name="quote" placeholder="ex: Don't cry because it's over, smile because it happened." type="text" value="<?php echo $quote; ?>">
        </div>
      </div>
      <div class="row form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
          <button type="submit" class="btn btn-secondary">Submit</button>
        </div>
      </div>
    </form>
  </div>
  <!-- JS for the navbar collapse -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
