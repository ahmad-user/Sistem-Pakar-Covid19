<?php
include("../koneksi.php");	
   $cek = "DELETE FROM `gejala` WHERE `id_gejala` = '".$_REQUEST['delete_id']."'";
   $query_edit = mysqli_query($koneksi,$cek);	

	if($query_hapus) {
		header('Location: kelola_gejala.php');
	}
	else
		header('Location: kelola_gejala.php');