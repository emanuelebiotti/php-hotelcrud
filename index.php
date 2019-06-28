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


  <?php
    include 'layout/head.php';
    include 'layout/navbar.php';
   ?>


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
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a type="button" href="show.php?id=<?php echo $row['id']?>"  class="btn btn-primary">Visualizza</a>
                    <a type="button" href="edit.php?id=<?php echo $row['id']?>"  class="btn btn-secondary">Modifica</a>
                    <a type="button" href="show.php?id=<?php echo $row['id']?>"  class="btn btn-danger">Cancella</a>
                  </div>
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

    <?php
    include 'layout/footer.php';
    ?>
  </body>
</html>
