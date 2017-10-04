<?php
  session_start();
  $db_connection = pg_connect("host=localhost dbname=homework7 user=homework7 password=homework7");
  $columns = array("first_name", "last_name", "address", "dorm", "city", "state", "year", "quote");
  foreach($columns as $column) {
    if(!empty($_POST[$column])) {
      $query = "UPDATE users SET ".$column."='".$_POST[$column]."' WHERE "."id=".$_SESSION["id"];
      //pg_query($db_connection, $query);
      echo $query."<br>";
    }
  }
  if(!empty($_POST["zip"])) { // only non-string column
    $query = "UPDATE users SET zip=".$_POST["zip"]." WHERE "."id=".$_SESSION["id"];
    //pg_query($db_connection, $query);
    echo $query."<br>";
  }
  if(!empty($_POST["sports"])) {
    $sports = "";
    foreach($_POST["sports"] as $sport) {
      $sports = $sports.":".$sport;
    }
    $query = "UPDATE users SET sports=".$sports." WHERE "."id=".$_SESSION["id"];
    //pg_query($db_connection, $query);
    echo $query."<br>";
  }
  //TODO: set db values
  //header("Location: home.php");
?>
