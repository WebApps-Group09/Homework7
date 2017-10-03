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
  <title>Edit Profile</title>
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
        <li class="nav-item">
          <a class="nav-link" href="index.php">Profile</a>
        </li>
        <li class="nav-item active">
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
  <div class="container">
    <h1>Edit Profile</h1>
    <form method="post" action="home.php">
      <div class="row form-group">
        <label class="col-sm-2 control-label" for="inputName">Full Name</label>
        <div class="col-sm-5">
          <input class="form-control" name="fname" id="inputFirstName" placeholder="First" type="text" value="<?php if(isset($_COOKIE["fname"]) && !empty($_COOKIE["fname"])){echo $_COOKIE["fname"];}?>" required/>
        </div>
        <div class="col-sm-5">
          <input class="form-control" name="lname" id="inputLastName" placeholder="Last" type="text" value="<?php if(isset($_COOKIE["lname"]) && !empty($_COOKIE["lname"])){echo $_COOKIE["lname"];}?>" required/>
        </div>
      </div>
      <div class="row form-group">
        <label class="col-sm-2 control-label" for="inputAddr">Address/Dorm</label>
        <div class="col-sm-6">
          <input class="form-control" name="address" id="inputAddr" placeholder="Address" type="text" value="<?php if(isset($_COOKIE["address"]) && !empty($_COOKIE["address"])){echo $_COOKIE["address"];} ?>" required/>
        </div>
        <div class="col-sm-4">
          <input class="form-control" name="dorm" id="inputDorm" placeholder="Dorm" type="text" value="<?php if(isset($_COOKIE["dorm"]) && !empty($_COOKIE["dorm"])){echo $_COOKIE["dorm"];} ?>" required/>
        </div>
      </div>
      <div class="row form-group">
        <label class="col-sm-2 control-label" for="inputLoc">City/State/Zip</label>
        <div class="col-sm-4">
          <input class="form-control" name="city" id="inputCity" placeholder="City" type="text" value="<?php if(isset($_COOKIE["city"]) && !empty($_COOKIE["dorm"])){echo $_COOKIE["city"];} ?>" required/>
        </div>
        <div class="col-sm-3">
          <input class="form-control" name="state" id="inputState" placeholder="State" type="text" value="<?php if(isset($_COOKIE["state"]) && !empty($_COOKIE["state"])){echo $_COOKIE["state"];} ?>" required/>
        </div>
        <div class="col-sm-3">
          <input class="form-control" name="zip" id="inputZip" placeholder="Zip" type="text" value="<?php if(isset($_COOKIE["zip"]) && !empty($_COOKIE["zip"])){echo $_COOKIE["zip"];} ?>" required/>
        </div>
      </div>
      <div class="row form-group">
        <label class="col-sm-2 control-label" for="inputYear">Current Year</label>
        <div class="col-sm-10">
          <input class="form-control" name="year" id="inputYear" placeholder="ex: Senior" type="text" value="<?php if(isset($_COOKIE["year"]) && !empty($_COOKIE["year"])){echo $_COOKIE["year"];} else {echo "";} ?>">
        </div>
      </div>
      <div class="row form-group">
        <label class="col-sm-2 control-label" for="inputSports">Favorite Sports</label>
        <div class="col-sm-10" id="inputSports">
          <input type="checkbox" name="sports[]" value="iceskating"> Ice Skating<br>
          <input type="checkbox" name="sports[]" value="curling"> Curling<br>
          <input type="checkbox" name="sports[]" value="ballet"> Ballet<br>
          <input type="checkbox" name="sports[]" value="tennis"> Tennis<br>
          <input type="checkbox" name="sports[]" value="golf"> Golf<br>
          <input type="checkbox" name="sports[]" value="basketball"> Basketball<br>
          <input type="checkbox" name="sports[]" value="gymnastics"> Gymnastics<br>
          <br>
        </div>
      </div>
      <div class="row form-group">
        <label class="col-sm-2 control-label" for="inputQuote">Favorite Quote</label>
        <div class="col-sm-10">
          <input class="form-control" name="quote" id="inputQuote" placeholder="ex: Don't cry because it's over, smile because it happened." type="text" value="<?php if(isset($_COOKIE["quote"]) && !empty($_COOKIE["quote"])){echo $_COOKIE["quote"];} ?>">
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
</body>
</html>
