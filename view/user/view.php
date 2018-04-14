<?php
  session_start();
  include "../../include/connection.php";
  include "../../model/barang.php";
  include "../../model/user.php";
  include "../../model/transaksi.php";

  $barang = new barang();
  $data = $barang->getById($_GET['id'])['data'][0];

  $transaksi = new transaksi();
  $trans = $transaksi->getByBarang($_GET['id'])['data'];

  include "../../include/validator.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
      <tr>
        <td>Nama</td>
        <td><?php echo $data['nama'];?></td>
      </tr>
      <tr>
        <td>Harga</td>
        <td><?php echo $data['harga'];?></td>
      </tr>
      <tr>
        <td>Foto</td>
        <td><?php echo $data['foto'];?></td>
      </tr>
      <tr>
        <td>Keterangan</td>
        <td><?php echo $data['keterangan'];?></td>
      </tr>
    </table>
    <br>
    <label>PEMESANAN</label>
    <table>
      <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>No Telefon</th>
      </tr>
      <?php
      if(count($trans)>0){
        foreach ($trans as $t) {
          echo "
          <tr>
          <td>".$t['nama']."</td>
          <td>".$t['alamat']."</td>
          <td>".$t['no_telefon']."</td>
          </tr>";
        }
      }      
      ?>
    </table>
  </body>
</html>
