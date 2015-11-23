<?php
//Sprint 3, Gruppe 4 Onlineshop, Verfasser: Denis Kevljanin, Datum: 22.11.2015
//UserStory: 190 Als Kunde möchte ich eine Filter- und Suchfunktion einsetzen können
//Task: 190-1 filterfunktion programmieren
//Aufwand: 15 Stunden
//Beschreibung: Controller der Filterfunktion
class Filter_Controller extends Controller{

    public function index() {  
        //Erstellen eines Objekts und Übergabe zum View
        $suche = $this->model('Filter_Model');
        $data = $suche->filterFarbe();
        $this->view('ProduktAnzeigenSuche', $data);

    }
    
}