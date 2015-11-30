<?php

//Sprint 3, Gruppe 4 Onlineshop 
//Verfasser: Marcel Riedl, Datum: 19.11.2015 Version 1
//UserStory: #90 Als Kunde möchte ich eine einfache Navigation in Kategorien, so dass ich schnell mein Wunschprodukt finden kann.
//Task: #90-1 (10315) Kategorien auswählen und programmieren
//Aufwand: 0,5 Stunden
//Beschreibung: Es wird der Controller für die Kategorien erstellt. 

class Kategoriecontroller extends Controller {

    function index($kat) {
        $kategorie = $this->model('Kategorie_Model');
        
        $this->view('Header');
        $this->view('Kategorie/Kategorie_View', $kategorie->kategorienanzeigen($kat));
        $this->view('Footer');
    }
    
}
