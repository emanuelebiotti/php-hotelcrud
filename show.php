<?php
include 'db_config.php';
include 'functions.php';

$conn = connect_db($server, $user, $psw, $database);


if($conn && $conn->connect_error) {
  echo 'errore: '.$conn->connect_error;
  exit();
}

$id_stanza = $_GET['id'];

$sql = "SELECT * FROM stanze WHERE id = $id_stanza";
$result = $conn->query($sql);

  include 'layout/head.php';
  include 'layout/navbar.php';

?>

<div class="container">
  <h2 class="text-center">Visualizzazione singola stanza</h2>

</div>

<?php

  include 'layout/footer.php';

 ?>
