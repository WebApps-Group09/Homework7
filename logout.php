<?php
  session_destroy();
  session_start();
  $_SESSION["logout"] = 1;
  echo '<p> Logged out </p>';
?>
