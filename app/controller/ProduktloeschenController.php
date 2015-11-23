<?php

// Sprint 3 Gruppe 4 Onlineshop, Verfasser Marcel Riedl, Datum: 23.11.2015 Version 2
// UserStory: 270 Als Kunde möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
// Task: 270-1 (#10329) Zusammenführen
// Aufwand:
// Beschreibung: Es wird der Controller der Produkts im Backend erstellt.

class ProduktloeschenController extends Controller {

    function index() {
        $produkt = $this->model('Produkt_Model');
        
        $this->view('backend/Backendheader');
        $this->view('Produkt/Produkt_Anzeigen',$produkt->alleProdukte());
        
        if(isset($_Post['loeschen'])){
            $produkt->löeschen($_POST['Produktnr']);
        }
    }

}
