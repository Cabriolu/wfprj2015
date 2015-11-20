<!-- Ridvan Atacan, 3113837
    10.11.2015 Group #4 Onlineshop
    Sprint 2, Task : 170-1 #10197
    User Story: Als Kunde möchte ich meine alten Bestellungen darstellen können. 
    Task: Alte Bestellungen anzeigen
    Aufwand: 10 Stunden
 -->

<?php
//Zugriff auf Model Klasse
include  '../models/MeineBestellungen_Model.php';
 
class MeineBestellungen_Controller{
	//Methode innerhalb der Klasse wird bei Erzeugung eines Controller Objekts erzeugt
    public function __construct() {
       
         //$this->test();
        
         $this->alleBestellungen();
    }
    
   
    public function test(){
        
         echo 'Hallo es läuft <br>'; 
    
    }
    
    //Methode um ein Model Objekt zu erzeugen und die jeweilige Methode innerhalb der Method Klasse aufzurufen
    public function bestellungen(){
    
         $bestell = new MeineBestellungen_Model();
         $bestell->bestellliste();
  
    }
	
    public function alleBestellungen(){
        
        $bestell = new MeineBestellungen_Model();
        $bestell->alleBestellungen();
    }
    
    public function anzeigen(){
        
        require '../view/Bestellliste.php';
        $bestell = new MeineBestellungen_Model();
        $bestell->alleBestellungen();
        
    }

    }

    $objekt = new MeineBestellungen_Controller();
    
  