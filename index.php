<?php include('koneksi.php'); 
$p1 ='';
$p2 = '';
$p3= '';
if (isset($_GET['posisi'])) {
  $pos = $_GET['posisi'];
  if ($pos == 1) {
    $p1 = 'in';
  }elseif ($pos == 2) {
    $p2 = 'in';
  }elseif ($pos == 3) {
    $p3 = 'in';
  }
}
?>

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
    <a href="index.php"><button type="button" class="btn btn-danger" name="deletedata" ><span class="glyphicon glyphicon-refresh"></span>Refresh</button></a>
      <a href="delete.php?deletedata"><button type="button" class="btn btn-danger" name="deletedata" ><span class="glyphicon glyphicon-trash"></span>Reset Semua Dataa</button></a><br>
    </div>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Step 1 ( Tentukan Kriteria )</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse <?php echo $p1; ?>">
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
            <form method="post" style="margin-left: 10%; margin-right: 10%; " action="add.php">
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
                <td>
                    <a href="index.php?id_kriteria=<?php echo $kriteria['id_kriteria'] ?>&posisi=1"><button title="edit" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-edit"></span></button></a> -
                    <a href="delete.php?id_kriteria=<?php echo $kriteria['id_kriteria'] ?>"><button title="hapus" type="button" class="btn btn-danger" id="hapuskriteria"><span class="glyphicon glyphicon-trash"></span></button></a>
                </td>
              </tr>
                 <?php $i++;
                 
                 }
                 if (isset($_GET['id_kriteria'])) {
                  $id_kriteria = $_GET['id_kriteria'];
                  $query_kriteria_byId = mysqli_query($koneksi, "SELECT * FROM kriteria WHERE id_kriteria = '$id_kriteria'");
                  while ($kriteria_byId = mysqli_fetch_array($query_kriteria_byId)) { 
                  ?>
                      <div id="formeditkriteria" >
                        <br>
                        <style type="text/css">
                          .form-group, .form-check-inline{
                            padding-left: 10%;
                          }
                          .form-control{
                            width: 50%;
                          }
                        </style>
                        <form method="post" style="margin-left: 10%; margin-right: 10%;" action="update.php">
                          <h2><u>edit Kriteria</u></h2>
                          <div class="form-group">
                            
                            <label for="kodekriteria">Kode Kriteria:</label><input type="text" name="idkriteria" value="<?= $kriteria_byId['kode_kriteria']; ?>" readonly>
                            <input type="text" class="form-control" id="kodekriteria" name="kodekriteria" required value="<?= $kriteria_byId['kode_kriteria'] ?>">
                          </div>
                          <div class="form-group">
                            <label for="namakriteria">Nama Kriteria:</label>
                            <input type="text" class="form-control" id="namakriteria" name="namakriteria" required value="<?= $kriteria_byId['nama_kriteria'] ?>">
                          </div>
                          <?php 
                          $bobot = $kriteria_byId['sifat'];
                          $cost = '';
                          $benefit = '';
                          if ($bobot == 'cost') {
                            ?>
                            <div class="form-group">
                            <label for="sel1">Select list:</label>
                            <select class="form-control" id="sel1" name="atribut">
                              <option value="cost">Cost</option>
                              <option value="benefit">Benefit</option>
                            </select>
                          </div>
                            <?php 
                          }else{
                            ?>
                            <div class="form-group">
                            <label for="sel1">Select list:</label>
                            <select class="form-control" id="sel1" name="atribut">
                              <option value="benefit">Benefit</option>
                              <option value="cost">Cost</option>
                            </select>
                          </div>
                            <?php 
                          }
                           ?>
                          <div class="form-group">
                            <label for="namakriteria">Bobot :</label>
                            <input type="number" class="form-control" id="namakriteria" name="bobot" min="0" value="<?= $kriteria_byId['bobot'] ?>">
                          </div>
                          <button type="submit" class="btn btn-primary zz" name="updatekriteria">Update Kriteria</button>
                          <button type="button" class="btn btn-danger" id="batalupdatekriteria">Batal</button>
                        </form><br><br>
                      </div>
                  <?php
                  }
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
      <div id="collapse2" class="panel-collapse collapse <?php echo $p2; ?>">
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
            <form method="post" style="margin-left: 10%; margin-right: 10%;" action="add.php">
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
                <td>
                    <a href="index.php?id_alternatif=<?php echo $alternatif['id_alternatif'] ?>&posisi=2"><button title="edit" type="button" class="btn btn-danger" id="editalternatif"><span class="glyphicon glyphicon-edit"></span></button></a> -
                    <a href="delete.php?id_alternatif=<?php echo $alternatif['id_alternatif'] ?>"><button title="hapus" type="button" class="btn btn-danger" id="hapusalternatif"><span class="glyphicon glyphicon-trash"></span></button></a>
                </td>
              </tr>
              <?php 
              $i++;
              }
              if (isset($_GET['id_alternatif'])) {
              $id_alternatif = $_GET['id_alternatif'];
                  $query_alternatif_byId = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE id_alternatif = '$id_alternatif'");
                  while ($alternatif_byId = mysqli_fetch_array($query_alternatif_byId)) { 
                  
              ?>
                  <form method="post" style="margin-left: 10%; margin-right: 10%;" action="update.php">
                    <h2><u>Edit alternatif</u></h2><input type="text" name="idalternatif" value="<?= $alternatif_byId['id_alternatif']?>">
                    <div class="form-group">
                      <label for="kodekriteria">Kode Alternatif:</label>
                      <input type="text" class="form-control" id="kodekriteria" name="kodealternatif" required value="<?= $alternatif_byId['kode']?>">
                    </div>
                    <div class="form-group">
                      <label for="namakriteria">Nama / Keterangan:</label>
                      <input type="text" class="form-control" id="namakriteria" name="namaalternatif" required value="<?= $alternatif_byId['nama_alternatif']?>">
                    </div>
                    <button type="submit" class="btn btn-primary zz" name="updatealternatif">Submit</button>
                    <button type="button" class="btn btn-danger" id="batalupdateternatif">Batal</button>
                  </form><br><br>
              <?php 
              }}
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
      <div id="collapse3" class="panel-collapse collapse <?php echo $p1; ?>">
        <div class="panel-body">
          <?php 
            $nila = mysqli_query($koneksi, "SELECT * FROM nilai");
            $ni = mysqli_num_rows($nila);
            if($ni != 0){
           ?>
          <a href="delete.php?resetnilaialternatif"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Reset Data Nilai Alternatif</button></a>
        <?php } ?>
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
            <?php 
            $nil = mysqli_query($koneksi, "SELECT * FROM nilai");
            $n = mysqli_num_rows($nil);
            if($n === 0){

             ?>
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

                <button type="submit" class="btn btn-primary" name="submitnilaialternatif">Insert</button>
              
            </form>
            <?php }else{ ?>
                <button type="submit" class="btn btn-primary" name="updatenilaialternatif">Update</button>
              <?php } ?>
        </div>
      </div>
    </div>
  </div> 
