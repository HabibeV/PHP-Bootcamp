<?php
session_start();
if(!$_SESSION["giris"])  {
  header("Location:login.php");

}

?>
<!doctype html>
<html lang="en">

  <head>
    <title>RaC-Araç Düzenle </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body>

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <div class="site-logo">
                <a href="liste.php"><strong>RentaCar</strong></a>
              </div>
            </div>

            <div class="col-9  text-right">
              
              <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li ><a href="liste.php" class="nav-link">Araçlar</a></li>
                  <li ><a href="kayit.php" class="nav-link">Yeni Kayıt</a></li>
                  <li ><a href="csvp.php" class="nav-link">Csv İndir</a></li>
                  <li><a href="cikis.php" class="nav-link" onclick="if (!confirm('Çıkış Yapmak İstediğinize Emin Misiniz?')) return false;">Çıkış Yap</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

      
      <div class="hero inner-page" style="background-image: url('img/bg/hero_1_a.jpg'); background-position: center;">
        
        <div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-5">

            </div>
          </div>
        </div>
      </div>
  <!-- FORM ICERIK -->

  
  <!-- Section: Design Block -->
<section class="text-center" style="align:center">

  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        width:800px;
        left: 25%;

      
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Bilgileri Düzenle</h2>
            <!-- 2 column grid layout with text inputs for the first and last names -->

            <?php 
            $id=$_GET["id"];
            $baglan= new PDO("mysql:host=localhost;dbname=arackiralama;charset=utf8","root","");
            $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $kontrol = $baglan->query("select *from liste where id='$id'");
            foreach ($kontrol as $kayit){
            echo"
          <form  method='post' action='islemler.php?islem=duzenle' enctype=multipart/form-data>

            <div class='row'>
              <div class='col-md-6 mb-4'>
                <div class='form-outline'>
                <label class='form-label' for='form3Example1'>Marka </label>
                  <input type='text' id='form3Example1' class='form-control' name='marka' value='".$kayit["marka"]."'  /> 
                </div>
              </div>

               
              <div class='col-md-6 mb-4'>
                <div class='form-outline'>
                <label class='form-label' for='form3Example1'>Model </label>
                  <input type='text' id='form3Example1' class='form-control' name='model'  value='".$kayit["model"]."' /> 
                </div>
              </div>

              <div class='row'>
              <div class='col-md-6 mb-4'>
                <div class='form-outline'>
                <label class='form-label' for='form3Example1'>Yıl</label>
                  <input type='text' id='form3Example1' class='form-control' name='yil' value='".$kayit["yil"]."' /> 
                </div>
              </div>

             
              <div class='col-md-6 mb-4'>
                <div class='form-outline'>
                <label class='form-label' for='form3Example1'>Plaka </label>
                  <input type='text' id='form3Example1' class='form-control' name='plaka'  value='".$kayit["plaka"]."'/> 
                </div>
              </div>
            <!--  IMG -->

            <div class='col-md-6 mb-4'>
            <img src='IMG/".$kayit['resimKod']."' width='250px'>

                <div class='form-outline'>
                
                <label class='form-label' for='form3Example1'>Resim </label>

                <input type='file' id='form3Example2'  name='img' value='Yükle' />

                </div>
              </div>
            </div>";}
            ?>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">
              Kaydet
            </button>

       
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
     

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>
