<?php include('koneksi.php'); 
$p1 ='';
$p2 = '';
$p3= '';
$P4='';
$P5='';
$P6='';
$P7='';
$P8='';
$P9='';
$P10='';
if (isset($_GET['posisi'])) {
  $pos = $_GET['posisi'];
  if ($pos == 1) {
    $p1 = 'in';
  }elseif ($pos == 2) {
    $p2 = 'in';
  }elseif ($pos == 3) {
    $p3 = 'in';
  }elseif ($pos == 4) {
    $p4 = 'in';
  }elseif ($pos == 5) {
    $p5 = 'in';
  }elseif ($pos == 6) {
    $p6 = 'in';
  }elseif ($pos == 7) {
    $p7 = 'in';
  }elseif ($pos == 8) {
    $p8 = 'in';
  }elseif ($pos == 9) {
    $p9 = 'in';
  }elseif ($pos == 10) {
    $p10 = 'in';
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
  <!------------------------------------------------------------------------- 
STEP 1
------------------------------------------------------------------------- -->
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
    <!------------------------------------------------------------------------- 
STEP 2
------------------------------------------------------------------------- -->
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

<!------------------------------------------------------------------------- 
STEP 3
------------------------------------------------------------------------- -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Step 3 ( Tentukan Nilai Alternatif )</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse <?php echo $p3; ?>">
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
              <form method="post" action="add.php">
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
                  <td><input type="text" class="inputnilai" name="<?= $alter['id_alternatif']; ?>-<?= $kr['id_kriteria']; ?>" placeholder="<?= $alter['kode'].'-'.$kr['kode_kriteria']?>" required></td>
                <?php } ?>
              </tr>
              <?php } ?>
                
            </tbody>
          </table>

                <button type="submit" class="btn btn-primary" name="submitnilaialternatif">Insert</button>
              
            </form>
            <?php }else{ ?>
                <tbody style="text-align: center;">
              <form method="post" action="add.php">
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
                    $id_kri = $kr['id_kriteria'];
                    $id1 = $alter['id_alternatif'];
                    $id2 = $kr['id_kriteria'];
                    $q_nilai = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_aternatif = '$id1' AND id_kriteria = '$id2'");
                    $nilai = mysqli_fetch_array($q_nilai);
                    
                ?>
                  <td><input type="text" name="idnilai" value="<?= $nilai['id_nilai']; ?>" hidden>
                    <input type="text" class="inputnilai" name="<?= $alter['id_alternatif']; ?>-<?= $kr['id_kriteria']; ?>"  value="<?= $nilai['nilai']; ?>" required></td>
                <?php
                    } ?>
              </tr>
              <?php } ?>
                
            </tbody>
            </table>
                <button type="submit" class="btn btn-primary" name="updatenilaialternatif">Update</button>
              </form>
              <?php } ?>
        </div>
      </div>
    </div>
<!------------------------------------------------------------------------- 
STEP 4
------------------------------------------------------------------------- -->
<!------------------------------------------------------------------------- 
array
------------------------------------------------------------------------- -->
<?php 
$jumlah_alternatif = mysqli_num_rows($query_alter); 
$jumlah_kriteria = mysqli_num_rows($query_kr);
$id11 =0 ;
$id22 = 0 ; 
$query_alter = mysqli_query($koneksi, "SELECT * FROM alternatif");
while ($alter = mysqli_fetch_array($query_alter)) { 
  $alt=$alter['id_alternatif'];
  $query_kr = mysqli_query($koneksi, "SELECT * FROM kriteria");
  while ($kr = mysqli_fetch_array($query_kr)) {
      $id_kri = $kr['id_kriteria'];
      $id1 = $alter['id_alternatif'];
      $id2 = $kr['id_kriteria'];
      $q_nilai = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_aternatif = '$id1' AND id_kriteria = '$id2'");
      $nilai = mysqli_fetch_array($q_nilai);
      $nilainya[$id11][$id22] = $nilai['nilai'];
      //echo $id11." -- ".$id22 ."<br>";
      $id22++;
      if ($id22 == $jumlah_kriteria) {
        $id22 =0;
      }
  }
  $id11++;
}

