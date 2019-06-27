<?php
include 'db_config.php';
include 'functions.php';

$conn = connect_db($server, $user, $psw, $database);


if($conn && $conn->connect_error) {
  echo 'errore: '.$conn->connect_error;
  exit();
}

$sql = "SELECT * FROM stanze";
$result = $conn->query($sql);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP HOTEL CRUD</title>
    <link rel="stylesheet" href="/public/css/app.css">
  </head>
  <body>

  <header>
    <div class="container">
      <img src="https://www.intornodesign.it/cms/wp-content/uploads/client/bulgari/Bulgari_logo-01-500x301.png" alt="Logo hotel">
      <nav>
        <a href="#">Home</a>
        <a href="#">La nostra storia</a>
        <a href="#">Prenota</a>
        <a href="#">Contatti</a>
      </nav>
    </div>
  </header>


    <div class="container">
      <pre>
        <?php
        if ($result && $result->num_rows > 0) {
          while ($row = $result-> fetch_assoc()) {
            var_dump($row);
          }
        } else if ($result) {
          echo 'Nessun risultato';
        } else {
          echo 'Si è verificato un errore';
        }
        ?>
      </pre>
    </div>

  </body>
</html>

 <?php
/*
$server = 'localhost';
$user = 'root';
$psw = 'root';
$database = 'hotel';

$conn = new mysqli($server, $user, $psw, $database);

if($conn && $conn->connect_error) {
  echo 'errore: '.$conn->connect_error;
  exit();
}
// arrivando qui, significa che la connessione al database funziona

$sql = "SELECT * FROM stanze";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {

  while ($row = $result->fetch_assoc()) {
    // var_dump($row);
    echo "stanza n ".$row['room_number']. " piano ".$row['floor'];
    echo '<br>';
    }
  }

else if ($result) {
  echo "0 risultati";
} else {
  echo "errore query";
}

$conn->close();
*/
?>
