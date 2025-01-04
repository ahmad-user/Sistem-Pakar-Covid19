<?php
include("../koneksi.php");	
   $cek = "DELETE FROM `user` WHERE `id` = '".$_REQUEST['delete_id']."'";
   $query_edit = mysqli_query($koneksi,$cek);	

	if($query_hapus) {
		header('Location: kelola_user.php');
	}
	else
		header('Location: kelola_user.php');