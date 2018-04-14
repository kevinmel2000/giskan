<?php
  session_start();
  include 'model/user.php';
  include 'include/validator.php';
 ?>

<!doctype html>
<head>


  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <!-- Right Panel -->

<div class="container">
  <div class="panel panel-info">

    <div class="panel-head">
      <h2>GisKan</h2>
    </div>

    <div class="panel-body">
      <div class="row">
        <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header">
                        <strong>Login</strong>
                          <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        </div>
                        <div class="card-body card-block">
                            <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="username" name="username" placeholder="username" class="form-control"></div>
                            </div>
                            <div class="row form-group">
                              <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password</label></div>
                              <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="password" class="form-control"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                          <input type="submit" name="login" value="login" class="btn btn-primary btn-sm">
                          <a href="register.php" class="btn btn-secondary btn-sm float-right">Register</a>
                        </div>
                      </form>
                    </div>
                  </div>

      </div>
    </div>

  </div>
</div>




</body>
</html>
