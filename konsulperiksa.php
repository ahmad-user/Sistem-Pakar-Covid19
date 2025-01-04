<?php 
ob_start();
include("koneksi.php");
$gejala 	= '';
$events 	= '';
if (isset($_POST['gejala']))
{
	$selectors 	= htmlentities(implode(',', $_POST['gejala']));
}
$data=$selectors;
echo "$selectors<br>";
$input = $data;
	  $pecah = explode("\r\n\r\n", $input);
	  $text = "";
	  for ($i=0; $i<=count($pecah)-1; $i++)
	  {
	  	$part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
		$text .=$part;
	  }
echo $text;
$kosongtabel=mysqli_query($koneksi,"DELETE FROM tmp_gejala");
$text_line=$data;
$text_line =$data;
$text_line = explode(",",$text_line);
$posisi=0;
for ($start=0; $start < count($text_line); $start++) {
	$baris=$text_line[$start]; 
	$sql="INSERT INTO tmp_gejala (kd_gejala,status) VALUES ('$baris','Y')";
	$query=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
	$posisi++;
print $text_line[$start] . "<BR>";
}
ob_start();
header("location: hasil_diagnosa.php?id=1");
?>