<?php
  session_start();
  include '../../model/user.php';
  include '../../include/validator.php';
  $user = new user();
  $user->check();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>GisKan GIS Untuk Nelayan</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />



    <!-- Leaflet JS Sisip Script -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
  integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
  crossorigin=""/>
  <!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
  integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
  crossorigin=""></script>
  <!-- Sweetalert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
    #mapid { height: 500px; }
  </style>
</head>

<body>
  <div id="testsaja">

  </div>
    <div class="wrapper">
        <div class="sidebar" data-color=green data-image="assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        Kuaci Clan
                    </a>
                </div>
                <ul class="nav">
                    <li >
                        <a class="nav-link" href="../../index.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../../lokasi.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Data Toko</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../../input.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Input Lokasi</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="./edit.php">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Edit Data</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./home.php">
                            <i class="nc-icon nc-atom"></i>
                            <p>User</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./barang.php">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Data Barang</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./notifications.html">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Notifications</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand" href="#pablo"> GisKan </a>

                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>


                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">Account</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Dropdown</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <form class="" action="" method="post">
                                      <input class="no-icon" type="submit" name="logout" value="Logout">
                                    </form>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Map Menu</h4>
                                    <p style="color:red;"onclick="remove()" class="card-category"><b>UNDO</b></p>
                                </div>



                                <div class="card-body ">
                                  <!-- Menu Peta -->
                                  <button class="btn btn-info" onclick="gpsLokasi()"> GPS </button>
                                  <button class="btn btn-info" onclick="manualLokasi()"> Manual </button>


                                     <form method="post" enctype="multipart/form-data">
                                       <div class="">
                                         <label for="nama">Nama</label>
                                         <input type="text" name="nama" value="<?php echo $_SESSION['nama'] ?>">
                                       </div>
                                       <div class="">
                                         <label for="email">Email</label>
                                         <input type="text" name="email" value="<?php echo $_SESSION['email'] ?>">
                                       </div>
                                       <div class="">
                                         <label for="nama">Logo</label>
                                         <input type="file" name="logo" value="<?php echo $_SESSION['logo'] ?>">
                                       </div>
                                       <div class="">
                                         <label for="alamat">Alamat</label>
                                         <input type="text" name="alamat" value="<?php echo $_SESSION['alamat'] ?>">
                                       </div>
                                       <div class="">
                                         <label for="no_telfon">No. Telp</label>
                                         <input type="text" name="no_telefon" value="<?php echo $_SESSION['no_telefon'] ?>">
                                       </div>
                                       <div class="">

                                         <input id="lat" type="hidden" name="latitude" value="<?php echo $_SESSION['latitude'] ?>">
                                       </div>
                                       <div class="">

                                         <input id="lon" type="hidden" name="longitude" value="<?php echo $_SESSION['longitude'] ?>">
                                       </div>
                                       <div class="">
                                         <input type="submit" name="update_profile" value="Update">
                                       </div>
                                     </form>


                                </div>
                                <div class="card-footer ">
                                    <div class="legend">

                                    </div>
                                    <hr>
                                    <div class="stats">

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-9">
                          <!-- Div Peta -->
                           <div id="mapid">

                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>

</body>
<!--   Core JS Files   -->
<script src="../../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->

<!--  Chartist Plugin  -->
<script src="../../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../../assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>


<!-- Script Map LeafletJS -->
<!-- Tampilkan Peta  -->
<script>



var mymap = L.map('mapid').setView([-0.9154789999999999, 100.46043549999999], 13);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiYXh2ZXI3IiwiYSI6ImNqZjZ0NXk2NjA4NzI0MG44djVyOXU2cXAifQ.N-pJV3Uw0nOhjvLz9E4Zuw'
}).addTo(mymap);







function gpsLokasi()
{
  // alert("Test");
  navigator.geolocation.getCurrentPosition(function(location) {
    var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
    var inputLat = document.getElementById('lat');
    lat.value=location.coords.latitude;
    var inputLon = document.getElementById('lon');
    lon.value=location.coords.longitude;
    mymap.setView(latlng, 15);
    newMarker = new L.marker(latlng).addTo(mymap);
  });



}

function remove(i)
{
  // mymap.removeLayer(newMarker);
    map.removeLayer(newMarker);
}

function disabled()
{
  document.getElementById("lat").disabled = true;
  document.getElementById("lon").disabled = true;
}


function manualLokasi()
{ var latitude;
  var longitude;
  var tanda;
  swal("Pilih Posisi Sampah tersebut");
  mymap.on('click', function(e) {
          newMarker = new L.marker(e.latlng).addTo(mymap);
          latitude=e.latlng.lat;
          longitude=e.latlng.lng;
          // Menampilkan lat dan lon pada input text
          var inputLat = document.getElementById('lat');
          lat.value=latitude;
          var inputLon = document.getElementById('lon');
          lon.value=longitude;
  });

}



</script>


</html>
