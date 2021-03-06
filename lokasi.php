<?php
session_start();
include 'include/connection.php';
include 'model/user.php';
include 'include/validator.php';
$user= new user();
$all=$user->getAll()['data'];

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>GisKan GIS Untuk Nelayan</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />

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
<!-- Leaflet Routing -->

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

  <style>
    #mapid { height: 500px; }
  </style>
</head>

<body>
  <div id="testsaja">

  </div>
  <?php include "include/menu-1.php"; ?>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class=" container-fluid  ">
                    <a class="navbar-brand" href="#pablo"> Dashboard </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                              <div class="">
                                <form action="" method="post" style="margin-left:720px">
                                  <?php include 'include/log.php'; ?>
                                </form>
                              </div>
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

                                  <button style="margin-top:30px;" class="btn btn-sucess" onclick="lokasiToko()"> Lokasi Toko </button>
                                  <select id ="lokasiData"style="margin-top:30px;" class="form-control" name="" onchange="fungsitest()">
                                    <option>Pilih Toko </option>

                                    <?php
                                     $i=0;
                                     $panjang= count($all);
                                     while ($i<$panjang)
                                     {
                                        echo "<option label='".$all[$i]['nama']."' value='".$all[$i]['latitude'].",".$all[$i]['longitude']."'>"."</option>";
                                        $i++;
                                     }




                                     ?>

                                  </select>

                                  <button style=" margin-top:30px;" class="btn btn-sucess" onclick="removeRute()"> Remove Rute </button>







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
                           <div id="mapid"></div>
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
    <!--   -->
    <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
			<li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                </div>
            </li>

            <li class="header-title pro-title text-center">Want more components?</li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                </div>
            </li>

            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

            <li class="button-container">
				<button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div>
 -->
</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->

<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>


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


var latlng;
var latAwal;
var lonAwal;
function gpsLokasi()
{

  navigator.geolocation.getCurrentPosition(function(location) {
    var latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
    mymap.setView(latlng, 12);
    newMarker = new L.marker(latlng).addTo(mymap);
    latAwal=location.coords.latitude;
    lonAwal=location.coords.longitude;

  });



}

function remove(i)
{
  // mymap.removeLayer(newMarker);
    mymap.removeLayer(newMarker);
}

function disabled()
{
  document.getElementById("lat").disabled = true;
  document.getElementById("lon").disabled = true;
}

var latitude;
var longitude;
var tampilMarker=[];
var argeojson = <?php echo json_encode($all) ?>;

function manualLokasi()
{
  var tanda;
  swal("Pilih Posisi Toko");
  mymap.on('click', function(e) {
          newMarker = new L.marker(e.latlng).addTo(mymap);
          latitude=e.latlng.lat;
          longitude=e.latlng.lng;
          latAwal=latitude;
          lonAwal=longitude;
  });
  latAwal=latitude;
  lonAwal=longitude;


}

function lokasiToko()
{
  // Sip yg ini sduah jalan

console.log(argeojson);

  length= argeojson.length;


  j=0;
  var marker=[];
  while(j<length)
  {
    if(argeojson[j]['latitude']!="" && argeojson[j]['longitude']!="")
    {

      console.log(argeojson[j]['latitude']);
      marker[j] = L.marker([argeojson[j]['latitude'], argeojson[j]['longitude']]).addTo(mymap);
      marker[j].bindPopup("<a href=barang.php?user="+argeojson[j]['id']+">Menuju Toko</a>").openPopup();

    }
      j++;
  }

}


var routing;
function fungsitest()
{

  console.log("Hahaha Kampang");
  var daerah= document.getElementById("lokasiData").value;
  console.log(daerah);
  //Pisahkan lagi variabel tersebut
  var coords = daerah.split(",");
  console.log(coords);


  routing=L.Routing.control({
  waypoints: [
    L.latLng(latAwal, lonAwal),
    L.latLng(coords[0],coords[1])
  ]
  }).addTo(mymap);



}

function removeRute()
{
  swal("Masukkan Script Remove Rute Disini");


}




</script>


</html>
