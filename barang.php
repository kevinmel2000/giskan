<?php
  include "include/connection.php";
  include "model/barang.php";
  include "include/validator.php";

  $barang = new barang();

  if(!isset($_GET['nama'])){
    $data = $barang->showAll();
  }else{
    $data = $barang->getByNama($_GET['nama']);
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="">
      <form class="" action="" method="post">
        <div class="">
          <label for="input"></label>
          <input type="text" name="nama" value="">
        </div>
        <div class="">
          <input type="submit" name="search" value="Cari">
        </div>
      </form>
    </div>
    <div class="">
      <table>
        <?php
        if($data['rows']>0){
          foreach ($data['data'] as $value) {
            echo "<tr>";
            for ($i=2; $i < 6 ; $i++) {
              echo "<td>$value[$i]</td>";
            }
            echo "<td><a href='lihat.php?id=$value[0]'>Lihat</a></td></tr>";
          }
        }
        ?>
      </table>
    </div>
  </body>
</html>
