<?php

include 'db_config.php';
include 'functions.php';

$conn = connect_db($server, $user, $psw, $database);

if($conn && $conn->connect_error) {
  echo 'errore: '.$conn->connect_error;
  exit();
}

if(empty($_POST)) {
  echo "si è verificato un errore";
  exit();

}

$id = intval($_POST['id']);
$room_number = intval($_POST['room_number']);
$floor = intval($_POST['floor']);
$beds = intval($_POST['beds']);

$sql = "UPDATE stanze SET room_number = $room_number, floor = $floor, beds = $beds, updated_at = NOW() WHERE id = $id";
$result = $conn->query($sql);

 ?>

 <?php

include 'layout/head.php';
include 'layout/navbar.php';

 ?>

 <div class="container text-center">
  <?php echo "<h1>modifica effettuata</h1>";?>
  <a class="btn btn-primary" href="index.php">Torna alla Home</a>
</div>

 <?php

   include 'layout/footer.php';


  ?>
