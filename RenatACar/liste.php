<?php

 $baglan= new PDO("mysql:host=localhost;dbname=arackiralama;charset=utf8","root","");
 $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 session_start();
  if(!$_SESSION["giris"])  {
  header("Location:login.php");

}

?>
<!doctype html>
<html lang="en">

  <head>
    <title>RaC-Anasayfa </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
                  <li class="active"><a href="liste.php" class="nav-link">Araçlar</a></li>
                  <li ><a href="kayit.php" class="nav-link">Yeni Kayıt</a></li>
                  <li ><a href="csv.php" class="nav-link">Csv İndir</a></li>
                  <li><a href="islemler.php?islem=cikis" class="nav-link" onclick="if (!confirm('Çıkış Yapmak İstediğinize Emin Misiniz?')) return false;">Çıkış Yap</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

      
      <div class="hero inner-page" style="background-image: url('img/bg/hero_1_a.jpg');background-position: center;">
        
        <div class="container">
          <div class="row align-items-end ">
            
            <div class="col-lg-5">

              <div class="intro">
                <h1><strong>Araba Listesi</strong></h1>
              </div>
            </div>
            <div class="wrap">
              <style>


</style>
    <div class="search">
        <input type="text" id="carSearch" class="searchTerm" placeholder="Araç bilgisi ara..">
        <button type="submit" class="searchButton">
          <i class="fa fa-search"></i>
      </button>
      </div>
    </div>
    
    </div>
  
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
           
          </div>
        </div>
        <div class='row' id="pushResult">
<?php
  error_reporting(0);
    $sayfa = $_GET["sf"];

    if($sayfa =="" || $sayfa <=0){$sayfa=1;}
    $sorgu = $baglan->query("select count(id) as toplam from liste")->fetch();
    $toplamkayit = $sorgu["toplam"];
    $goruntuleneceksayı = 6;
    $toplamsayfa = ceil($toplamkayit/$goruntuleneceksayı);
    $baslangic = ($sayfa - 1)*$goruntuleneceksayı;
    
    //Veritabanı araç listeleme
  
    $sorgu =$baglan->query("select * from liste order by id asc limit $baslangic,$goruntuleneceksayı");
    foreach ($sorgu as $satir){
        
        echo "<div class='col-md-6 col-lg-4 mb-4'>

            <div class='listing d-block  align-items-stretch'>
              <div class='listing-img h-100 mr-4'>
                <img src='IMG/".$satir["resimKod"]."' alt='Image' class='img-fluid'>
              </div>
              <div class='listing-contents h-100'>
                <h3>".$satir["marka"]."</h3>
                <div class='rent-price'>".
                $satir["model"]
                ."</div>
                <div class='d-block d-md-flex mb-3 border-bottom pb-3'>
                 
                  <div class='listing-feature pr-4'>
                    <span class='caption'>Yıl:</span>
                    <span class='number'>".$satir["yil"]."</span>
                  </div>
                  <div class='listing-feature pr-4'>
                    <span class='caption'>Plaka:</span>
                    <span class='number'>".$satir["plaka"]."</span>
                  </div>
                </div>
                <div>
                  <p align='center'><a href='aracduzenle.php?id=".$satir["id"]."'><input type='button' formaction='aracdüzenle.php' class='btn btn-primary btn-sm' value='Düzenle'></a> &nbsp &nbsp&nbsp<a href='islemler.php?islem=arabaSil&&id=".$satir["id"]."'><input type='button' name='sil' formaction='sil.php'  class='btn btn-primary btn-sm' value='Sil'   ></a></p>
                </div>
              </div>

            </div>
            </div>";}
  
   
   
       echo" </div>
            <div class='row' align='center'>
            <div class='col-5' >
            <div class='custom-pagination'>";
            for ($i=1; $i<=$toplamsayfa; $i++){
                echo "<a href='liste.php?sf=$i'>$i</a>";
              }
            echo "  </div>
            </div>
        </div>
      </div>
    </div>";
?>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>    
   
    <script src="js/main.js"></script> 
    <script>
        var oldHTML = $('#pushResult').html();

      $('#carSearch').keyup(function(e){
        var val = $(this).val();
        if(val === ""){
          $('#pushResult').html(oldHTML);
        }
        else{
          $.ajax({
              url:"islemler.php?islem=arama",
              method:"POST",
              data:{
              "data":e.target.value,
              "request":"searchCar"
              },
              success:function(data){
                $('#pushResult').html(data);
              }
          })
        }
      })
    
    </script>

  </body>

</html>
