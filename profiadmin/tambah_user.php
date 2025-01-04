<?php
include("../koneksi.php");
if (isset($_POST['submit'])) {
   $username = $_POST['username']; 
   $password = $_POST['password'];
   $nama = $_POST['nama'];
	
   $cek = "INSERT INTO `user`(`id`, `username`, `password`, `nama`) VALUES (NULL,'$username','$password','$nama')";
   $query_add = mysqli_query($koneksi,$cek);

	if($query_add) {
		header('Location: kelola_user.php');
	}
	else
		header('Location: add_user.php');
}
?>