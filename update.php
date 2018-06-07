<?php 
include ('koneksi.php');
              if(isset($_POST['updatekriteria'])){
                $id_kriteria = $_POST['idkriteria'];
                $kodekriteria = $_POST['kodekriteria'];
                $namakriteria = $_POST['namakriteria'];
                $atribut = $_POST['atribut'];
                $bobot = $_POST['bobot'];  
                $query = mysqli_query($koneksi, "UPDATE kriteria 
                	SET kode_kriteria = '$kodekriteria', nama_kriteria = '$namakriteria', sifat = '$atribut', bobot = '$bobot' WHERE id_kriteria = $id_kriteria ");
                //$query = mysqli_query($koneksi, "UPDATE kriteria SET kode_kriteria = 'aa', nama_kriteria = 'qq', sifat = 'cost', bobot = 'rr' WHERE id_kriteria = 1");

                mysqli_close($koneksi);
                header("location: index.php?posisi=1");      
                }
            if(isset($_POST['updatealternatif'])){
                echo $idalternatif = $_POST['idalternatif'];
                echo $kodealternatif = $_POST['kodealternatif'];
                echo $namaalternatif = $_POST['namaalternatif'];
                $query = mysqli_query($koneksi, "UPDATE alternatif SET kode = '$kodealternatif', nama_alternatif = '$namaalternatif' WHERE id_alternatif = $idalternatif ");
                $query = mysqli_query($koneksi, "UPDATE kriteria SET kode_kriteria = 'aa', nama_kriteria = 'qq', sifat = 'cost', bobot = 'rr' WHERE id_kriteria = 1");

                mysqli_close($koneksi);
                header("location: index.php?posisi=2");      
                }
            
 ?> 