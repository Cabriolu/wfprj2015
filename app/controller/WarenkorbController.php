<?php
    
    require '../app/lib/Warenkorb.php';
    class WarenkorbController extends Controller{
        
        private $warenArray;
        public function getArtikel(){
            
            if(isset($_SESSION['warenkorb'])){
                
               $warenModel = $this->model('WarenkorbModel');
               $i=0;
               
               foreach ($_SESSION['warenkorb'] as $produkt) {
                   
                   $this->warenArray[$i]= $warenModel->getArtikel($produkt['produktNummer']); 
                   $i++;
                 
                   
               }
               
               $this->view('Warenkorb/WarenkorbRender',  $this->warenArray); 
               
            }else{
                
               $this->view('Warenkorb/WarenkorbRender'); 
               
            } 
        }
    }
        
    

