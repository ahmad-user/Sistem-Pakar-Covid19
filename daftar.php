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
      <div class="center_title_bar">Daftar Penyakit</div>
      <div class="prod_box_big">
        <div class="center_prod_box_big">
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="pencarian" id="pencarian">			
			Nama Penyakit:<br>
			<input type="text" name="search" class="field-input" id="search" placeholder="Search for names..">
			<input type="submit" class="button" name="submit" id="submit" value="CARI">
			</form>
			<table id="customers">
			  <tr>
				<th width="8%">Kode Penyakit</th>
				<th width="17%">Nama Penyakit</th>
				<th width="70%">Defenisi</th>
			  </tr>
			  <?php
				$noPage = (isset($_GET['page']))? $_GET['page'] : 1;
				$dataPerPage = 2;
				$offset = ($noPage - 1) * $dataPerPage;
				if ((isset($_POST['submit'])) AND ($_POST['search'] <> "")) {
				   $search = $_POST['search'];
				   $query = "SELECT * FROM `penyakit` WHERE `nm_penyakit` LIKE '%$search%' ORDER BY `id_penyakit`";
				   $result = mysqli_query($koneksi,$query); //execute the query $query
				   $jumlah = mysqli_num_rows($result); //cek data in query $result
					  if ($jumlah > 0) {
						 while ($data = mysqli_fetch_array($result)) {			  
			  ?>
			  <tr>
				<td><div align="center"><strong><?php echo $data['kd_penyakit'] ?></strong></div></td>
				<td><div align="left"><strong><?php echo $data['nm_penyakit'] ?></strong></div></td>
				<td><div align="left"><strong><?php echo $data['definisi'] ?></strong></div></td>
			  </tr>
			  <tr>
				<td align="left" colspan="4"><strong>:: Gejala - Gejala ::</strong></td>
			  </tr>
			  <?php
				$query1 = "SELECT * FROM `gejala` INNER JOIN `relasi` ON `gejala`.`kd_gejala` = `relasi`.`kd_gejala` 
				          WHERE `kd_penyakit` = '".$data['kd_penyakit']."' ORDER BY `relasi`.`kd_gejala`";
				$result1 = mysqli_query($koneksi,$query1); //execute the query $query
				  $No_gejala = 1;
				  while ($data1 = mysqli_fetch_array($result1)) {
			  ?>
			  <tr>
				<td align="left" colspan="4"><?php echo $No_gejala ?>. <?php echo $data1['nm_gejala'] ?></td>
			  </tr>
			  <?php
				 $No_gejala++;
				    }
				  }
				}
				else 
				  {
					echo "Data Not Available";
				  }
				}
				else
				   {					
					$total_data  = "SELECT COUNT(*) AS jumData FROM `penyakit` ORDER BY `id_penyakit`";
                    $query = "SELECT * FROM `penyakit` ORDER BY `id_penyakit` LIMIT $offset, $dataPerPage";
					$result = mysqli_query($koneksi,$query); //execute the query $query 
						while ($data = mysqli_fetch_array($result)) {			  
				?>
			  <tr>
				<td><div align="center"><strong><?php echo $data['kd_penyakit'] ?></strong></div></td>
				<td><div align="left"><strong><?php echo $data['nm_penyakit'] ?></strong></div></td>
				<td><div align="left"><strong><?php echo $data['definisi'] ?></strong></div></td>
			  </tr>
			  <tr>
				<td align="left" colspan="4"><strong>:: Gejala - Gejala ::</strong></td>
			  </tr>
			  <?php
				$query1 = "SELECT * FROM `gejala` INNER JOIN `relasi` ON `gejala`.`kd_gejala` = `relasi`.`kd_gejala` 
				          WHERE `kd_penyakit` = '".$data['kd_penyakit']."' ORDER BY `relasi`.`kd_gejala`";
				$result1 = mysqli_query($koneksi,$query1); //execute the query $query
				  $No_gejala = 1;
				  while ($data1 = mysqli_fetch_array($result1)) {
			  ?>
			  <tr>
				<td align="left" colspan="4"><?php echo $No_gejala ?>. <?php echo $data1['nm_gejala'] ?></td>
			  </tr>	
			  <?php
				   $No_gejala++;
				   }
				 }
				$hasil   = mysqli_query($koneksi,$total_data);
				$data    = mysqli_fetch_array($hasil);

				$jumData = $data['jumData'];
				$jumPage = ceil($jumData/$dataPerPage);					

				$showPage = 1;
			  ?>
			  <tr>
				<td colspan="8">
				  <div class="center">
					<div class="pagination">
					<?php
					 //menampilkan link halaman awal
						if ($noPage != 1) 
							echo "<a href='".$_SERVER['PHP_SELF']."?page=".$showPage."' class=active>&laquo;First</a>&nbsp&nbsp";
							// menampilkan link previous
							 if ($noPage > 1) 
								 echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."' class=active>Prev</a>&nbsp&nbsp";
								 // memunculkan nomor halaman dan linknya
								 for($page = 1; $page <= $jumPage; $page++)
									{
									  if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
										{   
										  if (($showPage == 1) && ($page != 2)) ; 
										  if (($showPage != ($jumPage - 1)) && ($page == $jumPage));
										  if ($page == $noPage) 
											 echo " <a href='".$_SERVER['PHP_SELF']."?page=".$page."' class=active>".$page."</a>&nbsp";
										  else 
											 echo " <a href='".$_SERVER['PHP_SELF']."?page=".$page."' class=active>".$page."</a>&nbsp";
										  $showPage = $page;          
										}
									}
								 // menampilkan link next
								 if ($noPage < $jumPage) 
									 echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."' class=active>Next</a>&nbsp&nbsp";
							 //menampilkan link halaman akhir
						 if ($noPage != $jumPage) 
						    echo "<a href='".$_SERVER['PHP_SELF']."?page=".$jumPage."' class=active>Last&raquo;</a>&nbsp&nbsp";
					?>	
					</div>  
				  </div>
			    </td>
			  </tr>			  
			  <?php 
				}
			 ?>	
			</table>
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