<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<script>
$(document).ready(function(){
  $("#formtambahkriteria").hide();
  $("#formtambahalternatif").hide();
    $("#tambahkriteria").click(function(){
        $("#formtambahkriteria").show();
    });
    $("#bataltambahkriteria").click(function(){
        $("#formtambahkriteria").hide();
    });
    $("#tambahalternatif").click(function(){
        $("#formtambahalternatif").show();
    });
    $("#bataltambahalternatif").click(function(){
        $("#formtambahalternatif").hide();
    });
    
});
</script>
<body>

<div class="container">
  <h2>Selamat Datang di Aplikasi SPK</h2>
  <p><strong></strong> Metode TOPSIS</p>
  <div style="width: 100%; margin-left: 0px; text-align: right;">
    <form method="post" action="index.php">
      <button type="button" class="btn btn-danger" name="deletedata" ><span class="glyphicon glyphicon-trash"></span>Reset Semua Data</button><br></div>
    </form>
  <?php 
    if(isset($_POST['deletedata'])){
      echo "<script>alert('haiiiiiiii');</script>";
      mysqli_query($koneksi, "DELETE FROM nilai");
      mysqli_query($koneksi, "DELETE FROM alternatif"); 
      mysqli_query($koneksi, "DELETE FROM kriteria"); 
      header("location: index.php");   
    }
   ?>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Step 1 ( Tentukan Kriteria )</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
          <button id="tambahkriteria" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Tambah</button>  
          <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Reset Data</button>
          <br>
          <div id="formtambahkriteria" >
            <br>
            <style type="text/css">
              .form-group, .form-check-inline{
                padding-left: 10%;
              }
              .form-control{
                width: 50%;
              }
            </style>
            <form method="post" style="margin-left: 10%; margin-right: 10%;">
              <h2><u>Tambah Kriteria</u></h2>
              <div class="form-group">
                <label for="kodekriteria">Kode Kriteria:</label>
                <input type="text" class="form-control" id="kodekriteria" name="kodekriteria" required>
              </div>
              <div class="form-group">
                <label for="namakriteria">Nama Kriteria:</label>
                <input type="text" class="form-control" id="namakriteria" name="namakriteria" required>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="atribut" value="cost" required>cost
                </label>
              </div>
              <div class="form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="atribut" value="benefit" required>benefit
                </label>
              </div>
              <div class="form-group">
                <label for="namakriteria">Bobot :</label>
                <input type="number" class="form-control" id="namakriteria" name="bobot" min="0">
              </div>
              <button type="submit" class="btn btn-primary zz" name="submittambahkriteria">Submit</button>
              <button type="button" class="btn btn-danger" id="bataltambahkriteria">Batal</button>
            </form><br><br>

              <?php 
              if(isset($_POST['submittambahkriteria'])){

                $kodekriteria = $_POST['kodekriteria'];
                $namakriteria = $_POST['namakriteria'];
                $atribut = $_POST['atribut'];
                $bobot = $_POST['bobot'];    
                $query = mysqli_query($koneksi, "INSERT INTO kriteria (kode_kriteria, nama_kriteria, sifat, bobot) VALUES ('$kodekriteria', '$namakriteria', '$atribut', '$bobot')"); 
                //echo "<script>alert('Kriteria dengan kode [ ".$kodekriteria." ] Berhasil ditambahkan');</script>";
                mysqli_close($koneksi);
                header("location: index.php");             
                }
            
               ?> 

          </div>

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No. </th>
                <th scope="col">Kode</th>
                <th scope="col">Nama Kriteria</th>
                <th scope="col">Sifat (cost/benefit)</th>
                <th scope="col">Bobot</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                 $i = 1;
                 $query_kriteria = mysqli_query($koneksi, "SELECT * FROM kriteria");
                 while ($kriteria = mysqli_fetch_array($query_kriteria)) { 

                  ?>
              <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?= $kriteria['kode_kriteria'] ?></td>
                <td><?= $kriteria['nama_kriteria'] ?></td>
                <td><?= $kriteria['sifat'] ?></td>
                <td><?= $kriteria['bobot'] ?></td>
                <td>aksi</td>
              </tr>
                 <?php $i++;
                 
                 }
                 ?>
            </tbody>
          </table>
          



        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Step 2 ( Tentukan Alternatif )</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
          <button type="button" class="btn btn-primary" id="tambahalternatif"><span class="glyphicon glyphicon-plus"></span>Tambah</button>  
          <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Reset Data</button>
          <br>
          <div id="formtambahalternatif" >
            <br>
            <style type="text/css">
              .form-group, .form-check-inline{
                padding-left: 10%;
              }
              .form-control{
                width: 50%;
              }
            </style>
            <form method="post" style="margin-left: 10%; margin-right: 10%;">
              <h2><u>Tambah Alternatif</u></h2>
              <div class="form-group">
                <label for="kodekriteria">Kode Alternatif:</label>
                <input type="text" class="form-control" id="kodekriteria" name="kodealternatif" required>
              </div>
              <div class="form-group">
                <label for="namakriteria">Nama / Keterangan:</label>
                <input type="text" class="form-control" id="namakriteria" name="namaalternatif" required>
              </div>
              <button type="submit" class="btn btn-primary zz" name="submittambahalternatif">Submit</button>
              <button type="button" class="btn btn-danger" id="bataltambahalternatif">Batal</button>
            </form><br><br>

              <?php 
              if(isset($_POST['submittambahalternatif'])){

                $kodealternatif = $_POST['kodealternatif'];
                $namaalternatif = $_POST['namaalternatif'];
                               
                $query = mysqli_query($koneksi, "INSERT INTO alternatif (kode, nama_alternatif) VALUES ('$kodealternatif', '$namaalternatif')");
                //echo "<script>alert('Alternatif dengan kode [ ".$kodealternatif." ] Berhasil ditambahkan');</script>";
                mysqli_close($koneksi);
                header("location: index.php");               
                }
               ?> 
