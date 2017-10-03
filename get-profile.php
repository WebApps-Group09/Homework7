<?php
  $db_connection = pg_connect("host=localhost dbname=homework7 user=homework7 password=homework7");
  $id_query = "SELECT * FROM users WHERE id='".$_SESSION["id"]."'";
  $result = pg_query($db_connection, $id_query);
  $profile_info = pg_fetch_all($result)[0];

  $fname = $profile_info["first_name"];
  $lname = $profile_info["last_name"];
  $address = $profile_info["address"];
  $dorm = $profile_info["dorm"];
  $city = $profile_info["city"];
  $state = $profile_info["state"];
  $zip = $profile_info["zip"];
  $year = $profile_info["year"];
  $sports = explode(" ",$profile_info["sports"]);
  $quote = $profile_info["quote"];
?>
