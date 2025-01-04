<!DOCTYPE html>
<html lang="en">
<head>
<title>Sistem Pakar</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
 .center_prod_box_big img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 300px;
  float: left;
  margin-right: 20px;
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
      <div class="center_title_bar">Welcome to User!</div>
      <div class="prod_box_big">
        
        <div class="center_prod_box_big " >
         
          
          <img src="images/omicron.jpg" alt="covid"  data-aos="fade-right"   />
          <p  data-aos="fade-up" >Varian Omicron merupakan salah satu hasil mutasi virus Corona. 
           Berdasarkan bukti yang ada sejauh ini, varian Omicron memiliki tingkat mutasi yang tinggi
           sehingga bisa berdampak terhadap karakteristik virus, termasuk tingkat penularan virus dan 
           keparahan penyakit yang ditimbulkan. Subvarian terakhir yang ditemukan adalah sub varian Omicron 
           BA.4, BA.5, XBB , dan XBB 1.5 (virus Kraken) yang juga sudah terdeteksi di Indonesia.</p> 
        </div>
      </div>
    </div>
  </div>
  <div class="footer">
  	<div class="right_footer"> Create By Muhammad Fadli</div>
  </div>
</div>


<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
      once: false, 
      duration: 1000, 
      });
   </script>
</body>
</html>
