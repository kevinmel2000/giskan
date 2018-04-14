<?php

class user
 {

 	public $id;
 	public $username;
 	public $password;
  public $role;
  public $nama;
  public $logo;
  public $alamat;
  public $no_telefon;
  public $latitude;
  public $longitude;

 	function __construct(){}

  function register($data){
   		global $pdo;
   		$query = $pdo->prepare("
   			INSERT INTO `user` (`username`, `password`, `nama`)
   			VALUES ( ?, ?, ?)");
  		$query->execute(array($data['username'],md5($data['password']),$data['name']));
  }
 }



?>
