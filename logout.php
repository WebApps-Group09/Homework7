<?php
  session_unset();

  session_start();
  $_SESSION["logout"] = 1;
  header('Location: index.php');
?>
