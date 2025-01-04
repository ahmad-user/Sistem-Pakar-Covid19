<?php
include("../koneksi.php");
if (isset($_POST['submit'])) {
   $kd_gejala = $_POST['kdgejala']; 
   $nm_gejala = $_POST['nmgejala'];
	
   $cek = "INSERT INTO `gejala`(`id_gejala`, `kd_gejala`, `nm_gejala`) VALUES (NULL,'$kd_gejala','$nm_gejala')";
   $query_add = mysqli_query($koneksi,$cek);

	if($query_add) {
		header('Location: kelola_gejala.php');
	}
	else
		header('Location: add_gejala.php');
}
?>