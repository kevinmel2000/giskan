<?php
class transaksi{
  public $id;
  public $id_user;
  public $id_barang;
  public $status;

  function __construct(){}

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
        $result = null;

        if($rows > 0){
          $status = true;
          $result=$req->fetchAll();
        }

        return array('status' => $status, 'rows' => $rows, 'data' => $result);
      }catch(PDOException $e){
        echo "Error! gagal mengambil data: ".$e->getMessage();
      }
  }

  function insert($jumlah, $id_barang){
      global $pdo;
      try{
      $query = $pdo->prepare("
        INSERT INTO `transaksi` (`id_user`, `id_barang`,`jumlah`)
        VALUES (?, ?, ?)");
      $query->execute(array($_SESSION['id'], $id_barang, $jumlah));
    }catch(PDOException $e){
      header('Location: login.php');

    }
  }

  function getByBarang($id){
    $query = "SELECT transaksi.id_barang,barang.id AS id_barang,user.* FROM transaksi
              JOIN barang ON transaksi.id_barang=barang.id
              JOIN user ON barang.id_user=user.id
              WHERE id_barang=".$id;
    return $this->get_data($query, '');
  }
}
?>
