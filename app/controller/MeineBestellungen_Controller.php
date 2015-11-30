<!-- Ridvan Atacan, 3113837
    10.11.2015 Group #4 Onlineshop
    Sprint 2, Task : 170-1 #10197
    User Story: Als Kunde möchte ich meine alten Bestellungen darstellen können. 
    Task: Alte Bestellungen anzeigen
    Aufwand: 10 Stunden
 -->
 <!-- Ridvan Atacan, 3113837
    24.11.2015 Group #4 Onlineshop
    Sprint 3, Task : 270-6 #10334
    User Story: Als Kunde möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
    Task: Zusammenführen
    Aufwand: 5 Stunden
 -->

<?php

 
class MeineBestellungen_Controller extends Controller{
    
    //Methode innerhalb der Klasse wird bei Erzeugung eines Controller Objekts erzeugt
    public function index() {
       
         
         $bestellung = $this->model('MeineBestellungen_Model');
         $data = $bestellung->alleBestellungen();
         $this->view('Bestellung/MeineBestellungen_View', $data);
         
         
         
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
    
  