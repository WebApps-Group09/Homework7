<?php
  session_start();
  if (!isset($_SESSION["id"])) {
    header("Location: index.php");
  }
  include "page-views.php";
  include "get-profile.php";
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
          <input class="form-control" name="fname" id="inputFirstName" placeholder="First" type="text" value="<?php echo $fname; ?>" required/>
        </div>
        <div class="col-sm-5">
          <input class="form-control" name="lname" id="inputLastName" placeholder="Last" type="text" value="<?php echo $lname; ?>" required/>
        </div>
      </div>
      <div class="row form-group">
        <label class="col-sm-2 control-label">Address</label>
        <div class="col-sm-12">
          <input class="form-control" name="address" id="inputAddr" placeholder="Address" type="text" value="<?php echo $address; ?>" required/>
        </div>
      </div>
      <div class="row form-group">
        <div class="col-sm-4">
          <input class="form-control" name="city" id="inputCity" placeholder="City" type="text" value="<?php echo $city; ?>" required/>
        </div>
        <div class="col-sm-3">
          <input class="form-control" name="state" id="inputState" placeholder="State" type="text" value="<?php echo $state; ?>" required/>
        </div>
        <div class="col-sm-3">
          <input class="form-control" name="zip" id="inputZip" placeholder="Zip" type="text" value="<?php echo $zip; ?>" required/>
        </div>
      </div>
      <div class="row form-group">
        <label class="col-sm-2 control-label">Class</label>
        <div class="col-sm-5">
          <input class="form-control" name="dorm" id="inputDorm" placeholder="Dorm" type="text" value="<?php echo $dorm; ?>" required/>
        </div>
        <div class="col-sm-5">
          <input class="form-control" name="year" id="inputYear" placeholder="ex: Senior" type="text" value="<?php echo $year; ?>">
        </div>
      </div>
      <div class="row form-group">
        <label class="col-sm-2 control-label">Favorite Sports</label>
        <div class="col-sm-10" id="inputSports">
          <input type="checkbox" name="sports[]" value="iceskating" <?php if (strpos($sports, 'Ice Skating') !== false){echo 'checked';} ?> > Ice Skating<br>
          <input type="checkbox" name="sports[]" value="curling" <?php if (strpos($sports, 'Curling') !== false){echo 'checked';} ?> > Curling<br>
          <input type="checkbox" name="sports[]" value="ballet" <?php if (strpos($sports, 'Ballet') !== false){echo 'checked';} ?> > Ballet<br>
          <input type="checkbox" name="sports[]" value="tennis" <?php if (strpos($sports, 'Tennis') !== false){echo 'checked';} ?> > Tennis<br>
          <input type="checkbox" name="sports[]" value="golf" <?php if (strpos($sports, 'Golf') !== false){echo 'checked';} ?> > Golf<br>
          <input type="checkbox" name="sports[]" value="basketball" <?php if (strpos($sports, 'Basketball') !== false){echo 'checked';} ?> > Basketball<br>
          <input type="checkbox" name="sports[]" value="gymnastics" <?php if (strpos($sports, 'Gymnastics') !== false){echo 'checked';} ?> > Gymnastics<br>
          <br>
        </div>
      </div>
      <div class="row form-group">
        <label class="col-sm-2 control-label">Favorite Quote</label>
        <div class="col-sm-10">
          <input class="form-control" name="quote" id="inputQuote" placeholder="ex: Don't cry because it's over, smile because it happened." type="text" value="<?php echo $quote; ?>">
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
