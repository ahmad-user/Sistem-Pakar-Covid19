<?php
include("../koneksi.php");
if (isset($_POST['submit'])) {
   $kd_penyakit = $_POST['kdpenyakit']; 
   $kd_gejala = $_POST['kdgejala'];
	
   $cek = "UPDATE `relasi` SET `kd_penyakit` = '$kd_penyakit', `kd_gejala`='$kd_gejala' WHERE `id_relasi` = '".$_REQUEST['id']."'";
   $query_add = mysqli_query($koneksi,$cek);

	if($query_add) {
		header('Location: kelola_relasi.php');
	}
	else
		header('Location: edit_relasi.php');
}
?>