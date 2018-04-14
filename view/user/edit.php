
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
  <div class="col-md-3">
                              <div class="card ">
                                  <div class="card-header ">
                                      <h4 class="card-title">Map Menu</h4>
                                      <p style="color:red;" onclick="remove()" class="card-category"><b>UNDO</b></p>
                                  </div>



                                  <div class="card-body ">
                                    <!-- Menu Peta -->
                                    <button class="btn btn-info" onclick="gpsLokasi()"> GPS </button>
                                    <button class="btn btn-info" onclick="manualLokasi()"> Manual </button>

                                       <form enctype="multipart/form-data" class="" action="upload/upload.php" method="POST">
                                       <label for="lat">latitude :</label> <br>
                                       <input type="text" id="lat" name="lat" readonly="">
                                       <label for="lon">Longitude :</label>
                                       <input type="text" id="lon" name="lon" readonly="">

                                       <input type="file" style="margin-top:10px;" name="fileupload" id="fileupload">
                                       <input type="submit" style="margin-top:40px;" class="btn btn-sucess" value="inputkan" name="button">
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
                          </div></body>


</html>
