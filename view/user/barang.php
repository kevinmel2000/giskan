<?php
  session_start();
  include '../../model/user.php';
  include '../../model/barang.php';
  include '../../include/validator.php';
  $user = new user();
  $user->check();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div class="container">
      <div class="panel panel-info">
        <div class="panel-head">

        </div>

        <div class="row">

          <div class="col-sm-4">

          </div>

          <div class="col-sm-4">
            <div class="panel-body">
              <form method="post">
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-2">
                       <label for="nama">Nama Barang</label>
                    </div>
                    <div class="col-sm-4">
                       <input type="text" name="nama" value="">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-2">
                       <label for="email">Harga</label>
                    </div>

                    <div class="col-sm-4">
                       <input type="text" name="harga" value="">
                    </div>

                  </div>

                  <br/>

                  <div class="row">
                    <div class="col-sm-2">
                        <label for="nama">Foto</label>
                    </div>
                    <div class="col-sm-4">
                          <input type="text" name="foto" value="">
                    </div>
                  </div>

                  <br/>

                  <div class="row">
                    <div class="col-sm-2">
                       <label for="alamat">Keterangan</label>
                    </div>

                    <div class="col-sm-4">
                       <input type="text" name="keterangan" value="">
                    </div>
                  </div>

                  <br/>

                  <div class="row">

                    <div class="col-sm-2">
                       <label for="submit"></label>
                    </div>

                    <div class="col-sm-4">
                       <input type="submit" name="post" value="OK">
                    </div>

                  </div>
                 <br/>

                </div>


              </form>
            </div>
          </div>

          <div class="col-sm-4">

          </div>

        </div>



      </div>

    </div>

  </body>
</html>
