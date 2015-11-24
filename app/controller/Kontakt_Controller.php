<!--
-- Meryem Güler, 3107546
-- Group #4 Onlineshop
-- Sprint 3, Task : (230-1) #10323
-- User Story: Als Kunde möchte ich über ein Kontaktformular mit den OnlineShop-betreibern in Verbindung kommen.
-- Task: Kontaktformular programmieren
-- Aufwand : 10 Stunden
 -->



<?php


require '../model/Kontakt_Model.php';
class Kontakt_Controller extends Controller{

   private $datum;
   private $vorname;
   private $nachname;
   private $email;
   private $betreff;
   private $kommentar;
	
    
    // Zwischenspeichern der Daten aus dem View bei Erzeugung eines Controller Objekts
    public function __construct(){
        $this->datum = $_POST['datum'];
        $this->vorname = $_POST['vorname'];
        $this->nachname = $_POST['nachname'];
        $this->email = $_POST['email'];
        $this->betreff = $_POST['betreff'];
        $this->kommentar = $_POST['kommentar'];
        //Aufruf der Methode innerhalb dieser Klasse
		$this->hinzufügen(); 
        
    }
    //Methode zum Erzeugen eines Model Objekts und Übergabe der Parameter für die Datenbankanfrage
    public function hinzufügen(){
        
        $kontakt = new Kontakt_Model();
        $kontakt->hinzufügen($this->datum, $this->name,$this->nachname,$this->email,$this->betreff,$this->kommentar);
        
    }

}

$obj = new Kontakt_Controller();
                                       
?>