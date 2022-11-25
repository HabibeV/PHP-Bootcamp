<?php  
require_once "baglanti.php";
require_once "class.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body >
<table width="30%"  align="center"  >
    <form action="form.php" method="post"  >
        <tr><td align="center"> Adınız Soyadınız : </td></tr>
        <tr><td align="center"><input type="text" name="adSoyad"></td></tr>
        <tr><td align="center"> Tc Kimlik Numaranız : </td></tr>
        <tr><td align="center"><input type="text" name="tcKimlik"></td></tr>
        <tr><td align="center"><input type="submit" value="Doğrula ve Kaydet"></td></tr>
    </form>
    <?php 
        $kontrol = new tcKontrol;
        error_reporting(0);
        $adsoyad =$_POST["adSoyad"];
        $tcKimlik =$_POST["tcKimlik"];
        
        $sorgu = $baglan->prepare("insert into kisiVeri values (?,?,?,?)");
        $ekle= $sorgu->execute(array(NULL, $adsoyad,$tcKimlik,$kontrol->kontrol($tcKimlik)));

    ?>
</table>

</body>
</head>
</html>