<?php
include("../koneksi.php");	
   $cek = "DELETE FROM `relasi` WHERE `id_relasi` = '".$_REQUEST['delete_id']."'";
   $query_edit = mysqli_query($koneksi,$cek);	

	if($query_hapus) {
		header('Location: kelola_relasi.php');
	}
	else
		header('Location: kelola_relasi.php');