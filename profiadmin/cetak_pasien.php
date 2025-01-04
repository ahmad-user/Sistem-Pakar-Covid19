<?php
include("../koneksi.php");
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition:attachment; filename=cetak_penyakit.xls");
?>
<!DOCTYPE html>
<html lang="en">
<body>
  <table cellpadding="2" cellspacing="2" border="2" bgcolor="#EDE7E7" bordercolor="#000000">
    <thead>
       <tr>
        <th colspan="7"><div align="center">DINAS PUSKESMAS KOTA TANERANG</div></th>
      </tr>   
      <tr>
        <th width="4%" height="41"><div align="center">No</div></th>
        <th width="11%"><div align="center">Nama</div></th>
        <th width="21%"><div align="center">Alamat</div></th>
        <th width="9%"><div align="center">Kelamin</div></th>
        <th width="9%"><div align="center">Pekerjaan</div></th>
        <th width="9%"><div align="center">Telp</div></th>
        <th width="9%"><div align="center">Tangal Daftar</div></th>
      </tr>
     </thead>
     <tbody>
       <?php
         $query = "SELECT * FROM `pasien` ORDER BY `id`";
		 $result = mysqli_query($koneksi,$query); //execute the query $query 
	     $No = 1;
	       while ($data = mysqli_fetch_array($result)) {
	   ?>
       <tr>
         <td><div align="center"><?php echo $No ?></div></td>
		 <td><?php echo $data['nama'] ?></td>
		 <td><?php echo $data['alamat'] ?></td>
		 <td><?php echo $data['kelamin'] ?></td>
		 <td><?php echo $data['pekerjaan'] ?></td>
		 <td><?php echo $data['telp'] ?></td>
		 <td><?php echo $data['tanggal'] ?></td>
       </tr>
       <?php
		 $No++;
		}
	   ?>                                                                                
     </tbody>
   </table>
</body>
</html>