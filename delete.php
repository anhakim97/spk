<?php 
include ('koneksi.php');
if (isset($_GET['id_kriteria'])) {
              $id = $_GET['id_kriteria'];
              if(mysqli_query($koneksi, "DELETE FROM kriteria WHERE id_kriteria = $id ")){
              mysqli_close($koneksi);
              header('location: index.php?posisi=1');
          	}else{
          		echo "Gagal";
          	}
          }

if(isset($_GET['deletedata'])){
                echo "<script>alert('Semua Data berhasil dihapus');</script>";
                mysqli_query($koneksi, "DELETE FROM nilai");
                mysqli_query($koneksi, "DELETE FROM alternatif"); 
                mysqli_query($koneksi, "DELETE FROM kriteria"); 
                mysqli_query($koneksi, "ALTER TABLE nilai AUTO_INCREMENT = 0"); 
                mysqli_query($koneksi, "ALTER TABLE alternatif AUTO_INCREMENT = 0"); 
                mysqli_query($koneksi, "ALTER TABLE kriteria AUTO_INCREMENT = 0"); 
                
                header("location: index.php?posisi=1");   
}
if(isset($_GET['resetnilaialternatif'])){
                echo "<script>alert('Nilai alternafir berhasil direset');</script>";
                mysqli_query($koneksi, "DELETE FROM nilai");
                mysqli_query($koneksi, "ALTER TABLE nilai AUTO_INCREMENT = 0");  
                header("location: index.php?posisi=1");   
}

if (isset($_GET['id_alternatif'])) {
              $id = $_GET['id_alternatif'];
              if(mysqli_query($koneksi, "DELETE FROM alternatif WHERE id_alternatif = $id ")){
              mysqli_close($koneksi);
              header('location: index.php?posisi=2');
            }else{
              echo "Gagal";
            }
}

 ?>