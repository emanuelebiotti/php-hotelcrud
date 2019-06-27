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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
      <table class="table">
        <thead>
          <tr>
            <th class="text-center" scope="col">ID</th>
            <th class="text-center" scope="col">Room Number</th>
            <th class="text-center" scope="col">Floor</th>
            <th class="text-center" scope="col">Beds</th>
            <th class="text-center" scope="col">Created at</th>
            <th class="text-center" scope="col">Updated at</th>
            <th class="text-center" scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
          <?php
          if ($result && $result->num_rows > 0) {
            while ($row = $result-> fetch_assoc()) { ?>

              <tr>
                <td class="text-center"><?php echo $row['id'] ?> </td>
                <td class="text-center"><?php echo $row['room_number'] ?> </td>
                <td class="text-center"><?php echo $row['floor'] ?></td>
                <td class="text-center"><?php echo $row['beds'] ?></td>
                <td class="text-center"><?php echo $row['created_at'] ?></td>
                <td class="text-center"><?php echo $row['updated_at'] ?></td>
                <td class="text-center">
                  <a href="show.php" class="btn btn-primary">Visualizza</a>
                </td>
              </tr>
              <?php
            }
          } else if ($result) {
            echo 'Nessun risultato';
          } else {
            echo 'Si è verificato un errore';
          }
          ?>

        </tbody>
      </table>

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
