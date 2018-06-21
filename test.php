<?php 
include ('koneksi.php');
$q_nilai = mysqli_query($koneksi, "SELECT nilai FROM nilai WHERE id_aternatif = 1 AND id_kriteria = 1");
$nilai = mysqli_fetch_array($q_nilai);
echo $nilai['nilai'];
 ?>
