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
   			INSERT INTO `barang` (`id_user`, `nama`, `harga`, `foto`, `keterangan`)
   			VALUES ( ?, ?, ?, ?, ?)");
  		$query->execute(array($_SESSION['id'],$data['nama'],$data['harga'],$data['foto'],$data['keterangan']));
      $script = new function_script();
      $script->redirect('home');
    }catch(PDOException $e){
      echo "Gagal Membuat Postingan:";
    }
  }

  function showByIdUser($id){
      $query = "SELECT * FROM barang WHERE id_user =".$id;
      return $this->get_data($query, '');
  }

  function showAll(){
    $query = "SELECT * FROM barang";
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
          $_GET['id']
        ));
      $script = new function_script();
      $script->redirect('home');
    }catch(PDOException $e){
      echo "Update Gagal";
    }
  }

  function getByNama($nama){
    $query = "SELECT * FROM barang WHERE nama LIKE '%".$nama."%'";
    return $this->get_data($query, '');
  }

  function getById($id){
    $query = "SELECT * FROM barang WHERE id=".$id;
    return $this->get_data($query, '');
  }

}
 ?>
