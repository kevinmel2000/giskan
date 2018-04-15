<?php
  session_start();
  include "include/connection.php";
  include "model/barang.php";
  include "model/user.php";
  include "model/transaksi.php";

  $barang = new barang();
  $data = $barang->getById($_GET['id'])['data'][0];

  $user = new user();
  $duser = $user->getById($data['id_user'])['data'][0];

  include "include/validator.php";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>GisKan GIS Untuk Nelayan</title>
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
        <td>Nama</td>
        <td><?php echo $data['keterangan'];?></td>
      </tr>
      <tr>
        <form class="" action="" method="post">
          <div class="">
            <label for="jumlah"></label>
            <input type="text" name="jumlah" value="" placeholder="jumlah">
          </div>
          <div class="">
          <input type="submit" name="pesan" value="Pesan">
          </div>

        </form>
      </tr>
    </table>
    <br>
    <table>
      <tr>
        <td>Nama</td>
        <td><?php echo $duser['nama'];?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td><?php echo $duser['alamat'];?></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><?php echo $duser['email'];?></td>
      </tr>
      <tr>
        <td>Logo</td>
        <td><?php echo $duser['logo'];?></td>
      </tr>
    </table>
  </body>
</html>
