<?php 
$koneksi = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($koneksi, "topsis");
if(!$db){
    die("Tidak bisa menggunakan database :".mysqli_error());
}
 ?>