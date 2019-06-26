<?php

$server = 'localhost';
$user = 'root';
$psw = 'root';
$table = 'hotel';

$conn = new mysqli($server, $user, $psw, $table);

if($conn && $conn->connect_error) {
  echo 'errore: '.$conn->connect_error;
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
      <div class="tabella">
        <?php
        $sql = "SELECT room_number, floor FROM stanze";
        $result = $conn->query($sql);

        if($result) {
          if($result->num_rows > 0) { ?>
            <table>
            <?php
            while($row = $result->fetch_assoc()) { //standard per scorrere i risultati dentro $result e ogni risultato lo si assegna a $row
              ?>

                <tr>
                  <td><span class="stanza">Stanza numero:</span> <?php echo $row['room_number'];?></td>
                  <td><span class="piano">Piano numero:</span> <?php echo $row['floor'];?></td>
                </tr>

            <?php } ?>
          </table>
          <?php } else {
            echo 'no results';
          }
        } else {
          echo 'errore query';
        }
        ?>

      </div>
    </div>
  </body>
</html>


<?php

$conn->close();

?>
