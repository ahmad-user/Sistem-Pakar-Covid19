<?php
include("koneksi.php");   

   $data_pasien = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM `pasien` WHERE `id` = '".$_REQUEST['id2']."'"));

   $Alamat = $data_pasien['alamat'];   
   $kd_Penyakit = $_REQUEST['id'];
   $Kelamin = $data_pasien['kelamin']; 
   $Nama = $data_pasien['nama'];
   $Pekerjaan = $data_pasien['pekerjaan']; 
   $telp = $data_pasien['telp'];
   $NOIP = $_SERVER['REMOTE_ADDR'];
	
   $cek = "INSERT INTO `hasil_diagnosa`(`id`, `alamat`, `kd_penyakit`, `kelamin`, `nama`, `pekerjaan`, `tanggal`, `telp`,
          `noip`) VALUES (NULL,'$Alamat','$kd_Penyakit','$Kelamin','$Nama','$Pekerjaan',NOW(),'$telp','$NOIP')";
   
   $query_tambah = mysqli_query($koneksi,$cek);

	if($query_tambah) {
		header('Location: ../Sistem-Pakar-Covid19/');
	}
	else
		header('Location: konsultasi.php');
?>