<!-- Ridvan Atacan, 3113837
    10.11.2015 Group #4 Onlineshop
    Sprint 2, Task : 140-6 #10204
    User Story: Als Programmierer möchte ich meine Codes als Model–view–controller (MVC) haben
    Task: Eigenen Code an MVC anpassen
    Aufwand: 5 Stunden
 -->
 <!-- Ridvan Atacan, 3113837
    24.11.2015 Group #4 Onlineshop
    Sprint 3, Task : 270-6 #10334
    User Story: Als Kunde möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
    Task: Zusammenführen
    Aufwand: 5 Stunden
 -->
<?php

class LieferAdresse_Controller extends Controller{

    private $name;
    private $nname;
    private $strasse;
    private $plz;
    private $kid;
    // Zwischenspeichern der Daten aus dem View bei Erzeugung eines Controller Objekts
    public function index(){
        
        $this->view('Header',[]);
        $this->view('Bestellung/LieferAdresse_View',[]);
        
        $this->model('LieferAdresse_Model');
        
        if (isset($_POST["submit"])) {

        $this->hinzufügen();
        //Aufruf der Methode innerhalb dieser Klasse
        }
        $this->view('Footer',[]);
    }
    //Methode zum Erzeugen eines Model Objekts und Übergabe der Parameter für die Datenbankanfrage
    public function hinzufügen(){
        
        $this->name = $_POST['name'];
        $this->nname = $_POST['nname'];
        $this->strasse = $_POST['strasse'];
        $this->plz = $_POST['plz'];
        $this->kid = $_POST['kid'];
        $liefer = new LieferAdresse_Model();
        $liefer->hinzufügen($this->name,$this->nname,$this->strasse,$this->plz,$this->kid);
        
    }

}

$obj = new LieferAdresse_Controller();
