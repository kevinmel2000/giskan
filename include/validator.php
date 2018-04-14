<?php

	include 'connection.php';
	include 'model/user.php';
// Register

	if(isset($_POST['register'])) {
        $user = new user();
        $user->register($_POST);
			}
 ?>
