<?php
  session_start();
  include '../../include/validator.php';
  include '../../model/user.php';
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

  </body>
</html>
