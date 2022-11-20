<?php



$ciftlik = array(
    "agil"=>15,
    "kapasite"=>30,
    "koyun"=>400

);
$agilKapasite =  $ciftlik["kapasite"]*$ciftlik["agil"];
$koyun=$ciftlik["koyun"];


echo "Toplam Ağıl:".$ciftlik["agil"]."<br> Toplam Kapasite : $agilKapasite <br> Toplam Koyun :".$ciftlik["koyun"]." <br><br>";

for ($i=$ciftlik["agil"] ; $i>=1 ; $i--) // Ağıl sayısı.
{
    if ($koyun>=$ciftlik["kapasite"]){
        echo "$i. Ağıl :".$ciftlik["kapasite"]." Koyun <br>";
        $koyun= $koyun- $ciftlik["kapasite"];
    }
    elseif ($koyun>=0){
        echo "$i. Ağıl : $koyun Koyun <br>";
        $koyun= $koyun-  $ciftlik["kapasite"];
    }

    else{
        
        echo "$i. Ağıl : 0 Koyun <br>";


    }
}
if ($koyun>0){
echo "<br>Dışarıda Kalan : $koyun Koyun";
}
?>
