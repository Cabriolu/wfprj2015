<?php
//Sprint 3, Gruppe 4 Onlineshop, 
//Verfasser: Christian Frindt, Datum: 19.11.2015 Version 1.1
//UserStory: 270 Als Programmierer möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
//Task: 270-1 (#10329) Zusammenführen
//Aufwand: 2 Stunden
//Beschreibung: Es wird der Controller des Warenkorbs im Frontend erstellt. 

    
    session_start();
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
        
    

