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
      <h1>modifica stanza</h1>

      <?php
      if ($result && $result->num_rows > 0) {
        $row = $result-> fetch_assoc(); ?>

        <form method="post" action="edit_manager.php">
          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
          <div class="form-group">
            <label for="numero">Numero stanza:</label>
            <input class="form-control" type="text" name="room_number" value="<?php echo $row['room_number']?>" placeholder="numero stanza">
          </div>
          <label for="floor">Numero piano:</label>
          <div class="form-group">
            <input class="form-control" type="number" name="floor" value="<?php echo $row['floor']?>" placeholder="piano">
          </div>
          <label for="beds">Numero letti:</label>
          <div class="form-group">
            <input class="form-control" type="number" name="beds" value="<?php echo $row['beds']?>" placeholder="numero letti">
          </div>
          <div class="form-group">
            <input style="width:150px; background-color: green; color:white;" class="form-control" type="submit" value="salva" class="btn btn-success">
          </div>
        </form>

      <?php


      } else if ($result) {
        echo 'Nessun risultato';
      } else {
        echo 'Si è verificato un errore';
      }
      ?>


    </div>

<?php
include 'layout/footer.php'
?>
