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

                // if (isset($_POST['submitnilaialternatif'])) {
                //     $query_alter = mysqli_query($koneksi, "SELECT * FROM alternatif");
                //     while ($alter = mysqli_fetch_array($query_alter)) { 
                //             $alt=$alter['id_alternatif'];
                //             $query_kr = mysqli_query($koneksi, "SELECT * FROM kriteria");
                //             while ($kr = mysqli_fetch_array($query_kr)) {

                //             }
                //         }
                // }
                $k = mysqli_query($koneksi, "SELECT COUNT(*) FROM kriteria");
                $a = mysqli_query($koneksi, "SELECT COUNT(*) FROM alternatif");

                if (isset($_POST['submitnilaialternatif'])) {
                              $query_alter = mysqli_query($koneksi, "SELECT * FROM alternatif");
                              while ($alter = mysqli_fetch_array($query_alter)) { 
                                $alt=$alter['id_alternatif'];
                                  $query_kr = mysqli_query($koneksi, "SELECT * FROM kriteria");
                                  while ($kr = mysqli_fetch_array($query_kr)) {
                                        $id_kr = $kr['id_kriteria'];
                                        $nil = $alter['id_alternatif']."-".$kr['id_kriteria'];
                                        $nilai = $_POST[$nil];
                                        //echo "id alternatif : ".$alt."<br> id kriteria : ". $id_kr . "<br>nilai : ".$nilai. "<br>=========<br>";
                                        $query = mysqli_query($koneksi, "INSERT INTO nilai (id_aternatif, id_kriteria, nilai) VALUES ($alt, $id_kr, '$nilai')");
                                         }
                                       } 
                mysqli_close($koneksi);
                header("location: index.php?posisi=3");  
                }

                if (isset($_POST['updatenilaialternatif'])) {
                              $query_alter = mysqli_query($koneksi, "SELECT * FROM alternatif");
                              while ($alter = mysqli_fetch_array($query_alter)) { 
                                $alt=$alter['id_alternatif'];
                                  $query_kr = mysqli_query($koneksi, "SELECT * FROM kriteria");
                                  while ($kr = mysqli_fetch_array($query_kr)) {
                                        $id_kr = $kr['id_kriteria'];
                                        $nil = $alter['id_alternatif']."-".$kr['id_kriteria'];
                                        $nilai = $_POST[$nil];
                                        $id1 = $alter['id_alternatif'];
                                        $id2 = $kr['id_kriteria'];
                                        //echo "id alternatif : ".$alt."<br> id kriteria : ". $id_kr . "<br>nilai : ".$nilai. "<br>=========<br>";
                                        $query = mysqli_query($koneksi, "UPDATE nilai SET nilai=$nilai WHERE id_aternatif=$id1 AND id_kriteria=$id2");
                                                                                
                                         }
                                       } 
                // mysqli_close($koneksi);
                // header("location: index.php?posisi=3");  
                }
            
               ?> 