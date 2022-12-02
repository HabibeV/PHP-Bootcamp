<?php 

 class kontrol {

    public $baglan ;
    
    public function __construct(){
        session_start();
        $this->baglan= new PDO("mysql:host=localhost;dbname=arackiralama;charset=utf8","root","");
        ($this->baglan)->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }

   //giriş fonksiyonu
      public function login($userName,$password){
      $sorgu =($this->baglan)->query("select * from login where (kullaniciAdi='$userName' && sifre='$password')");
      $kayitsay = $sorgu->rowCount();

      if($kayitsay>0){
          setcookie("kullanici",$userName,time()+60*60);//kullanıcı adını sakladığım cookie
          $_SESSION["giris"] =sha1(md5("var"));
          $sonuc = header("Location: liste.php?id='$userName'");
          
          
      }
      else{
          $sonuc =header("Location:login.php");
          
      }
      return $sonuc;
   }



//araba düzenleme fonksiyonu
   public function duzenle($marka,$model,$yil,$plaka){
   
   $hedef="IMG/".$_FILES["img"]["name"];
   $resim=$_FILES["img"]["name"];
   
   $kontrol = $this->baglan->query("select *from liste where plaka='$plaka'");
   
   foreach ($kontrol as $parca){  
       if($resim==""){
           $resim=$parca['resimKod'];
       }
         $id=$parca["id"];}
   $kayitsay = $kontrol->rowCount(); 
   if($kayitsay>0){
   $update = $this->baglan->query("update liste set marka='$marka', model='$model' ,yil='$yil' ,
   plaka='$plaka', resimKod='$resim' where id='$id'");
   $ekle= $update->execute();
   $sonuc = move_uploaded_file($_FILES["img"]["tmp_name"],  $hedef);
   $cikti= "<script type='text/javascript'>alert('Başarılı : Kayıt Güncellendi ! ');
       window.top.location = 'liste.php' </script>";
   }
   return $cikti;
 }

 //Araba Kayıt Fonksiyonu
 
public function  aracKayit($marka,$model,$yil,$plaka)  {

    
    $hedef="IMG/".$_FILES["img"]["name"];
    $kontrol = ($this->baglan)->query("select *from liste where plaka='$plaka'");
    $kayitsay = $kontrol->rowCount();

    if($kayitsay>0){
        
        echo "<script type='text/javascript'>alert('Başarısız : Plaka zaten kayıtlı!');
       window.top.location = 'kayit.php' </script>";

    }

    else if($_FILES["img"]["type"] != "image/jpeg"){
       
        echo "<script type='text/javascript'>alert('Başarısız : Lütfen JPG türünde resim ekleyin!');
       window.top.location = 'kayit.php' </script>";
     }
    else{
    $sorgu = ($this->baglan)->prepare("insert into liste values (?,?,?,?,?,?)");
    $ekle= $sorgu->execute(array(NULL, $marka,$model,$yil,$plaka,$_FILES["img"]["name"]));
    move_uploaded_file($_FILES["img"]["tmp_name"], $hedef);

    echo "<script type='text/javascript'>alert('Başarılı : Kayıt Oluşturuldu ! ');
        window.top.location = 'kayit.php' </script>";
    }

    }

//Kayıt ol fonksiyonu
    public function kayitOl($userName,$password,$email){

    $sorgu = ($this->baglan)->prepare("insert into login values (?,?,?,?)");
    $this->ekle= $sorgu->execute(array(NULL, $userName,$email,$password));

    
    $cikti="<script type='text/javascript'>alert('Başarılı : Kayıt Oluşturuldu ! Lütfen giriş yapınız.');
        window.top.location = 'login.php' </script>";
    return $cikti;
}

// Araba silme fonksiyonu
public function arabaSil($id){
    $sorgu = ($this->baglan)->prepare("delete from liste where (id=?)");
    $sil = $sorgu->execute(array($id));
    $sorgu->closeCursor(); unset($sorgu);
    if ($sil) {
      echo "<script>
      alert('Başarılı: Araba Bilgileri Silindi!');
      window.top.location = 'liste.php';
      </script>";
    } else {
      echo "<script>
      alert('Hata: Araba Bilgileri Silinemedi!');
      window.top.location = 'liste.php';
      </script>";
    }
}

// çıkış fonksiyonu 
public function cikis(){
    unset($_SESSION);
     session_destroy();
     setcookie("kullanici"," ", time() - 1); 
     $cikis= "<script type='text/javascript'>alert('Başarılı:Çıkış Yapıldı! ');
        window.top.location = 'login.php' </script>";
return $cikis;
}

//arama fonksiyonu
public function arama(){
    if($_POST){
        extract($_POST);
        switch ($request) {
            case 'searchCar':
    $sorgu = ($this->baglan)->query("select count(id) as toplam from liste")->fetch();
    $toplamkayit = $sorgu["toplam"];
    
    //Veritabanı araç listeleme
  
    $sorgu =($this->baglan)->query("select * from liste where marka like '%$data%' ");
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
            </div>";
        }
                break;
            
            default:
                echo "cıks";
                break;
        }
    }
}

}
?>