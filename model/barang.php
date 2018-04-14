<?php
class barang{
  public $id;
  public $id_user;
  public $nama;
  public $harga;
  public $foto;
  public $keterangan;

  function __construct(){}

  function add($data){
   		global $pdo;
      try{
   		$query = $pdo->prepare("
   			INSERT INTO `barang` (`id_user`, `nama`, `harga`, `keterangan`)
   			VALUES ( ?, ?, ?, ?)");
  		$query->execute(array($_SESSION['id'],$data['nama'],$data['harga'],$data['keterangan']));

      $query = "select * from barang where id=(select max(id) from barang)";
      $a = $this->get_data($query, '')['data'][0];

      $this->update($a);

      // $script = new function_script();
      // $script->redirect('home');
    }catch(PDOException $e){
      echo "Gagal Membuat Postingan:".$e->getMessage();
    }
  }

  function showByIdUser($id){
      $query = "SELECT * FROM barang WHERE id_user =".$id;
      return $this->get_data($query, '');
  }

  function select($id){
      $query = "SELECT * FROM barang WHERE id=".$id;
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

        $rows = $req->rowCount();
        $status = false;
        $result = NULL;
        if($req->rowCount() > 0){
          $status=true;
          $result = $req->fetchAll();
        }

        return array('status' => $status, 'rows' => $rows, 'data' => $result);
      }catch(PDOException $e){
        echo "Error! gagal mengambil data: ".$e->getMessage();
      }
  }

  function update($data){
    $file = $this->foto($data['id'],$data['nama']);
    if($file!=null){
    $data['foto'] = $file;
  }else{
    $data['foto'] = null;
  }

  if (isset($_GET['id'])) {
    $data['id']=$_GET['id'];
  }
    global $pdo;
    try{
      $query = $pdo->prepare("
        UPDATE `barang` SET
          `nama`=?,
          `harga`=?,
          `foto`=?,
          `keterangan`=?
        WHERE `id`= ?"
      );
      $query->execute(array(
          $data['nama'],
          $data['harga'],
          $data['foto'],
          $data['keterangan'],
          $data['id']
        ));
      $script = new function_script();
      $script->redirect('home');
    }catch(PDOException $e){
      echo "Update Gagal:".$e->getMessage;
  }
  }

  function getByNama($nama){
    $query = "SELECT * FROM barang WHERE nama LIKE '%".$nama."%'";
    if(isset($_SESSION['id'])){
      $query = $query." AND id_user!=".$_SESSION['id'];
    }
    return $this->get_data($query, '');
  }

  function showAll(){
    $query = "SELECT * FROM barang";
    if(isset($_SESSION['id'])){
      $query = $query." WHERE id_user!=".$_SESSION['id'];
    }
    return $this->get_data($query, '');
  }

  function getById($id){
    $query = "SELECT * FROM barang WHERE id=".$id;
    return $this->get_data($query, '');
  }

  function foto($id_barang,$nama_barang){
      $script = new function_script();

      $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
      $nama = $_FILES['foto']['name'];
      $x = explode('.', $nama);
      $ekstensi = strtolower(end($x));
      $ukuran	= $_FILES['foto']['size'];
      $file_tmp = $_FILES['foto']['tmp_name'];

      $new_name = $id_barang."_".$nama_barang;

      $cek = $script->get_image($new_name,'foto/');

      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 1044070){
          if($cek!=null){
            copy($file_tmp, 'foto/'.$cek);
            $script->compress(
            'foto/'.$cek,
            'foto/'.$cek,
            75
            );
            return $cek;
          }else{
            move_uploaded_file($file_tmp, 'foto/'.$new_name.".".$ekstensi);
            $script->compress(
            'foto/'.$new_name.".".$ekstensi,
            'foto/'.$new_name.".".$ekstensi,
            75
            );
            return $new_name.".".$ekstensi;
          }
        }

      }else{
        return NULL;
      }
  }
}
 ?>
