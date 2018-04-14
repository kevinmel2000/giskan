<?php
  session_start();
  include '../../model/user.php';
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
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="<?php echo $_SESSION['nama'] ?>">
      </div>
      <div class="">
        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo $_SESSION['email'] ?>">
      </div>
      <div class="">
        <label for="nama">Logo</label>
        <input type="text" name="logo" value="<?php echo $_SESSION['logo'] ?>">
      </div>
      <div class="">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" value="<?php echo $_SESSION['alamat'] ?>">
      </div>
      <div class="">
        <label for="no_telfon">No. Telp</label>
        <input type="text" name="no_telefon" value="<?php echo $_SESSION['no_telefon'] ?>">
      </div>
      <div class="">
        <label for="latitude">Latitude</label>
        <input type="text" name="latitude" value="<?php echo $_SESSION['latitude'] ?>">
      </div>
      <div class="">
        <label for="nama">Longitude</label>
        <input type="text" name="longitude" value="<?php echo $_SESSION['longitude'] ?>">
      </div>
      <div class="">
        <input type="submit" name="update_profile" value="Update">
      </div>
    </form>
  </body>
</html>
