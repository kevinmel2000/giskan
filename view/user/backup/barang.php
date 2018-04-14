<?php
  session_start();
  include '../../include/validator.php';
  include '../../model/user.php';
  $user = new user();
  $user->check();

  print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
