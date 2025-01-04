<?php
include("../koneksi.php");
if (isset($_POST['submit'])) {
   $username = $_POST['username']; 
   $password = $_POST['password'];
   $nama = $_POST['nama'];
	
  $cek = "UPDATE `user` SET `password`='$password',`nama`='$nama' WHERE `id` = '".$_REQUEST['id']."'";
   $query_add = mysqli_query($koneksi,$cek);

	if($query_add) {
		header('Location: kelola_user.php');
	}
	else
		header('Location: add_user.php');
  }
?>