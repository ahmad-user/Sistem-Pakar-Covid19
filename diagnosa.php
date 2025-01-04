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
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
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
      <div class="center_title_bar">Silahkan Pilih Gejala Yang Anda Alami...!</div>
      <div class="prod_box_big">
        <div class="center_prod_box_big">
          <?php 
			$NOIP = $_SERVER['REMOTE_ADDR'];
			# Periksa apabila sudah ditemukan
			$sql_cekh = "SELECT * FROM `tmp_penyakit` WHERE `noip`='$NOIP' GROUP BY `kd_penyakit`";
			$qry_cekh = mysqli_query($koneksi,$sql_cekh);
			$hsl_cekh = mysqli_num_rows($qry_cekh);
			  if ($hsl_cekh == 1) {
				$hsl_data = mysqli_fetch_array($qry_cekh);
				$sql_pasien = "SELECT * FROM `tmp_pengguna` WHERE `noip`='$NOIP' order by `id`";
				$qry_pasien = mysqli_query($koneksi,$sql_pasien);
				$hsl_pasien = mysqli_fetch_array($qry_pasien);
				$sql_in = "INSERT INTO hasil_diagnosa SET
				          nama='$hsl_pasien[nama]',
						  kelamin='$hsl_pasien[kelamin]',
						  umur='$hsl_pasien[umur]',
					      alamat='$hsl_pasien[alamat]',
					      pekerjaan='$hsl_pasien[pekerjaan]',
						  kd_penyakit='$hsl_data[kd_penyakit]',
						  noip	=	'$hsl_pasien[noip]',
						  tanggal='$hsl_pasien[tanggal]'";
				mysqli_query($koneksi,$sql_in);			   
				   echo "<meta http-equiv='refresh' content='0; url=AnalisaHasil.php'>";
				   exit;
					}
					$sqlcek = "SELECT * FROM `tmp_analisa` WHERE `noip` = '$NOIP'";
					$qrycek = mysqli_query($koneksi,$sqlcek);
					$datacek= mysqli_num_rows($qrycek);
					if ($datacek >= 1) {
					// Seandainya tmp kosong
						$sqlg = "SELECT gejala.* FROM gejala,tmp_analisa WHERE gejala.kd_gejala=tmp_analisa.kd_gejala 
								 AND tmp_analisa.noip='$NOIP' AND NOT tmp_analisa.kd_gejala IN(SELECT kd_gejala 
								 FROM tmp_gejala WHERE noip='$NOIP') ORDER BY gejala.kd_gejala LIMIT 1";
						$qryg = mysqli_query($koneksi,$sqlg) or die ("Gagal $qryg : ".mysqli_error($koneksi));
						$datag = mysqli_fetch_array($qryg) or die ("Gagal datag : ".mysqli_error($koneksi));
						$kdgejala = $datag['kd_gejala'];
						$gejala   = $datag['nm_gejala'];
						echo "ADA Data ($sqlg)";	
					}
					else {
						// Seandainya tmp kosong
						$sqlg = "SELECT * FROM `gejala` ORDER BY `kd_gejala` LIMIT 1";
						$qryg = mysqli_query($koneksi,$sqlg);
						$datag = mysqli_fetch_array($qryg);
						$kdgejala = $datag['kd_gejala'];
						$gejala   = $datag['nm_gejala'];
					}
					?>
					<html>
					<head>
					<script type="text/javascript" src="jquery-1.2.6.pack.js"></script>
					<script type="text/javascript">
					$(document).ready(function()
							{
								$("form").submit(function()
								{
									if (!isCheckedById("nm_gejala"))
									{
										alert ("Anda Belum Memilih Gejala Apapun\nSilahkan Pilih Gejala..!");
										return false;
									}else{				
										return true; //submit the form
										}				
								});
								function isCheckedById(id)
								{
									var checked = $("input[@id="+id+"]:checked").length;
									if (checked == 0)
									{
										return false;
									}
									else
									{
										return true;
									}
								}
								// pilih bobot
								function isCheckedById2(id)
								{
									var checked = $("option[@id="+id+"]:checked").length;
									if (checked =="")
									{
										return false;
									}
									else
									{
										return true;
									}
								}
								//--
							});
					</script>
					<style type="text/css">
					ul {list-style:none;}
					li {line-height:-6px; font-weight:normal; color:#09F;}
					</style>
					</head>
					<body>
					<div class="konten">
					<form  method="post" name="form" action="konsulperiksa.php">
					  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#FFFFFF">
						<tr>
						<td width="504" >
						<ul style="list-style:none; font-family:Courier New;">
						<?php
						$kosong_tmp_penyakit=mysqli_query($koneksi,"DELETE FROM tmp_penyakit");
						$query=mysqli_query($koneksi,"SELECT * FROM gejala ORDER BY `kd_gejala`") or die("Query Error..!" .mysqli_error($koneksi));
						while ($row=mysqli_fetch_array($query)){
						?>
						  <li><h4><strong>
							<input type="checkbox" name="gejala[]" id="gejala" value="<?php echo $row['kd_gejala'];?>">
							<?php echo $row['nm_gejala'];?>(<?php echo $row['kd_gejala'];?>)
						  </li></h4></strong>
					    <?php 
						  } 
						?>
					    </ul>
						</td> </tr>
						<tr>  
						  <td width="54" align="Left">
						  <button type="submit" class="btn btn-primary">Diagnosa</button>
						  <button type="reset" class="btn btn-primary">Reset</button>  
						</td>
						</tr>
					  </table>
					</form></div>
				  <iframe style="height:1px" src="" frameborder=0 width=1></iframe> 
               </div>
             </div>
           </div>
         <div class="right_content">&nbsp;</div>
        </div>
      <div class="footer">
    <div class="right_footer"> Create By STMIK GLOBAL</div>
  </div>
</div>
</body>
</html>