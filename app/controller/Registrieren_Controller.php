<?php

class Registrieren_Controller extends Controller{

    private $Email;
    private $Passwort;
    private $Vorname;
    private $Nachname;
    private $Geschlecht;
    private $Geburtsdatum;
    private $Plz;
    private $Strasse;
    // Zwischenspeichern der Daten aus dem View bei Erzeugung eines Controller Objekts
    public function __construct(){
       
  /*      $this->Email = $_POST['Email'];
        $this->Passwort = $_POST['Passwort'];
        $this->Vorname = $_POST['Vorname'];
        $this->Nachname = $_POST['Nachname'];
        $this->Geschlecht = $_POST['Geschlecht'];
        $this->Geburtsdatum = $_POST['Geburtsdatum'];
        $this->Plz = $_POST['Plz'];
        $this->Strasse = $_POST['Strasse'];*/
        //Aufruf der Methode innerhalb dieser Klasse
		 
               $Regestrieren = $this->model('Registrieren_Model');
                $this->hinzufügen();
                $this->view('Header',[]);
                $this->view('Registrieren/Registrieren',[ $this->model('Registrieren_Model')]);
                $this->view('Footer',[]);
        
    }
    //Methode zum Erzeugen eines Model Objekts und Übergabe der Parameter für die Datenbankanfrage
    public function hinzufügen(){
        
        $liefer = new Registrieren_Model();
        $liefer->hinzufügen($this->Email,$this->Passwort,$this->Vorname,$this->Nachname,$this->Geschlecht,$this->Geburtsdatum,
                $this->Plz,$this->Strasse);
        
    }

}

$obj = new Registrieren_Controller();