<?php 
include ('koneksi.php');

if (isset($_GET['id_kriteria'])) {
                mysqli_query($koneksi, "DELETE FROM nilai");
                mysqli_query($koneksi, "ALTER TABLE nilai AUTO_INCREMENT = 0");
              $id = $_GET['id_kriteria'];
              if(mysqli_query($koneksi, "DELETE FROM kriteria WHERE id_kriteria = $id ")){
              mysqli_close($koneksi);
              header('location: index.php?posisi=1');
          	}else{
          		echo "Gagal";
          	}
          }
if (isset($_GET['id_alternatif'])) {
              echo $id = $_GET['id_alternatif'];
                mysqli_query($koneksi, "DELETE FROM nilai");
                mysqli_query($koneksi, "ALTER TABLE nilai AUTO_INCREMENT = 0");
              if(mysqli_query($koneksi, "DELETE FROM alternatif WHERE id_alternatif = $id ")){
              mysqli_close($koneksi);
              header('location: index.php?posisi=2');
            }else{
              echo "Gagal";
            }
}
if (isset($_GET['resetkriteria'])) {
                mysqli_query($koneksi, "DELETE FROM nilai");
                mysqli_query($koneksi, "ALTER TABLE nilai AUTO_INCREMENT = 0");
                mysqli_query($koneksi, "DELETE FROM kriteria"); 
                mysqli_query($koneksi, "ALTER TABLE kriteria AUTO_INCREMENT = 0");
              mysqli_close($koneksi);
              header('location: index.php?posisi=1');
          }
if (isset($_GET['resetalternatif'])) {
                mysqli_query($koneksi, "DELETE FROM nilai");
                mysqli_query($koneksi, "ALTER TABLE nilai AUTO_INCREMENT = 0");
                mysqli_query($koneksi, "DELETE FROM alternatif"); 
                mysqli_query($koneksi, "ALTER TABLE alternatif AUTO_INCREMENT = 0");
              mysqli_close($koneksi);
              header('location: index.php?posisi=2');
          }
//delete semua data
if(isset($_GET['deletedata'])){
                echo "<script>alert('Semua Data berhasil dihapus');</script>";
                mysqli_query($koneksi, "DELETE FROM nilai");
                mysqli_query($koneksi, "DELETE FROM alternatif"); 
                mysqli_query($koneksi, "DELETE FROM kriteria"); 
                mysqli_query($koneksi, "ALTER TABLE nilai AUTO_INCREMENT = 0"); 
                mysqli_query($koneksi, "ALTER TABLE alternatif AUTO_INCREMENT = 0"); 
                mysqli_query($koneksi, "ALTER TABLE kriteria AUTO_INCREMENT = 0"); 
                
                header("location: index.php");   
}
if(isset($_GET['resetnilaialternatif'])){
                echo "<script>alert('Nilai alternafir berhasil direset');</script>";
                mysqli_query($koneksi, "DELETE FROM nilai");
                mysqli_query($koneksi, "ALTER TABLE nilai AUTO_INCREMENT = 0");  
                header("location: index.php?posisi=1");   
}

if (isset($_GET['deletenilai'])) {
                mysqli_query($koneksi, "DELETE FROM nilai");
                mysqli_query($koneksi, "ALTER TABLE nilai AUTO_INCREMENT = 0"); 
                header("location: index.php"); 
}

 ?>