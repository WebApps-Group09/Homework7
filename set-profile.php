<?php
  session_start();
  $db_connection = pg_connect("host=localhost dbname=homework7 user=homework7 password=homework7");
  $columns = array("first_name", "last_name", "address", "dorm", "city", "state", "year", "quote");
  foreach($columns as $column) {
    if(!empty($_POST[$column])) {
      $query = "UPDATE users SET ".$column."='".$_POST[$column]."' WHERE "."id=".$_SESSION["id"];
      pg_query($db_connection, $query);
    }
  }
  if(!empty($_POST["zip"])) { // only non-string column
    $query = "UPDATE users SET zip=".$_POST["zip"]." WHERE "."id=".$_SESSION["id"];
    pg_query($db_connection, $query);
  }
  if(!empty($_POST["sports"])) {
    $sports = "";
    $i = 0;
    foreach($_POST["sports"] as $sport) {
      if ($i == 0) {
        $sports = $sport;
      } else {
        $sports = $sports.":".$sport;
      }
      $i += 1;
    }
    $query = "UPDATE users SET sports='".$sports."' WHERE "."id=".$_SESSION["id"];
    pg_query($db_connection, $query);
  }
  header("Location: home.php");
?>
