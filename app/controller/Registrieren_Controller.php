<!-- Renato Cabriolu, 3112468
    23.11.2015 Group #4 Onlineshop
    Sprint 3, Task : 270-1
    User Story: Als Kunde möchte ich in den Wichtigsten Funktionen ein Fertiges Ergebnis sehen. 
    Task: Eigener Code anpassen
    Aufwand: 4 Stunden
 -->
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
    // Erzeigt die View des Registrieren Controllers
    public function index(){     
               
                $this->view('Header',[]);
                $this->view('Registrieren/Registrieren',[]);
                $this->view('Footer',[]);
                $this->model('Registrieren_Model');
        
    }
    //Methode zum Registrieren eines Kunden anhand der $_POST- Parameter die vom View übergeben werden
    public function hinzufuegen(){
     
        $this->Email = $_POST['Email'];
        $this->Passwort = $_POST['Passwort'];
        $this->Vorname = $_POST['Vorname'];
        $this->Nachname = $_POST['Nachname'];
        $this->Geschlecht = $_POST['Geschlecht'];
        $this->Geburtsdatum = $_POST['Geburtsdatum'];
        $this->Plz = $_POST['Plz'];
        $this->Strasse = $_POST['Strasse'];
        
        $Registrieren= $this->model('Registrieren_Model');
        $Registrieren->hinzufuegen($this->Email,$this->Passwort,$this->Vorname,$this->Nachname,$this->Geschlecht,$this->Geburtsdatum,
                $this->Plz,$this->Strasse);
        
        $this->view('Header',[]);
        $this->view('Registrieren/Registrieren',[ $this->model('Registrieren_Model')]);
        $this->view('Footer',[]);


        
    }

}

$obj = new Registrieren_Controller();