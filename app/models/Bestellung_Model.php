<?php

// UPDATE AUF VERSION 2, 23.11.15
//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Kerstin Gräter, Datum: 09.11.2015 Version 1
//UserStory: Als Programmierer möchte ich den Aufbau als Model-View-Controller (MVC) haben.
//Task: 110-2 (#10190) MVC Programmieren
//Aufwand: 5 Stunden
//Beschreibung: Es wird der grundlegende Aufbau der Bestellabwicklung als MVC erstellt.
// Hier wird das Model dazu erstellt


session_start();
// include um die Klasse Connect_Mysql einzubinden
include_once '../config/Connect_Mysql.php';
// include Warenkorb von Frindt
include '../lib/Warenkorb.php';
// inlude Mailer von Kevljanin
include '../controller/mail.php';
// include Login von Frindt
include '../models/LoginModel';

class Bestellung_Model {

    private $con;
    private $sql;

    function __construct() {
        
    }

    // function zur Überprüfung ob PLZ schon vorhanden
    function plzvorhanden($plz) {
        $sql = 'Select plz from Postleitzahl where plz = ' . $plz;

        // mit der Datenbank verbinden
        $this->con = new Connect_Mysql();
        $this->con->verbinden();

        // 1. Statement ausführen
        $this->sql = $sql;
        // PreparedStatement wird erstellt
        $stmt = $this->con->prepare($this->sql);
        // PreparedStatement wird ausgeführt
        $stmt->execute();

        $row = $stmt->fetch();

        if ($row['plz'] == $plz) {
            return 'ja';
        } else {
            return 'nein';
        }
    }

    // function um eine Adresse eintragen zu können
    function adresse($vorname, $nachname, $plz, $ort, $straße, $kundennummer) {
        $wahr = plzvorhanden($plz);
        // sql statements für inserts 
        $sqlPLZ = 'insert into postleitzahl (plz, ort) values (' . $plz . ', ' . $ort . ');';
        $sqlAdresse = 'insert into lieferadresse (LieferID, Vorname, Nachname, straße, kunde_kundennummer, postleitzahl_plz) values (null, '
                . $vorname . ','. $nachname .',' . $straße . ', ' . $kundennummer . ', ' . $plz . ')';

        // mit der Datenbank verbinden
        $this->con = new Connect_Mysql();
        $this->con->verbinden();
        if ($wahr == 'nein') {
            // 1. Statement ausführen
            $this->sql = $sqlPLZ;
            // PreparedStatement wird erstellt
            $stmt = $this->con->prepare($this->sql);
            // PreparedStatement wird ausgeführt
            $stmt->execute();
        }
        // 2. Statement ausführen
        $this->sql = $sqlAdresse;
        // PreparedStatement wird erstellt
        $stmt = $this->con->prepare($this->sql);
        // PreparedStatement wird erstellt
        $stmt->execute();

        // Datenbankverbindung wird geschlossen
        $this->con->schließen();
    }

    // function um bereits bestehende Adressen anzuzeigen
    function adresseanzeigen($kundennummer) {
        // SQL Statement
        $sql = 'select straße, plz, ort from adresse join postleitzahl '
                . 'where Postleitzahl_PLZ = plz and Kunde_kundennummer = ' . $kundennummer . ';';
        $this->sql = $sql;
        // Connection
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();
        // Prepared Statement erstellen und ausführen
        $stmt = $con->prepare($this->sql);
        $stmt->execute();
        $total = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $a = 0;

        // Ausgabe
        while ($a < $total) {
            echo $row['straße'] . ' <br>' . $row['plz'] . ' '.$row['ort'];
            $a++;
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }

    }

    // function um die Bestellung abzuschließen
    function bestellungabschließen() {
        //Speicherung von Daten aus Warenkorb in table Bestellung
        $menge = $SESSION['warenkorb'];
        $gesamtpreis = $SESSION['warenkorb'];
        $timestamp = time();
        $datum = date("d.m.Y - H:i", $timestamp);
        $produktnr = $SESSION['warenkorb'];
        $kundennr = $SESSION['logged']['id'];
        $query = 'insert into Bestellung (Bestellnummer, Menge, Gesamtpreis, Datum, Produkt_Produktnummer, Kunde_Kundennummer) values (null '
                    . $menge . ',' . $gesamtpreis . ',' . $datum . ',' . $produktnr . ',' . $kundennr .')';
        
       
        //Objekt von Denis Kevljanins Mail
        $mail = new Mail();
        
        $ende = 'Vielen Dank für Ihre Bestellung! Sie erhalten in Kürze eine Bestätigung per E-Mail.';
                
        return $ende;
    }

}
