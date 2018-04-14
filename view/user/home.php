<?php
  session_start();
  include '../../include/validator.php';
  include '../../model/user.php';
  include '../../model/barang.php';
  $user = new user();
  $user->check();

  print_r($_SESSION);

  $barang = new barang();
  $data = $barang->show();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div>
      <?php echo $_SESSION['id']; ?>
    </div>
    <div>
      <?php echo $_SESSION['nama']; ?>
    </div>
    <div>
      <?php echo $_SESSION['email']; ?>
    </div>
    <div>
      <?php echo $_SESSION['longitude']; ?>
    </div>
    <div>
      <a href="edit.php">Edit</a>
    </div>
    <div>
      <form class="" method="post">
        <input type="submit" name="logout" value="Logout">
      </form>
    </div>
    <div>
      <a href="barang.php">Barang</a>
    </div>

    <table>
      <?php
          // print_r($data);
          foreach ($data['data'] as $rows) {
            echo "<tr>";
              for ($i=0 ; $i < 6 ; $i++ ) {
                echo "<td>".$rows[$i]."</td>";
              }
              echo "<td><a href='editbarang?id=".$rows['id']."'>edit</a>";
            echo "</tr>";
          }
       ?>
    </table>

  </body>
</html>
