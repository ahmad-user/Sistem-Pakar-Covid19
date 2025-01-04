<?php
include("../koneksi.php");	
   $cek = "DELETE FROM `penyakit` WHERE `id_penyakit` = '".$_REQUEST['delete_id']."'";
   $query_edit = mysqli_query($koneksi,$cek);	

	if($query_hapus) {
		header('Location: kelola_penyakit.php');
	}
	else
		header('Location: kelola_penyakit.php');