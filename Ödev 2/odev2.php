<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body style="text-align:center"  >
<?php
    session_start();
    error_reporting(0);

    $_SESSION["gofret"] =$_POST["gofret"];
    $_SESSION["kare"] = $_POST["kare"];
    $_SESSION["bitter"] = $_POST["bitter"];
    $toplam=0;

    $deneme = array ($_SESSION["gofret"],$_SESSION["kare"],$_SESSION["bitter"] );
    $cesitler= array ("Ülker Çikolatalı Gofret 40 gr.","Eti Damak Kare Çikolata 60 gr.","Nestle Bitter Çikolata 50 gr.");
    $fiyatlar= array ("10","20","20"); 
    $name = array ("gofret", "kare", "bitter");

    echo " <table align='center' width=65%   >
        <tr><td>
    <table border='1' align='center' width=100% >
    <form method='post' action='ödev2.php'>
    <tr>
            <th align='left'>Ürün Adı</th>
            <th>Ürün Fiyatı</th>
            <th>Adet</th>
    </tr>";

        for ($i=0; $i<count($cesitler) ; $i++)
        {    echo" 
            <tr>
            <td  align='left'>$cesitler[$i]</td>
            <td>$fiyatlar[$i]  TL.</td>
            <td><input type='text' name=$name[$i]></td>
            </tr>";
        }

    echo "</table></td></tr><tr>
        <td  align='right' >
        <input type='submit' value='Ürünü Sepete Ekle' >
        </td></tr></table><br><br>
        <table border='1' width='100%'><tr>
        <th>Ürün adı </th>
        <th> Adet</th>
        <th> Toplam </th>
        </tr>";
    
    for ($i=0; $i<count($cesitler) ; $i++)
    {
        if($deneme[$i]=="" || $deneme[$i]<0)
        { 
            $deneme[$i]=0;
    
        }
    
        $hesap= $fiyatlar[$i]*$deneme[$i];
        $toplam += $hesap;
        echo "<tr><td  align='left'>$cesitler[$i]</td>
        <td>$deneme[$i]</td>
        <td>$hesap TL.</td></tr>";
    }

    echo " <tr><th  align='left' colspan='2' >Genel Toplam: </th>
    <td>$toplam TL.</td>
    </form>
    </table>";

?>
</body>
</html>