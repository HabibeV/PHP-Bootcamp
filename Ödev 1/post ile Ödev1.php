<?php



// BUTONA BASILDIĞINDA KODLAR DEVREYE GİRERSE HATALAR ORTADAN KALKACAK. FAKAT O KODLAMAYI DAHA BİLMEDİĞİMDEN HATALARI GÖTÜREMEDİM.

echo "<form method='post' action='' > Ağıl sayısı : <input type='text' name='agil'><br><br>
    Kapasite :  <input type='text' name='kapasite'><br><br>
    Koyun :  <input type='text' name='koyun'><br><br>
    <input type='submit' value='hesapla' name='hesapla' > </form>"
    ;


echo "Toplam Ağıl:". $_POST["agil"]." <br> Toplam Kapasite :".$_POST["kapasite"] ."<br> Toplam Koyun :". $_POST["koyun"] ." <br><br>";
$agilKapasite = $_POST["kapasite"] /$_POST["agil"];
$agilKapasite = round($agilKapasite);
for ($i=$_POST['agil'] ; $i>=1 ; $i--) // Ağıl sayısı.
{
    
    if ($_POST["koyun"] >=$agilKapasite){
        echo "$i. Ağıl : $agilKapasite Koyun <br>";
        $_POST["koyun"] = $_POST["koyun"] - $agilKapasite;
    }
    elseif ($_POST["koyun"] >=0){
        echo "$i. Ağıl :". $_POST["koyun"]." Koyun <br>";
        $_POST["koyun"] = $_POST["koyun"] - $agilKapasite;
    }

    else{
        
        echo "$i. Ağıl : 0 Koyun <br>";


    }
}
if ($_POST["koyun"] >0){
echo "<br>Dışarıda Kalan :".$_POST["koyun"]."  Koyun";
}



?>

