<?php

$agil=5;
$kapasite=210;
$koyun=131;
$agilKapasite = $kapasite/$agil;

echo "Toplam Ağıl: $agil <br> Toplam Kapasite : $kapasite <br> Toplam Koyun : $koyun <br><br>";

for ($i=$agil ; $i>=1 ; $i--) // Ağıl sayısı.
{
    
    if ($koyun>=$agilKapasite){
        echo "$i. Ağıl : $agilKapasite Koyun <br>";
        $koyun= $koyun- $agilKapasite;
    }
    elseif ($koyun>=0){
        echo "$i. Ağıl : $koyun Koyun <br>";
        $koyun= $koyun- $agilKapasite;
    }

    else{
        
        echo "$i. Ağıl : 0 Koyun <br>";


    }
}
if ($koyun>0){
echo "<br>Dışarıda Kalan : $koyun Koyun";
}
?>

