<?php
include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistem Pakar</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<div id="main_container">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/covid.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/distansing.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/germas.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <div id="main_content">
    <div id="menu_tab">
    <?php
      include("menu.php");
	?>
    </div>
    <div class="left_content">&nbsp;</div>
    <div class="center_content">
      <div class="center_title_bar">Hasil Diagnosa</div>
      <div class="prod_box_big">
        <div class="center_prod_box_big">
				<table width="100%">
				 <tr bgcolor="#ffffff">
					<td height="32"  style="color:#C60;"><strong>Identitas Pasien:</strong><hr>
					  <?php
						$query_pasien=mysqli_query($koneksi,"SELECT * FROM `pasien` ORDER BY `id` DESC");      
						$data_pasien=mysqli_fetch_array($query_pasien);
						echo "Nama : ". $data_pasien['nama'] . "<br>";
						echo "Jenis Kelamin : ". $data_pasien['kelamin']. "<br>";
						echo "Pekerjaan Pasien : ". $data_pasien['pekerjaan']. "<br>";
						echo "Alamat : ". $data_pasien['alamat']. "<br><br>";
						echo "<label><strong>Gejala yang diinputkan :</strong> </label><br>";
						echo "<hr>";
	
						$query_gejala_input=mysqli_query($koneksi,"SELECT gejala.nm_gejala AS namagejala,tmp_gejala.kd_gejala AS kodegejala
						                                FROM gejala,tmp_gejala WHERE tmp_gejala.kd_gejala=gejala.kd_gejala");
						$nogejala=0;
						while($row_gejala_input=mysqli_fetch_array($query_gejala_input)){
							$nogejala++;
							echo $nogejala. ".&nbsp".$row_gejala_input['namagejala']."
							&nbsp-&nbsp(".$row_gejala_input['kodegejala'].")"."<br>";
							}
					  ?><p></p>
				    </td>
				 </tr>
				 <tr>
				    <td><strong>Hasil Diagnosa :</strong><br />
				    <hr> 
					  <?php						
					   $query_G = "SELECT * FROM (SELECT COUNT(`kd_penyakit`) AS `Total_P`, `kd_penyakit` FROM `relasi` INNER JOIN `tmp_gejala` ON `tmp_gejala`.`kd_gejala` = `relasi`.`kd_gejala` GROUP BY `kd_penyakit`) AS `Table_G` WHERE `Total_P` = (SELECT COUNT(*) FROM `tmp_gejala`)";
					   $result_G = mysqli_query($koneksi,$query_G); //execute the query $query_G
	                   $data_G = mysqli_fetch_array($result_G);
					   $jml_G = mysqli_num_rows($result_G); //cek data in query $result_G
					   
					   if ($jml_G <> 0) {
						   
						   $query_D = "SELECT * FROM (SELECT COUNT(`kd_penyakit`) AS `Total_P`, `kd_penyakit` FROM `relasi` INNER JOIN `tmp_gejala` ON `tmp_gejala`.`kd_gejala` = `relasi`.`kd_gejala` GROUP BY `kd_penyakit`) AS `Table_Cek` WHERE `Total_P` = (SELECT COUNT(`kd_penyakit`) AS `Total` FROM `tmp_gejala` INNER JOIN `relasi` ON `tmp_gejala`.`kd_gejala` = `relasi`.`kd_gejala` GROUP BY `kd_penyakit` ORDER BY `Total` DESC LIMIT 0,1)";
						   $result_D = mysqli_query($koneksi,$query_D); //execute the query $query_G
						   $data_D = mysqli_fetch_array($result_D); 
					       $jml_D = mysqli_num_rows($result_D); //cek data in query $result_G
						   
						   if ($jml_D <> 0) {
							   
							   $query_H = mysqli_query($koneksi,"SELECT COUNT(`kd_penyakit`) AS `Total_P`, `kd_penyakit` FROM `tmp_gejala`
							                          INNER JOIN `relasi` ON `tmp_gejala`.`kd_gejala` = `relasi`.`kd_gejala` WHERE
													  `kd_penyakit` = '".$data_D['kd_penyakit']."' GROUP BY `kd_penyakit` ORDER BY `Total_P` DESC LIMIT 0,1"); 
							   $data_H = mysqli_fetch_array($query_H);
							   $jml_H = mysqli_num_rows($query_H); //cek data in query $result

							   if ($jml_H <> 0) {
								   
								  $q1=mysqli_query($koneksi,"SELECT * FROM `penyakit` WHERE `kd_penyakit` = '".$data_H['kd_penyakit']."'"); 
							      $data_hasildiagnosa = mysqli_fetch_array($q1);
								   
								  echo "1. Nama Penyakit : ". $data_hasildiagnosa['nm_penyakit'] . "<br>";
								  echo "2. Defenisi : ". $data_hasildiagnosa['definisi']. "<br>";
								  echo "3. Uraian : ". $data_hasildiagnosa['uraian']. "<br>";
								  echo "4. Solusi : ". $data_hasildiagnosa['solusi']. "<br><br>";	
								  echo "<strong>Gejala - Gejala Yang Timbul</strong><br>";	
								  echo "<hr>";
								  $query_gejala_input=mysqli_query($koneksi,"SELECT * FROM `gejala` INNER JOIN `relasi` ON `gejala`.`kd_gejala` = `relasi`.`kd_gejala` WHERE `kd_penyakit` = '".$data_H['kd_penyakit']."' ORDER BY `relasi`.`kd_gejala`");
								  $nogejala=0;
								  while($row_gejala_input=mysqli_fetch_array($query_gejala_input)) {
									$nogejala++;
									echo $nogejala. ".&nbsp".$row_gejala_input['nm_gejala']."
									&nbsp-&nbsp(".$row_gejala_input['kd_gejala'].")"."<br>";
								 }							  
							  }
						   else
							  echo "Tidak Ada Gejala Yang Sesuai2";  
						   }
					   }
	                   else  
					   {
						   echo "Tidak Ada Gejala Yang Sesuai";
					   }
					  ?>
					</td>
				 </tr>
				 </table><br>
        		<button onclick="location.href='diagnosa.php'" class="btn btn-primary" >Ulangi Diagnosa</button> <button onclick="location.href='hasil_pasien.php?id=<?php echo $data_hasildiagnosa['kd_penyakit'];?>&id2=<?php echo $data_pasien['id'];?>'" class="btn btn-primary" >Simpan Hasil</button>
        </div>
      </div>
    </div>
  <div class="right_content">&nbsp;</div>
</div>
<div class="footer">
  <div class="right_footer"> Create By Global Institute</div>
</div>
</div>
</body>
</html>