<?php
include("koneksi.php");

if (isset($_POST['login'])) {
   $user = $_POST['username']; 
   $pass = $_POST['password'];

	$query = "SELECT * FROM user WHERE username = '$user' and password = '$pass'";
	$result =  mysqli_query($koneksi, $query);

	if (!$result) {
		die("Query gagal: " . mysqli_error($koneksi));
	}
	
$cek = mysqli_num_rows($result);
$data = mysqli_fetch_array($result);
	
if ($cek == 1)
	{
		session_start();
		$_SESSION['user'] = $data['username'];
		$_SESSION['nama'] = $data['nama'];
		if ($data['id'] == 0)
			{	
			echo "<script>alert('Login Berhasil');window.location='user/'</script>";
			}
		else
			echo "<script>alert('Login Berhasil');window.location='profiadmin/'</script>";
	}
else
	{
		echo "<script>alert('Login anda salah');window.location='index.php'</script>";
	}
}
?>