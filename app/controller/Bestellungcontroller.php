<?php

session_start();
//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Kerstin Gräter, Datum: 09.11.2015 Version 1
//UserStory: Als Programmierer möchte ich den Aufbau als Model-View-Controller (MVC) haben.
//Task: 110-2 (#10190) MVC Programmieren
//Aufwand: 5 Stunden
//Beschreibung: Es wird der grundlegende Aufbau der Bestellabwicklung als MVC erstellt.
// Hier wird der Controller dazu erstellt

include_once '../model/Bestellung_Model.php';

class Bestellungcontroller {

    function __construct() {
        // Objekt von Bestellung_Model erstellen
        $bestellung = new Bestellung_Model();
        // Kundennummer anhand vom Login ermitteln
        $kundennummer = 1;
        //$kundennummer = $_SESSION['kundennummer'];
        require '../view/Bestellung/Rechnungsadresse.php';
        // Anzeige der Rechnungsadresse
        $bestellung->adresseanzeigen($kundennummer);
        echo '<br>';
        // Eingabe der Lieferadresse
        require '../view/Bestellung/Lieferadresse.php';
        $straße = $_POST['straße'];
        $plz = $_POST['plz'];
        $ort = $_POST['ort'];

        // Ausführung sobald Button 'speichern' gedrückt wird
        if (isset($_POST['speichern'])) {
            echo $bestellung->adresse($straße, $plz, $ort, $kundennummer);
        }
        // Ausführung sobald Button 'los' gedrückt wird
        if (isset($_POST['los'])) {
            echo $bestellung->bestellungabschließen();
        }
    }

}

new Bestellungcontroller();
