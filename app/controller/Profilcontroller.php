<!--Sprint 2, Gruppe 4 Onlineshop, Verfasser: Hanim Yerlikaya, Datum: 05.11.2015
UserStory: Als Kunde möchte ich mein Profil verwalten.
Task: 160-1 (#10195) Eigenen Code an MVC anpassen
Aufwand: 10 Stunden
Beschreibung: Der Kunde kann somit sein Profil bearbeiten und löschen     -->



<?php

session_start();

class Profilcontoller extends Controller
{
	protected $id;
	protected $vorname;
	protected $name;
	protected $strasse;
	protected $plz;
	protected $ort;
	protected $tele;
	
	protected $profil;
	
    function __construct($handle) {
        
        $this->model('Profil_Model');
        $this->profil = new Profil_Model();
        
        //Maybe TODO
	if(isset($_GET['id']))
	$this->id = $_GET['id'];
	if(isset($_POST['id']))
	$this->id = $_POST['id'];
        
        if(isset($_POST['vorname']))
	$this->vorname = $_POST['vorname'];
        if(isset($_POST['nachname']))
	$this->name = $_POST['nachname'];
        if(isset($_POST['strasse']))
	$this->strasse = $_POST['strasse'];
        if(isset($_POST['geschlecht']))
	$this->geschlecht = $_POST['geschlecht'];
        if(isset($_POST['geburtstag']))
	$this->geburtstag = $_POST['geburtstag'];
        if(isset($_POST['plz']))
	$this->plz = $_POST['plz'];
        if(isset($_POST['ort']))
	$this->ort = $_POST['ort'];
	//$this->tele = $_POST['tele'];

        switch ($handle) {
            case 'anzeigen':
                $this->anzeigen($this->id);
                break;
            case 'bearbeiten':
		$this->bearbeiten($this->id);
		break;
            case 'loeschen':
                $this->profil->loeschen($this->id);
                break;
            case 'aktualisieren';
                $this->profil->aktualisieren($this->id, $this->vorname, $this->name, $this->geschlecht, $this->geburtstag, $this->strasse, $this->plz, $this->ort);
                $this->anzeigen($this->id);
                break;

            default:
		$this->anzeigen($this->id);
                break;
        }
    }
	
	    // function um Profil view anzeigen
    public function anzeigen($id) {
        $this->view('Header',[]);
        $this->view('Profil/Profil_Anzeigen', [ $this->model('Profil_Model') ]);
        $this->view('Footer',[]);
    }

    // Funktion um die Profilbearbeiten view anzuzeigen
    public function bearbeiten() {
        $this->view('Header',[]);
        $this->view('Profil/Profil_Bearbeiten', [ $this->model('Profil_Model') ]);
        $this->view('Footer',[]);
    }

}

$han = null;
if(isset($_POST['han']))
{
	$han = $_POST['han'];
}

new Profilcontoller($han);

?>