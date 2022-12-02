<?php  

session_start();
$baglan= new PDO("mysql:host=localhost;dbname=arackiralama;charset=utf8","root","");
$baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(!$_SESSION["giris"])  {
  header("Location:login.php");

}
$butun=array();
$filename =  "liste.csv";   

//dosyayı indirme   
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=\"$filename\"");

//veritabanından çekip diziye çevirme
    $kontrol = $baglan->query("select *from liste");
    foreach ($kontrol as $parca){ 
        if($parca['id']){
            array_push($butun,array('id' => $parca["id"],   
                         'Marka' =>$parca["marka"],
                         'Model'=>$parca["model"],
                         'Yıl'=>$parca["yil"],
                          'Plaka'=>$parca["plaka"],
                         'ResimKod'=>$parca["resimKod"])); 
            }
        }

// dosyaya yazdırma
      $dosya = fopen($filename,"w");
      $sayac =0;
      foreach($butun as $satir) {
        foreach($satir as $veri){
          fwrite ($dosya,"$veri;");
            
        }
      }
      fclose($dosya);

//dosyayı okutma
      $dosya = fopen($filename,"r");
      echo fread ($dosya,filesize($filename));
      fclose($dosya);

 

?>