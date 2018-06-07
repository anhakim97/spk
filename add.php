              <?php 
              include ('koneksi.php');
              if(isset($_POST['submittambahkriteria'])){
                $kodekriteria = $_POST['kodekriteria'];
                $namakriteria = $_POST['namakriteria'];
                $atribut = $_POST['atribut'];
                $bobot = $_POST['bobot'];    
                $query = mysqli_query($koneksi, "INSERT INTO kriteria (kode_kriteria, nama_kriteria, sifat, bobot) VALUES ('$kodekriteria', '$namakriteria', '$atribut', '$bobot')"); 
                //echo "<script>alert('Kriteria dengan kode [ ".$kodekriteria." ] Berhasil ditambahkan');</script>";
                mysqli_close($koneksi);
                header("location: index.php?posisi=1");             
                }else if(isset($_POST['submittambahalternatif'])){

                $kodealternatif = $_POST['kodealternatif'];
                $namaalternatif = $_POST['namaalternatif'];
                               
                $query = mysqli_query($koneksi, "INSERT INTO alternatif (kode, nama_alternatif) VALUES ('$kodealternatif', '$namaalternatif')");
                //echo "<script>alert('Alternatif dengan kode [ ".$kodealternatif." ] Berhasil ditambahkan');</script>";
                mysqli_close($koneksi);
                header("location: index.php?posisi=2");               
                }
            
               ?> 