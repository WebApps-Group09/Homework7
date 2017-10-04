<?php
  session_start();
  if (!isset($_SESSION["id"])) {
    header("Location: index.php");
  }

  $db_connection = pg_connect("host=localhost dbname=homework7 user=homework7 password=homework7");
  $query = "SELECT * from activity";
  $results = pg_query($db_connection, $query);
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Activity</title>
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
          <li><a href="info.php">Info</a></li>
          <li class="active"><a href="activity.php">Activity</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <h1>Activity</h1>
    <table class="table">
      <thead>
        <tr>
          <th>user_id</th>
          <th>ip_address</th>
          <th>timestamp</th>
          <th>page</th>
        </tr>
			</thead>
				<tbody>
				<?php
          $activities = pg_fetch_all($results);
					$num_rows = pg_num_rows($activities);
					if ($num_rows > 50){ $num_rows = 50; } //sets upper limit on num_rows
					for ($i = 0; $i < $num_rows; $i++){
						echo '<tr>';
						echo '<td>'.$activities[$i]['user_id'].'</td>';
						echo '<td>'.$activities[$i]['ip_address'].'</td>';
						echo '<td>'.$activities[$i]['time_stamp'].'</td>';
						echo '<td>'.$activities[$i]['page'].'</td>';
						echo '</tr>';
					}
				?>
				</tbody>
    </table>
  </div>
  <!-- JS for the navbar collapse -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
