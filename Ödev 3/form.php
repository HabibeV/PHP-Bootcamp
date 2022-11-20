<?php  
require_once "baglanti.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body >
<table width="35%"  align="center"  >
    <form action="form.php" method="post"  >
        <tr><td align="center"> Adınız Soyadınız : </td></tr>
        <tr><td align="center"><input type="text" name="adsoyad"></td></tr>
        <tr><td align="center"> Telefon Numaranız : </td></tr>
        <tr><td align="center"><input type="text" name="numara"></td></tr>
        <tr><td align="center"><input type="submit" value="Bilgileri Kaydet"></td></tr>
    </form>
    <?php 
        error_reporting(0);
        $adsoyad =$_POST["adsoyad"];
        $numara =$_POST["numara"];
        
        $sorgu = $baglan->prepare("insert into kisiler values (?,?,?)");
        $ekle= $sorgu->execute(array(NULL, $adsoyad,$numara));
        header("Location:form.php" );
    ?>
</table>

</body>
</head>
</html>