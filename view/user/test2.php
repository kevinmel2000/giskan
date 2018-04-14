<?php
  session_start();
  include '../../model/user.php';
  include '../../include/validator.php';
  $user = new user();
  $user->check();
  $all = $user->getAll();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
     ?>
  </body>
</html>