for ($kr=0; $kr < $jumlah_kriteria; $kr++) { 
  $xy[$kr] = 0;  
  for ($al=0; $al < $jumlah_alternatif; $al++) { 
    $qq = $nilainya[$al][$kr];
    $ww = $xy[$kr];
    $xy[$kr] = $ww + ($qq*$qq);
  }
}

 ?>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Step 4 ( Hasil normalisasi terhadap matrix X )</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse <?php echo $p4; ?>">
        <div class="panel-body">
          <h1>Matrix R</h1>
          

 <?php 
            $nila = mysqli_query($koneksi, "SELECT * FROM nilai");
            $ni = mysqli_num_rows($nila);
            if($ni != 0){
           ?>
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
            $n = mysqli_num_rows($nil); ?>
                <tbody style="text-align: center;">
              <?php 
              $query_alter = mysqli_query($koneksi, "SELECT * FROM alternatif");
              $cc=0;
              while ($alter = mysqli_fetch_array($query_alter)) { 
                $alt=$alter['id_alternatif'];
              ?>
              <tr>
                <th scope="col"><p title="<?= $alter['nama_alternatif']; ?>"><?= $alter['kode']; ?><br>[ <?= $alter['nama_alternatif']; ?> ]</p></th>
                <?php //for ($i=0; $i < 3; $i++) { 
                  $query_kr = mysqli_query($koneksi, "SELECT * FROM kriteria");
                  while ($kr = mysqli_fetch_array($query_kr)) {
                    $id_kri = $kr['id_kriteria'];
                    $id1 = $alter['id_alternatif'];
                    $id2 = $kr['id_kriteria'];
                    $q_nilai = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_aternatif = '$id1' AND id_kriteria = '$id2'");
                    $nilai = mysqli_fetch_array($q_nilai);
                    $x = $nilai['nilai'];
                    
                ?>
                  <td><?= $hasil = $x/sqrt($xy[$cc]); ?></td>
                <?php 
                $cc++;
                if ($cc==$jumlah_kriteria) {
                  $cc=0;
                }
                } 
                
                ?>
              </tr>
              <?php 
               } ?>
                
            </tbody>
            </table>


        </div>
      </div>
    </div>

<!------------------------------------------------------------------------- 
STEP 5
------------------------------------------------------------------------- -->
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Step 5 ( Hasil Perkalian Matrix R dengan bobotnya )</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse <?php echo $p5; ?>">
        <div class="panel-body">
          <h1>Matrix Y</h1>
 <?php 
            $nila = mysqli_query($koneksi, "SELECT * FROM nilai");
            $ni = mysqli_num_rows($nila);
            if($ni != 0){
           ?>
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

            $n = mysqli_num_rows($nil); ?>
                <tbody style="text-align: center;">
              <?php 
              $query_alter = mysqli_query($koneksi, "SELECT * FROM alternatif");
              $cc=0;
              $x = 0;
              $y = 0;
              while ($alter = mysqli_fetch_array($query_alter)) { 
                $alt=$alter['id_alternatif'];
              ?>
              <tr>
                <th scope="col"><p title="<?= $alter['nama_alternatif']; ?>"><?= $alter['kode']; ?><br>[ <?= $alter['nama_alternatif']; ?> ]</p></th>
                <?php //for ($i=0; $i < 3; $i++) { 
                  $query_kr = mysqli_query($koneksi, "SELECT * FROM kriteria");
                  while ($kr = mysqli_fetch_array($query_kr)) {
                    $id_kri = $kr['id_kriteria'];
                    $id1 = $alter['id_alternatif'];
                    $id2 = $kr['id_kriteria'];
                    $q_nilai = mysqli_query($koneksi, "SELECT * FROM nilai WHERE id_aternatif = '$id1' AND id_kriteria = '$id2'");
                    $nilai = mysqli_fetch_array($q_nilai);
                    $xx = $nilai['nilai'];
                    $bobot = $kr['bobot'];
                    $hasil = $xx/sqrt($xy[$cc]);
                    $sifat[$cc] = $kr['sifat'];
                ?>
                  <td><?= $matrixY[$x][$cc] = $hasil*$bobot; ?> <br> <?php echo "X = ".$x." - Y = ". $cc; ?></td>
                <?php 

                $cc++;
                $y++;
                if ($cc==$jumlah_kriteria) {
                  $cc=0;
                }

                } 
                
                ?>
              </tr>
              <?php 
               $x++; } ?>
                  
            </tbody>
            </table>

        </div>

      </div>
    </div>

<!------------------------------------------------------------------------- 
STEP 6
------------------------------------------------------------------------- -->
<?php 
// for ($i=0; $i < $jumlah_kriteria; $i++) { //5
//   for ($j=0; $j < $jumlah_alternatif; $j++) { //3
//     echo $j . " - " . $i . "<br>";
//   }
//   echo "======<br>";
// }
 ?>

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Step 6</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse <?php echo $p6; ?>">
        <div class="panel-body">
          
          <div class="col-md-6"><h2>Solusi Ideal Positif</h2>
            <table class="table table-striped" >
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode</th>
                  <th scope="col">Nilai</th>
                </tr>
              </thead>
              <tbody>
               <?php 
               
               for ($i=0; $i < $jumlah_kriteria; $i++) {
               $hasilideal=0; 
                 for ($ii=0; $ii < $jumlah_alternatif; $ii++) { 
                  if ($hasilideal == 0) {
                    $hasilideal = $matrixY[$ii][$i];
                  }
                              if ($sifat[$i]=="cost") {
                                if ($hasilideal >= $matrixY[$ii][$i] ){
                                  $hasilideal = $matrixY[$ii][$i];
                                 }
                              }else if($sifat[$i]=="benefit"){
                                 if ($hasilideal <= $matrixY[$ii][$i]){
                                 $hasilideal = $matrixY[$ii][$i];
                                 }
                              }
                 }
                 $idealpositif[$i] = $hasilideal;

                ?>
                <tr>
                  <th scope="row"><?= $i+1; ?></th>
                  <td>A<?= $i+1; ?>+</td>
                  <td> <?php echo $idealpositif[$i]; ?></td> 
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
          
          <div class="col-md-6">
          <h2>Solusi Ideal Negatif</h2>
            <table class="table table-striped" >
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode</th>
                  <th scope="col">Nilai</th>
                </tr>
              </thead>
              <tbody>
               <?php 
               
               for ($i=0; $i < $jumlah_kriteria; $i++) { 
                $hasilideall= 0;
                 for ($ii=0; $ii < $jumlah_alternatif; $ii++) { 
                  if ($hasilideall == 0) {
                    $hasilideall = $matrixY[$ii][$i];
                  }
                              if ($sifat[$i]=="cost") {
                                if ($hasilideall <= $matrixY[$ii][$i]){
                                    $hasilideall = $matrixY[$ii][$i];
                                 }
                              }else if($sifat[$i]=="benefit"){
                                if ($hasilideall >= $matrixY[$ii][$i] ){
                                    $hasilideall = $matrixY[$ii][$i];
                                 }
                              }
                 }
                 $idealnegatif[$i] = $hasilideall;
                ?>
                <tr>
                  <th scope="row"><?= $i+1; ?></th>
                  <td>A<?= $i+1; ?>+</td>
                  <td> <?php echo $idealnegatif[$i]; ?></td> 
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>


        </div>
      </div>
    </div>

<!------------------------------------------------------------------------- 
STEP 7
------------------------------------------------------------------------- -->
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Step 7</a>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse <?php echo $p7; ?>">
        <div class="panel-body">
          

          <div class="col-md-6">
            <h2>Jarak Alternatif terhadap <br>Solusi ideal Positif</h2>
            <table class="table table-striped" >
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode</th>
                  <th scope="col">Nilai</th>
                </tr>
              </thead>
              <tbody>
               <?php 
               
               for ($i=0; $i < $jumlah_alternatif; $i++) { 
                $perhitungan = 0;
                 for ($ii=0; $ii < $jumlah_kriteria; $ii++) { 
                  $sq = $idealpositif[$ii] - $matrixY[$i][$ii];                  
                    $perhitungan = $perhitungan + ($sq * $sq);
                 }
                 $hasildplus = sqrt($perhitungan);
                 $dpositif[$i] = $hasildplus;
                ?>
                <tr>
                  <th scope="row"><?= $i+1; ?></th>
                  <td>D<?= $i+1; ?>+</td>
                  <td> <?php echo $hasildplus; ?></td> 
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
          
          <div class="col-md-6">
          <h2>Jarak Alternatif terhadap <br>Solusi ideal Negatif</h2>
            <table class="table table-striped" >
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode</th>
                  <th scope="col">Nilai</th>
                </tr>
              </thead>
              <tbody>
               <?php 
               
            for ($i=0; $i < $jumlah_alternatif; $i++) { 
                $perhitungan = 0;
                 for ($ii=0; $ii < $jumlah_kriteria; $ii++) { 
                  $sq = $matrixY[$i][$ii] - $idealnegatif[$ii];                  
                    $perhitungan = $perhitungan + ($sq * $sq);
                 }
                  $hasildnegatif = sqrt($perhitungan);
                  $dnegatif[$i] = $hasildnegatif;
                ?>
                <tr>
                  <th scope="row"><?= $i+1; ?></th>
                  <td>D<?= $i+1; ?>-</td>
                  <td> <?php echo $hasildnegatif; ?></td> 
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div> 
</div>
<!------------------------------------------------------------------------- 
STEP 8
------------------------------------------------------------------------- -->
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Step 8</a>
        </h4>
      </div>
      <div id="collapse8" class="panel-collapse collapse <?php echo $p8; ?>">
        <div class="panel-body">

           <table class="table table-striped" >
              <thead>
                <tr>
                  <th scope="col">Kode</th>
                  <th scope="col">Nilai</th>
                  <th scope="col">Rangking</th>
                </tr>
              </thead>
              <tbody>
               <?php 
               for ($x=0; $x < $jumlah_alternatif; $x++) { 
                 $v = $dnegatif[$x]/($dnegatif[$x]+$dpositif[$x]);
                 $nilaiv[$x] = $v;
               }
            for ($i=0; $i < $jumlah_alternatif; $i++) { 
                ?>
                <tr>
                  <th scope="row">V<?= $i+1; ?> </th>
                  <td> <?php echo $nilaiv[$i]; ?></td>
                  <td> </td> 
                </tr>
              <?php } ?>
              </tbody>
            </table>

        </div>
      </div>
    </div>
  </div> 
</div>
<!------------------------------------------------------------------------- 
STEP 9
------------------------------------------------------------------------- -->
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">Step 9</a>
        </h4>
      </div>
      <div id="collapse9" class="panel-collapse collapse <?php echo $p9; ?>">
        <div class="panel-body">
          555555

        </div>
      </div>
    </div>
  </div> 
</div>
<!------------------------------------------------------------------------- 
STEP 10
------------------------------------------------------------------------- -->
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse10">Step 10</a>
        </h4>
      </div>
      <div id="collapse10" class="panel-collapse collapse <?php echo $p10; ?>">
        <div class="panel-body">
          10

        </div>
      </div>
    </div>
  </div> 
</div>





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
