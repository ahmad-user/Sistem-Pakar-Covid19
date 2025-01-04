<?php
include("../koneksi.php");
if (isset($_POST['submit'])) {
   $kd_gejala = $_POST['kdgejala']; 
   $nm_gejala = $_POST['nmgejala'];
	
   $cek = "UPDATE `gejala` SET `kd_gejala` = '$kd_gejala', `nm_gejala`='$nm_gejala' WHERE `id_gejala` = '".$_REQUEST['id']."'";
   $query_add = mysqli_query($koneksi,$cek);

	if($query_add) {
		header('Location: kelola_gejala.php');
	}
	else
		header('Location: edit_gejala.php');
}
?>