<?php

//Sprint 3, Gruppe 4 Onlineshop 
//Verfasser: Marcel Riedl, Datum: 14.11.2015 Version 1
//UserStory: #90 Als Kunde möchte ich eine einfache Navigation in Kategorien, so dass ich schnell mein Wunschprodukt finden kann.
//Task: #90-1 (10315) Kategorien auswählen und programmieren
//Aufwand:  Stunden
//Beschreibung: Es wird der Controller für die Kategorien erstellt. 

require_once '../model/Kategorie_Model.php';

class Kategoriecontroller {

    function __construct() {
        
    }
    
    // Anzeige des Views aller Kategorien
    function liste(){
        $kategorie = new Kategorie_Model();
        $kategorie->kategorienanzeigen();
    }
    
    // function um die gewählte Kategorie herauszufinden
    function kategorieproduktanzeigen(){
        
    }
}

new Kategoriecontroller();