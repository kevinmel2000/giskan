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
				$page = explode("/",$_SERVER['REQUEST_URI']);
				$take = $page[count($page)-1];
				$take = explode(".",$take);
				$script->redirect($take[0]);
	}

	if(isset($_POST['update_profile'])){
				$user = new user();
				$user->update($_POST);
	}

	if(isset($_POST['post'])){
			$barang = new barang();
			$barang->add($_POST);
	}

	if(isset($_POST['update_post'])){
			$barang = new barang();
			$barang->update($_POST);
	}

	if(isset($_POST['search'])){
			if(isset($_GET['user'])){
					header('Location: ?user='.$_GET['user'].'&nama='.$_POST['nama']);
			}else{
					header('Location: ?nama='.$_POST['nama']);
			}

	}

	if(isset($_POST['pesan'])){
		$transaksi = new transaksi();
		$transaksi->insert($_POST['jumlah'],$data['id']);
	}


 ?>
