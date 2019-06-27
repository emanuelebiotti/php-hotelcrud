<?php

function connect_db($server, $user, $psw, $database) {

  $conn = new mysqli($server, $user, $psw, $database);
  return $conn;
}

 ?>
