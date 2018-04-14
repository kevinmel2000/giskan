<?php
  session_start();

  include '../../model/user.php';
  include '../../model/barang.php';
  include '../../include/validator.php';
  $user = new user();
  $user->check();

  $barang = new barang();
  $data = $barang->select($_GET['id']);
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
        <input type="text" name="nama">
      </div>
      <div class="">
        <label for="harga">Harga</label>
        <input type="text" name="harga"s>
      </div>
      <div class="">
        <label for="foto">Foto</label>
        <input type="text" name="foto">
      </div>
      <div class="">
        <label for="keterangan">Keterangan</label>
        <input type="text" name="keterangan" value="<?php echo $barang['keterangan'] ?>">
      </div>
      <div class="">
        <input type="submit" name="update_barang" value="Update">
      </div>
    </form>
  </body>
</html>
