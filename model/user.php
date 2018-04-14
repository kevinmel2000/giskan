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
    $_SESSION['id']=$data['id'];
    $_SESSION['username']=$data['username'];
    $_SESSION['password']=$data['password'];
    $_SESSION['email']=$data['email'];
    $_SESSION['role']=$data['role'];
    $_SESSION['nama']=$data['nama'];
    $_SESSION['logo']=$data['logo'];
    $_SESSION['alamat']=$data['alamat'];
    $_SESSION['no_telefon']=$data['no_telefon'];
    $_SESSION['latitude']=$data['latitude'];
    $_SESSION['longitude']=$data['longitude'];
  }

 }



?>
