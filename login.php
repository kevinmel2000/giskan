<?php
  session_start();
  include 'model/user.php';
  include 'include/validator.php';
 ?>

<!doctype html>
<head>

</head>
<body>
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Giskan</h1>
                    </div>
                </div>
            </div>
        </div>

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


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
</body>
</html>
