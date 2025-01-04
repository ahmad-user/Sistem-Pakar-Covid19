<?php
include("../koneksi.php");
if (isset($_POST['submit'])) {
   $kd_penyakit = $_POST['kdpenyakit']; 
   $nm_penyakit = $_POST['nmpenyakit']; 
   $defenisi = $_POST['definisi']; 
   $uraian = $_POST['uraian']; 
   $solusi = $_POST['penanganan'];
	
   $cek = "UPDATE `penyakit` SET `kd_penyakit`='$kd_penyakit', `nm_penyakit`='$nm_penyakit', `definisi`='$defenisi', `solusi`='$solusi', `uraian`='$uraian' WHERE `id_penyakit` = '".$_REQUEST['id']."'";
   $query_add = mysqli_query($koneksi,$cek);

	if($query_add) {
		header('Location: kelola_penyakit.php');
	}
	else
		header('Location: edit_penyakit.php');
}
?>




UPDATE `penyakit` SET `id_penyakit`=[value-1],`kd_penyakit`=[value-2],`nm_penyakit`=[value-3],`definisi`=[value-4],`solusi`=[value-5],`uraian`=[value-6] WHERE 1