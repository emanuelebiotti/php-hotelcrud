<?php
include 'db_config.php';
include 'functions.php';

$conn = connect_db($server, $user, $psw, $database);


if($conn && $conn->connect_error) {
  echo 'errore: '.$conn->connect_error;
  exit();
}

$id_stanza = intval($_GET['id']);


$sql = "SELECT * FROM stanze WHERE id = $id_stanza";
$result = $conn->query($sql);

  include 'layout/head.php';
  include 'layout/navbar.php';

?>

<div class="container">
  <h2 class="text-center">Stanza id : <?php echo $id_stanza ?> </h2>

  <?php
  if ($result && $result->num_rows > 0) {
    $row = $result-> fetch_assoc(); ?>


    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="https://www.rd.com/wp-content/uploads/2018/05/15-Things-You-Should-Never-Ever-Do-in-a-Hotel-Room-6.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title"> Stanza numero <?php echo $row['room_number'] ?> </h5>
        <p class="card-text"> la stanza si trova al piano: <?php echo $row['floor']  ?> </p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Numero letti: <?php echo $row['beds'] ?> </li>
        <li class=" text-center list-group-item"> <a class="btn btn-primary" href="index.php">Torna alla Home</a> </li>
      </ul>
    </div>

  <?php


  } else if ($result) {
    echo 'Nessun risultato';
  } else {
    echo 'Si è verificato un errore';
  }
  ?>


</div>

<?php

  include 'layout/footer.php';

 ?>
