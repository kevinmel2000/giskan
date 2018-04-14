<?php
  include "include/connection.php";
  include "model/barang.php";

  $barang = new barang();
  $data = $barang->showAll()['data'];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
      <?php
        foreach ($data as $value) {
          echo "<tr>";
          for ($i=0; $i < ; $i++) {
            # code...
          }
          echo "</tr>";
        }
      ?>
    </table>
  </body>
</html>
