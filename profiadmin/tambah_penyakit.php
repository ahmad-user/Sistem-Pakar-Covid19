<?php
include("../koneksi.php");
if (isset($_POST['submit'])) {
   $kd_penyakit = $_POST['kdpenyakit']; 
   $nm_penyakit = $_POST['nmpenyakit'];
   $penjelasan = $_POST['defenisi'];
   $solusi = $_POST['solusi'];
   $uraian = $_POST['uraian'];
	
  $cek = "INSERT INTO `penyakit`(`id_penyakit`, `kd_penyakit`, `nm_penyakit`, `definisi`, `solusi`, `uraian`) 
          VALUES (NULL,'$kd_penyakit','$nm_penyakit','$penjelasan','$solusi','$uraian')";
   $query_add = mysqli_query($koneksi,$cek);

	if($query_add) {
		header('Location: kelola_penyakit.php');
	}
	else
		header('Location: add_penyakit.php');
}
?>