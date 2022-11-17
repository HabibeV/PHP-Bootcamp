<?php 
  $id = $_GET["id"]; 
$baglan= new PDO("mysql:host=localhost;dbname=liste_veri;charset=utf8","root","");
$baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sorgu = $baglan->prepare("delete from kisiler where id=?");
$sil =$sorgu->execute(array($id));

header("Location:listele.php");
?>