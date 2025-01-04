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

<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 30%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Create two equal columns that floats next to each other */
.column1 {
  float: right;
  width: 70%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
  border: 1px solid black;
}


/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
 
  

</style>
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
      <div class="center_title_bar">Profil Penulis</div>
      <div class="prod_box_big">
        <div class="center_prod_box_big">
		   <div class="row">
			  <div class="column"><img src="images/org2.png" width="70%"></div>
				<div class="column1" style="background-color:#fff">
					<p>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
          Muhammad Fadilah</p>
					<p>Program Studi : Teknik Informatika
            <p>Konsentrasi &nbsp;&nbsp;&nbsp;&nbsp;
          : Sofware Engeneering</p>
          </p>
          <br>
          <p>Dosen pembimbing 1 : M.Ramadhan Julianti, M.T </p>
          <p>Dosen pembimbing 2 : Mila Amri, S.Si., M.M</p>
				</div>
		    </div>						
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