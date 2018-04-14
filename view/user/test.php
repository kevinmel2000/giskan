<?php
  session_start();
  include '../../model/user.php';
  include '../../include/validator.php';
  $user = new user();
  $user->check();
  $all = $user->getByField('longitude');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      foreach ($all['data'][0] as $key => $value) {
        echo $key."=>".$value."<br>";
      }
     ?>
  </body>
</html>
