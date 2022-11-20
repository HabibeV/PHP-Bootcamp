<?php 
  $id = $_GET["id"]; 
  require_once "baglanti.php";

  $sorgu = $baglan->prepare("delete from kisiler where id=?");
  $sil =$sorgu->execute(array($id));
  if($sil){
    header("Location:listele.php");
  }
  else{
    echo "<script>
    alert('Hata: Kayıt Silinemedi!');
    window.top.location = 'listele.php';
    </script>";
  }
?>