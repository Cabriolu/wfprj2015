<?php

//Sprint 3, Gruppe 4 Onlineshop 
//Verfasser: Marcel Riedl, Datum: 14.11.2015 Version 1
//UserStory: #90 Als Kunde möchte ich eine einfache Navigation in Kategorien, so dass ich schnell mein Wunschprodukt finden kann.
//Task: #90-1 (10315) Kategorien auswählen und programmieren
//Aufwand: 1,5 Stunden
//Beschreibung: Es wird das Model für die Kategorien erstellt. 
// Kerstin Gräter
require_once '../config/Connect_Mysql.php';

class Kategorie_Model {

    private $sql;
    private $con;
    protected $egal;

    function __construct() {
        
    }

    // function um alle Kategorien anzeigen zu können
    function kategorienanzeigen($kat) {
        $this->sql = 'Select KatID, Kategorie from Kategorie where Oberkategorie_OberkatID = ' . $kat;
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();
        // Prepared Statement erstellen und ausführen
        $stmt = $con->prepare($this->sql);
        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $con = null;
        $this->con->schließen();
        return $row;
    }

}
