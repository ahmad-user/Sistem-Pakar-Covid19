<?php
session_start();
if (isset($_SESSION['nama'])) 
{
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="UTF-8" />
  <title>Administrator</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
  <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="padTop53 " >
  <div id="wrap">
     <div id="top">
        <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
           <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
           <i class="icon-align-justify"></i></a>
           <header class="navbar-header"><a href="../profiadmin/" class="navbar-brand"><img src="assets/img/logo.png" alt="" /></a></header>
           <ul class="nav navbar-top-links navbar-right">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i></a>
				 <ul class="dropdown-menu dropdown-user">
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="icon-signout"></i> Logout </a></li>
                 </ul>
              </li>
           </ul>
        </nav>
      </div>
    <div id="left">
      <div class="media user-media well-small">
         <a class="user-link" href="../profiadmin/"><img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif" /></a><br />
         <div class="media-body">
            <h5 class="media-heading">Admin</h5>
            <ul class="list-unstyled user-info">                        
               <li><a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a>&nbsp;&nbsp;Online</li> 
            </ul>
        </div><br />
      </div>
      <ul id="menu" class="collapse">                
        <li class="panel"><a href="../profiadmin/" ><i class="icon-table"></i>&nbsp;Dashboard&nbsp;</a></li>
        <li><a href="kelola_penyakit.php"><i class="icon-tasks"></i>&nbsp;Kelola Data Penyakit&nbsp;</a></li>
        <li><a href="kelola_gejala.php"><i class="icon-bar-chart"></i>&nbsp;Kelola Data Gejala&nbsp;</a></li>
        <li><a href="kelola_relasi.php"><i class="icon-table"></i>&nbsp;Kelola Data Relasi&nbsp;</a></li>
        <li><a href="kelola_user.php"><i class="icon-tasks"></i>&nbsp;Kelola Data Pengguna&nbsp;</a></li>
        <li><a href="laporan_pasien.php"><i class="icon-film"></i>&nbsp;Laporan Data Pasien&nbsp;</a></li>
        <li><a href="laporan_diagnosa.php"><i class="icon-tasks"></i>&nbsp;Laporan Diagnosa&nbsp;</a></li>
	  </ul>
    </div>
    <div id="content">
       <div class="inner">
		   <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Rumah Sakit Gebang Medika</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body"><h2 data-aos="fade-up">Selamat Datang Admin !!!</h2><br>
                          <p>Tujuan sistem pakar ini dibangun adalah untuk memudah kan para pasien untuk berkonsultasi dengan cepat dan mudah serta </br>
                          di berikan solusi terhadap permasalahan yang di alami  apabila diperlukan untuk tidakan lebih lanjut disarankan menemui dokter </br>
                          spesialis secara langsung.
                          </p>
						
                        </div>
                    </div>
                </div>               
            </div>
       </div> 
    </div>
	</div>
    <div id="footer">
    <p>Create Muhammad Fadli &copy;&nbsp;2023 &nbsp;</p>
    </div>
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
      once: false, 
      duration: 1000, 
      });
   </script>
</body>
</html>
<?php
}
?>