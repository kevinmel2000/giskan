<?php

	include 'connection.php';
	include 'script.php';
	include 'model/user.php';

// Register
	$a = new function_script();
	if(isset($_POST['register'])) {
				$user = new user();
        $user->register($_POST);
	}

	if(isset($_POST['login'])) {
				$user = new user();
				$user->login($_POST);
	}
 ?>
