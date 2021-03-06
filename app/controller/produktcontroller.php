<?php

// Sprint 3 Gruppe 4 Onlineshop, Verfasser Marcel Riedl, Datum: 23.11.2015 Version 2
// UserStory: 270 Als Kunde möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
// Task: 270-1 (#10329) Zusammenführen
// Aufwand:
// Beschreibung: Es wird der Controller der Produkts im Backend erstellt.

class Produktcontroller extends Controller {

    function index() {
        $produkt = $this->model('Produkt_Model');

        $this->view('backend/Backendheader');
        $this->view('Produkt/Produkt_Anlegen');
        if (isset($_POST['anlegen'])) {
            $produkt->anlegen($_POST['name'], $_POST['Hersteller'], $_POST['farbe'], $_POST['groeße'], $_POST['preis'], $_POST['Kategorie']);
        }
    }

}

//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 05.11.2015 Version 1
//UserStory: Als Programmierer möchte ich meinen Code als Model-View-Controller (MVC) haben.
//Task: 110-2 (#10190) Eigenen Code an MVC anpassen
//Aufwand: 5 Stunden
//Beschreibung: Es wird der Controller des Produkts im Backend erstellt. 

/*
class Produktcontroller {

    public function __construct($handle) {
        switch ($handle) {
            case 'anlegen':
                $this->anzeigen();

                break;
            case 'herstelleranzeigen':
                $this->herstelleranzeigen();

                break;

            default:
                break;
        }

        $produkt = new Produkt_Model();
        if (isset($_POST['anlegen'])) {
            echo $produkt->anlegen($_POST['name'], $_POST['hersteller'], $_POST['preis'], $_POST['kategorie']);
        }

        if (isset($_POST['loeschen'])) {
            $produkt->loeschen($_POST['nummer']);
        }

        if (isset($_POST['aktualisieren'])) {
            echo 'Still under work!';
        }

        if (isset($_POST['bild'])) {
            echo 'Still under work!';
        }
    }

    // function um alle Produkte eines einzelnen Herstellers anzuzeigen
    public function herstelleranzeigen() {
        require_once '../view/Produkt/Produkt_Anzeigen.php';
        $hersteller = 'G-Star';
        $produkt = new Produkt_Model();
        echo $produkt->produkthersteller($hersteller);
    }

    // function um die Liste aller Produkte anzuzeigen
    public function anzeigen() {
        require_once '../view/Produkt/Produkt_Anlegen.php';
    }

}
*/