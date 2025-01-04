<?php
include("koneksi.php");
if (isset($_POST['submit'])) {
   $Nama = $_POST['nama']; 
   $Alamat = $_POST['alamat'];
   $JK = $_POST['kelamin']; 
   $Pekerjaan = $_POST['pekerjaan']; 
   $Telp = $_POST['telp'];
   $NOIP = $_SERVER['REMOTE_ADDR'];
	
   $cek = "INSERT INTO `pasien`(`id`, `alamat`, `kelamin`, `nama`, `pekerjaan`, `tanggal`,`telp`,`noip`) 
          VALUES (NULL,'$Alamat','$JK','$Nama','$Pekerjaan',NOW(),'$Telp','$NOIP')";
   
   $query_edit = mysqli_query($koneksi,$cek);
	

	if($query_edit) {
		header('Location: diagnosa.php');
	}
	else
		header('Location: konsultasi.php');
}
?>