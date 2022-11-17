<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body >
    <?php 
    
$baglan= new PDO("mysql:host=localhost;dbname=liste_veri;charset=utf8","root","");
$baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //hata yönetimi

?>

<table  border="1" width="50%"  align="center"  >
<form action="sil.php" method="post">
    <tr>
        <th>Ad Soyad </th>
        <th> Telefon Numarası</th>
        <th> İşlem</th>
    </tr>
    
   
<?php
$kayit=0;
   $sorgu = $baglan->query("select * from kisiler",PDO::FETCH_ASSOC);
   foreach($sorgu as $satir){
    $kayit+=1;
    echo"<tr align='center'> <td>".$satir["adSoyad"]."</td><td>".$satir["telNo"]."</td>
    <td> <a href='sil.php?id=".$satir["id"]."' onclick=\"if (!confirm('Kaydı Silmek İstediğinize Emin misiniz?')) return false;\">Sil</a></td></tr>";
   }
     
  echo " <tr align='center'>
   <td colspan='3'>Sistemde toplam $kayit kayıt var. </td>
</tr>";
        
    ?>
</form>
</table>
</body>
</head>
</html>