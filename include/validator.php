<?php

	include 'connection.php';
	include 'script.php';
// Register

	$script = new function_script();

	if(isset($_POST['register'])) {
				$user = new user();
        $user->register($_POST);
	}

	if(isset($_POST['login'])) {
				$user = new user();
				$user->login($_POST);
	}

	if(isset($_POST['logout'])){
				session_destroy();
				$script->redirect('../../login');
	}

	if(isset($_POST['update_profile'])){
				$user = new user();
				$user->update($_POST);
	}


 ?>
