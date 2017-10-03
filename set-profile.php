<?php
  $db_connection = pg_connect("host=localhost dbname=homework7 user=homework7 password=homework7");
  $columns = array("first_name", "last_name", "address", "dorm", "city", "state", "zip", "year", "quote");
  foreach($columns as $column) {
    if(!empty($_POST[$column])) {
      $query = "UPDATE users SET ".$column."='".$_POST[$column]."' WHERE "."id=".$_SESSION["id"];
    }
  }
  if(!empty($_POST["zip"])) { // only non-string column
    $query = "UPDATE users SET zip=".$_POST["zip"]." WHERE "."id=".$_SESSION["id"];
  }
  if(!empty($_POST["sports"])) {
    $sports = "";
    foreach($_POST["sports"] as $sport) {
      $sports += $sport.":";
    }
  }
  //TODO: set db values
  header("Location: home.php");
?>
