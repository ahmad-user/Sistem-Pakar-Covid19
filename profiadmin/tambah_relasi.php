<?php
include("../koneksi.php");
if (isset($_POST['submit'])) {
   $kd_penyakit = $_POST['kdpenyakit']; 
   $kd_gejala = $_POST['kdgejala'];
	
   $cek = "INSERT INTO `relasi`(`id_relasi`, `kd_penyakit`, `kd_gejala`) VALUES (NULL,'$kd_penyakit','$kd_gejala')";
   $query_add = mysqli_query($koneksi,$cek);

	if($query_add) {
		header('Location: kelola_relasi.php');
	}
	else
		header('Location: add_relasi.php');
}
?>