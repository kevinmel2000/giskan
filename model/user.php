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

  function get_data($query, $param){
      try{
        global $pdo;
        $req = $pdo->prepare($query);
        if($param == ''){
          $req->execute();
        }else{
          $req->execute($param);
        }

        $rows = $req->rowCount();
        $status = false;

        if($rows > 0){
          $status = true;
        }

        $data = $req->fetch(PDO::FETCH_NAMED);

        return array('status' => $status, 'rows' => $rows, 'data' => $data);
      }catch(PDOException $e){
        echo "Error! gagal mengambil data: ".$e->getMessage();
      }
  }

  function setSession($data){
    if(isset($data['id'])){
        $_SESSION['id']=$data['id'];
    }
    if(isset($data['username'])){
        $_SESSION['username']=$data['username'];
    }
    if(isset($data['password'])){
        $_SESSION['password']=$data['password'];
    }
    if(isset($data['email'])){
        $_SESSION['email']=$data['email'];
    }
    if(isset($data['role'])){
        $_SESSION['role']=$data['role'];
    }
    if(isset($data['nama'])){
        $_SESSION['nama']=$data['nama'];
    }
    if(isset($data['logo'])){
        $_SESSION['logo']=$data['logo'];
    }
    if(isset($data['alamat'])){
        $_SESSION['alamat']=$data['alamat'];
    }
    if(isset($data['no_telefon'])){
        $_SESSION['no_telefon']=$data['no_telefon'];
    }
    if(isset($data['latitude'])){
        $_SESSION['latitude']=$data['latitude'];
    }
    if(isset($data['longitude'])){
        $_SESSION['longitude']=$data['longitude'];
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

 }



?>
