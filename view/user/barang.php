<?php
  session_start();
  include '../../model/user.php';
  include '../../model/barang.php';
  include '../../include/validator.php';
  $user = new user();
  $user->check();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
      <div class="">
        <label for="nama">Nama Barang</label>
        <input type="text" name="nama" value="">
      </div>
      <div class="">
        <label for="email">Harga</label>
        <input type="text" name="harga" value="">
      </div>
      <div class="">
        <label for="nama">Foto</label>
        <input type="text" name="foto" value="">
      </div>
      <div class="">
        <label for="alamat">Keterangan</label>
        <input type="text" name="keterangan" value="">
      </div>
      <div class="">
        <label for="submit"></label>
        <input type="submit" name="post" value="OK">
      </div>
    </form>
  </body>
</html>
