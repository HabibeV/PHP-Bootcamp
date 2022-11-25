<?php 
 require_once "baglanti.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body >
<table  border="1" width="50%"  align="center"  >
<form  method="post">
    <tr>
        <th>id</th>
        <th> Ad Soyad</th>
        <th> Tc Kimlik</th>
        <th> Durum</th>
    </tr>
<?php
    $kayit=0;
    $sorgu = $baglan->query("select * from kisiVeri",PDO::FETCH_ASSOC);

    foreach($sorgu as $satir){
    $kayit+=1;
    echo"<tr align='center'> <td>".$satir["id"]."</td><td>".$satir["adSoyad"]."</td><td>".$satir["tcKimlik"]."</td>
    <td>".$satir["durum"]."</td></tr>";
    }  
?>
</form>
</table>
</body>
</head>
</html>