<?php
include("../koneksi.php");
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition:attachment; filename=cetak_hasil.xls");
?>
<!DOCTYPE html>
<html lang="en">
<body>
  <table cellpadding="2" cellspacing="2" border="2" bgcolor="#EDE7E7" bordercolor="#000000">
    <thead>
       <tr>
        <th colspan="4"><div align="center">DINAS PUSKESMAS KOTA TANERANG</div></th>
      </tr>
      <tr>
        <th colspan="4"><div align="center">IDENTITAS PUSKESMAS</div></th>
      </tr>
      <?php
		$query = "SELECT * FROM `pasien` WHERE `nama` = '".$_REQUEST['id']."' ORDER BY `id`";
		 $result = mysqli_query($koneksi,$query); //execute the query $query 
	     $data = mysqli_fetch_array($result);	
	  ?>
      <tr>
        <th colspan="4"><div align="left">
        Nama : <?php echo $data['nama'] ?><br>
        Alamat : <?php echo $data['alamat'] ?><br>
        Gender : <?php echo $data['kelamin'] ?><br>
        Pekerjaan : <?php echo $data['pekerjaan'] ?><br>
        </div></th>
      </tr>
      <tr>
        <th width="4%" height="41"><div align="center">No</div></th>
        <th width="11%"><div align="center">Nama Penyakit</div></th>
        <th width="21%"><div align="center">Defenisi</div></th>
        <th width="9%"><div align="center">Solusi</div></th>
      </tr>
     </thead>
     <tbody>
       <?php
         $query = "SELECT * FROM `hasil_diagnosa` INNER JOIN `penyakit` ON `hasil_diagnosa`.`kd_penyakit` = `penyakit`.`kd_penyakit`          WHERE `nama` = '".$_REQUEST['id']."' ORDER BY `id`";
		 $result = mysqli_query($koneksi,$query); //execute the query $query 
	     $No = 1;
	       while ($data = mysqli_fetch_array($result)) {
	   ?>
       <tr>
      <td><div align="center"><?php echo $No ?></div></td>
		 <td><?php echo $data['nm_penyakit'] ?></td>
		 <td><?php echo $data['definisi'] ?></td>
		 <td><?php echo $data['solusi'] ?></td>
       </tr>
       <tr>
         <td colspan="4"><div align="left">:: Gejala - Gejala ::</div></td>
       </tr>
       <?php
		$query1 = "SELECT * FROM `gejala` INNER JOIN `relasi` ON `gejala`.`kd_gejala` = `relasi`.`kd_gejala` 
				  WHERE `kd_penyakit` = '".$data['kd_penyakit']."' ORDER BY `relasi`.`kd_gejala`";
		$result1 = mysqli_query($koneksi,$query1); //execute the query $query
		  $No_gejala = 1;
		  while ($data1 = mysqli_fetch_array($result1)) {
	   ?>
       <tr>
         <td colspan="4"><div align="left"><?php echo $No_gejala ?>. <?php echo $data1['nm_gejala'] ?></div></td>
       </tr>
       <?php
			$No_gejala++;
		    }
		 $No++;
		}
	   ?>                                                                                
     </tbody>
   </table>
</body>
</html>