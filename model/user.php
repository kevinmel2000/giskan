<?php
class user
 {

 	public $id;
 	public $username;
 	public $password;
  public $email;
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
      try{
   		$query = $pdo->prepare("
   			INSERT INTO `user` (`username`, `password`, `nama`, `email`)
   			VALUES ( ?, ?, ?, ?)");
  		$query->execute(array($data['username'],md5($data['password']),$data['name'],$data['email']));
      $script = new function_script();
      $script->redirect('login');
    }catch(PDOException $e){
      echo "Gagal Daftar";
    }
  }

  function login($data){
      $query = "SELECT * FROM user WHERE username=:lusername AND password=:lpassword";
      $param = array(
          ':lusername' => strtoupper($data['username']),
          ':lpassword' => md5($data['password'])
        );
      $get = $this->get_data($query, $param);
      if($get['rows']>0){
        $script = new function_script();
        $this->setSession($get['data']);
        $script->redirect('view/user/home');
      }else{
        echo "Gagal login";
      }
  }

  function getAll(){
      $query = "SELECT * FROM user";
      return $this->get_data($query, '');
  }

  function get_data($query, $param){
      try{
        global $pdo;
        $req = $pdo->prepare($query);
        if($param == ''){
          $req->execute();
        }else{
          $req->execute($param);
        }
        $status = false;

        if($req->rowCount() > 0){
          $status=true;
          $result = $req->fetchAll();
        }

        return array('status' => $status, 'rows' => $req->rowCount(), 'data' => $result);
      }catch(PDOException $e){
        echo "Error! gagal mengambil data: ".$e->getMessage();
      }
  }

  function setSession($data){
    foreach ($data as $key => $value) {
      if(isset($value)){
        $_SESSION[$key]=$value;
      }else{
        $_SESSION[$key]="";
      }
    }
  }

  function update($data){
    global $pdo;
    try{
      $query = $pdo->prepare("
        UPDATE `user` SET
          `nama`=?,
          `email`=?,
          `logo`=?,
          `alamat`=?,
          `no_telefon`=?,
          `latitude`=?,
          `longitude`=?
        WHERE `id`= ?"
      );
      $query->execute(array(
          $data['nama'],
          $data['email'],
          $data['logo'],
          $data['alamat'],
          $data['no_telefon'],
          $data['latitude'],
          $data['longitude'],
          $_SESSION['id']
        ));
        $this->setSession($data);
      $script = new function_script();
      $script->redirect('home');
    }catch(PDOException $e){
      echo "Update Gagal";
    }
  }

  function check(){
    if(!isset($_SESSION['id'])){
      header('location: ../../');
    }
  }

 }



?>
