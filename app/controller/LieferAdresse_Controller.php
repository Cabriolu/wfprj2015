<!-- Ridvan Atacan, 3113837
    10.11.2015 Group #4 Onlineshop
    Sprint 2, Task : 140-6 #10204
    User Story: Als Programmierer möchte ich meine Codes als Model–view–controller (MVC) haben
    Task: Eigenen Code an MVC anpassen
    Aufwand: 5 Stunden
 -->
<?php
require '../model/LieferAdresse_Model.php';
class LieferAdresse_Controller{

    private $name;
    private $nname;
    private $strasse;
    private $plz;
    private $kid;
    // Zwischenspeichern der Daten aus dem View bei Erzeugung eines Controller Objekts
    public function __construct(){
       
        $this->name = $_POST['name'];
        $this->nname = $_POST['nname'];
        $this->strasse = $_POST['strasse'];
        $this->plz = $_POST['plz'];
        $this->kid = $_POST['kid'];
        //Aufruf der Methode innerhalb dieser Klasse
		$this->hinzufügen(); 
        
    }
    //Methode zum Erzeugen eines Model Objekts und Übergabe der Parameter für die Datenbankanfrage
    public function hinzufügen(){
        
        $liefer = new LieferAdresse_Model();
        $liefer->hinzufügen($this->name,$this->nname,$this->strasse,$this->plz,$this->kid);
        
    }

}

$obj = new LieferAdresse_Controller();