</div>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No. </th>
                <th scope="col">Kode</th>
                <th scope="col">Nama (keterangan)</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                <?php 
                 $i = 1;
                 $query_alternatif = mysqli_query($koneksi, "SELECT * FROM alternatif");
                 while ($alternatif = mysqli_fetch_array($query_alternatif)) { 

                  ?>
              <tr>
                <th scope="row"><?= $i ;?></th>
                <td><?= $alternatif['kode'] ;?></td>
                <td><?= $alternatif['nama_alternatif'] ;?></td>
                <td>Aksi</td>
              </tr>
              <?php 
              $i++;
            }
               ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Step 3 ( Tentukan Nilai Alternatif )</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Alternatif</th>
                <?php 
                $k = mysqli_query($koneksi, "SELECT COUNT(*) FROM kriteria");
                $a = mysqli_query($koneksi, "SELECT COUNT(*) FROM alternatif");
                
                 $query_kriteria = mysqli_query($koneksi, "SELECT * FROM kriteria");
                 while ($kriteria = mysqli_fetch_array($query_kriteria)) { 

                  ?>
                <th scope="col" style="text-align: center;" class=".table-responsive">
                  <p title="<?= $kriteria['nama_kriteria']?>"><?= $kriteria['kode_kriteria']?><br>
                  [<?= $kriteria['sifat']?>]<br>
                  [bobot : <?= $kriteria['bobot']?>]<br></p>
                    
                  </th>

                <?php 
                }
                ?>
              </tr>
            </thead>
            <tbody style="text-align: center;">
              <form method="post">
              <?php 
              $query_alter = mysqli_query($koneksi, "SELECT * FROM alternatif");
              while ($alter = mysqli_fetch_array($query_alter)) { 
                $alt=$alter['id_alternatif'];
              ?>
              <tr>
                <th scope="col"><p title="<?= $alter['nama_alternatif']; ?>"><?= $alter['kode']; ?><br>[ <?= $alter['nama_alternatif']; ?> ]</p></th>
                <?php //for ($i=0; $i < 3; $i++) { 
                  $query_kr = mysqli_query($koneksi, "SELECT * FROM kriteria");
                  while ($kr = mysqli_fetch_array($query_kr)) {

                ?>
                  <td><input type="number" name="<?= $alter['id_alternatif']; ?>-<?= $kr['id_kriteria']; ?>" min="0" max="5" placeholder="<?= $alter['kode'].'-'.$kr['kode_kriteria']?>"></td>
                <?php } ?>
              </tr>
              <?php } ?>
                
            </tbody>
          </table>
          <?php 
          $nil = mysqli_query($koneksi, "SELECT * FROM nilai");
          $n = mysqli_num_rows($nil);
          if($n === 0){

           ?>
                <button type="submit" class="btn btn-primary" name="submitnilaialternatif">Insert</button>
              <?php }else{ ?>
                <button type="submit" class="btn btn-primary" name="updatenilaialternatif">Update</button>
              <?php } ?>
            </form>

        </div>
      </div>
    </div>
  </div> 
</div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>   
</body>
</html>