</div>

<?php 


                $k = mysqli_query($koneksi, "SELECT COUNT(*) FROM kriteria");
                $a = mysqli_query($koneksi, "SELECT COUNT(*) FROM alternatif");

if (isset($_POST['submitnilaialternatif'])) {
              $query_alter = mysqli_query($koneksi, "SELECT * FROM alternatif");
              while ($alter = mysqli_fetch_array($query_alter)) { 
                $alt=$alter['id_alternatif'];
                  $query_kr = mysqli_query($koneksi, "SELECT * FROM kriteria");
                  while ($kr = mysqli_fetch_array($query_kr)) {
                        echo $nil = $alter['id_alternatif']."-".$kr['id_kriteria'];
                        echo $nilai = $_POST[$nil];
                        echo "<br>";
                         }
                       } 
}

 ?>

<!------------------------------------------------------------------------- 
TAMBAH KRITERIA
------------------------------------------------------------------------- -->


<!------------------------------------------------------------------------- 
UPDATE KRITERIA
------------------------------------------------------------------------- -->


<!------------------------------------------------------------------------- 
DELETE KRITERIA
------------------------------------------------------------------------- -->


<!------------------------------------------------------------------------- 
TAMBAH ALTERNATIF
------------------------------------------------------------------------- -->

<!------------------------------------------------------------------------- 
UPDATE ALTERNATIF
------------------------------------------------------------------------- -->


<!------------------------------------------------------------------------- 
DELETE ALTERNATIF
------------------------------------------------------------------------- -->


<!------------------------------------------------------------------------- 
INPUT DATA NILAI ALTERNATIF
------------------------------------------------------------------------- -->




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
