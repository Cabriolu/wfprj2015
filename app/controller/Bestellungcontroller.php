<?php

// UPDATE AUF VERSION 2, 23.11.15
//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Kerstin Gräter, Datum: 09.11.2015 Version 1
//UserStory: Als Programmierer möchte ich den Aufbau als Model-View-Controller (MVC) haben.
//Task: 110-2 (#10190) MVC Programmieren
//Aufwand: 5 Stunden
//Beschreibung: Es wird der grundlegende Aufbau der Bestellabwicklung als MVC erstellt.
// Hier wird der Controller dazu erstellt
session_start();
include_once '../models/Bestellung_Model.php';
include '../models/LoginModel.php';

class Bestellungcontroller {

    function __construct() {
        // Objekt von Bestellung_Model erstellen
        $bestellung = new Bestellung_Model();
        // Kundennummer anhand vom Login ermitteln
        $kundennummer = $_SESSION['logged']['id'];
        require '../view/Bestellung/Rechnungsadresse.php';
        // Anzeige der Rechnungsadresse
        $bestellung->adresseanzeigen($kundennummer);
        echo '<br>';
        // Eingabe der Lieferadresse
        require '../view/Bestellung/Lieferadresse.php';
        $vorname = $_POST['vorname'];
        $nachname = $_POST['nachname'];
        $straße = $_POST['straße'];
        $plz = $_POST['plz'];
        $ort = $_POST['ort'];

        // Ausführung sobald Button 'speichern' gedrückt wird
        if (isset($_POST['speichern'])) {
            $bestellung->adresse($vorname, $nachname, $straße, $plz, $ort, $kundennummer);
        }
        // Ausführung sobald Button 'los' gedrückt wird
        if (isset($_POST['los'])) {
            $bestellung->bestellungabschließen();
        }
    }

}

new Bestellungcontroller();
