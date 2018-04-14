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
        $this->setSession($get['data'][0]);
        echo "<br>";

        $script = new function_script();
        $script->redirect('view/user/home');
      }else{
        echo "Gagal login";
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
          $result=$req->fetchAll();
        }

        return array('status' => $status, 'rows' => $rows, 'data' => $result);
      }catch(PDOException $e){
        echo "Error! gagal mengambil data: ".$e->getMessage();
      }
  }

  function check(){
    if(!isset($_SESSION['id'])){
      header('location: ../../');
    }
  }

  function getAll(){
      $query = "SELECT * FROM user";
      return $this->get_data($query, '');
   }

   function getById($id){
     $query = "SELECT * FROM user WHERE id=".$id;
     return $this->get_data($query, '');
   }

   function logo(){
       $script = new function_script();

       $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
       $nama = $_FILES['logo']['name'];
       $x = explode('.', $nama);
       $ekstensi = strtolower(end($x));
       $ukuran	= $_FILES['logo']['size'];
       $file_tmp = $_FILES['logo']['tmp_name'];

       $new_name = $_SESSION['id']."_".$_SESSION['nama'];

       $cek = $script->get_image($new_name,'logo/');

       if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
         if($ukuran < 1044070){
           if($cek!=null){
             copy($file_tmp, 'logo/'.$cek);
             $script->compress(
             'logo/'.$cek,
             'logo/'.$cek,
             75
             );
             return $cek;
           }else{
             move_uploaded_file($file_tmp, 'logo/'.$new_name.".".$ekstensi);
             $script->compress(
             'logo/'.$new_name.".".$ekstensi,
             'logo/'.$new_name.".".$ekstensi,
             75
             );
             return $new_name.".".$ekstensi;
           }
         }

       }else{
         return NULL;
       }
   }


   function update($data){
     $file = $this->logo();
     if($file!=null){
     $data['logo'] = $file;
   }else{
     $data['logo'] = null;
   }
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
       echo "Update Gagal: ".$e->getMessage();
     }
   }

 }



?>
