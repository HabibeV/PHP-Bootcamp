<?php 

$adsoyad =$_POST["adsoyad"];
$numara =$_POST["numara"];

$baglan= new PDO("mysql:host=localhost;dbname=liste_veri;charset=utf8","root","");
$baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sorgu = $baglan->prepare("insert into kisiler values (?,?,?)");
$ekle= $sorgu->execute(array(NULL, $adsoyad,$numara));
header("Location:form.php" );
?>