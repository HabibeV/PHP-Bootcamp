<?php 
include("class.php");

$kontrol = new kontrol;

$islem = $_GET["islem"];



if ($islem=="login"){
    $userName = $_POST["userName"];
    $password = $_POST["password"];     
    echo  $kontrol->login($userName,$password);
}

else if($islem=="duzenle"){
    $marka=$_POST["marka"];
    $model=$_POST["model"];
    $yil=$_POST["yil"];
    $plaka=$_POST["plaka"];
    echo($kontrol->duzenle($marka,$model,$yil,$plaka));
}


else if($islem=="aracKayit"){
  $marka=$_POST["marka"];
  $model=$_POST["model"];
  $yil=$_POST["yil"];
  $plaka=$_POST["plaka"];
 echo ($kontrol->aracKayit($marka,$model,$yil,$plaka));
}

else if($islem=="kayitOl"){
  $userName = $_POST["userName"];
  $password = $_POST["password"]; 
  $email = $_POST["email"];  
 echo ($kontrol->kayitOl($userName,$password,$email));
}

else if($islem=="arabaSil"){
  $id=$_GET["id"];
  echo ($kontrol->arabaSil($id));
}

else if($islem=="cikis"){
  echo ($kontrol->cikis());
}


else if($islem=="arama"){
  echo ($kontrol->arama());
}

else {
    echo "hata";
}

?>