<?php
    Class tcKontrol {
        public $ciftToplam = 0;
        public $tekToplam = 0;
        public $sonuc = 0;
        public $onHane = 0;
        public $esitle = 0;

        public function kontrol($tc){
            
            $parca = str_split($tc); //tc parçalama adımı
            //3. maddedeki işlemler
            for($i=0 ; $i<=8 ; $i+=2){
                $this->ciftToplam += (int)$parca[$i]; 
                } 

            for($i=1 ; $i<=7 ; $i+=2){
                $this->tekToplam += (int)$parca[$i];
                }

            $this->sonuc= (($this->ciftToplam*7)-$this->tekToplam) % 10;

            //4. maddedeki işlemler
            for($i=0 ; $i<=9 ; $i++){
                $this->onHane += (int)$parca[$i];
                }
            $this->esitle = $toplam % 10;

            //Koşullar
            if(filter_var($tc, FILTER_VALIDATE_INT)  && $tc[0]=!0){
                if($parca[9]== $this->sonuc && $parca[10]== $this->esitle){
                    $cikti = "TC Kimlik Geçerli";}
                else{
                    $cikti = "TC Kimlik Geçersiz";}    
           }
            else{
               $cikti = "TC Kimlik Geçersiz";  
           }
            return $cikti;  
        }
    }
?>