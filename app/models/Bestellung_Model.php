<?php
// UPDATE AUF VERSION 2, 23.11.15
//Sprint 3, Gruppe 4 Onlineshop, Verfasser: Kerstin Gräter, Datum: 23.11.2015 Version 2
//UserStory: Als Kunde möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
//Task: (270-2) #10330 Zusammenführen
//Aufwand: 7 Stunden

//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Kerstin Gräter, Datum: 09.11.2015 Version 1
//UserStory: Als Programmierer möchte ich den Aufbau als Model-View-Controller (MVC) haben.
//Task: 110-2 (#10190) MVC Programmieren
//Aufwand: 5 Stunden
//Beschreibung: Es wird der grundlegende Aufbau der Bestellabwicklung als MVC erstellt.
// Hier wird das Model dazu erstellt


// include um die Klasse Connect_Mysql einzubinden
require_once '../app/config/Connect_Mysql.php';
// inlude Mailer von Kevljanin


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
                . $vorname . ',' . $nachname . ',' . $straße . ', ' . $kundennummer . ', ' . $plz . ')';

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

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    // function um die Bestellung abzuschließen --> Speicherung in Table Bestellung und Bestellliste sowie berechnung von
    // Gesamtpreis und Abschicken der Bestätigungsmail
    function bestellungabschließen() {
        //Speicherung von Daten aus Warenkorb in table Bestellung und Bestellliste
        $total = sizeof($_SESSION['warenkorb']);
        $a = 0;
        $gesamtpreis = 0;
        $timestamp = time();
        $datum = date("d.m.Y - H:i", $timestamp);
        $kundennr = $_SESSION['logged']['id'];

        $sql1 = 'insert into Bestellung (Bestellnummer, Gesamtpreis, Datum, Kunde_Kundennummer) values (null, 0.0, ' . $datum . ', ' . $kundennr . ')';
            //Aufsführung von sql1
            $con = $this->con = new Connect_Mysql();
            $stmt = $con->prepare($sql1);
            $stmt->execute();
        $sql2 = 'Select Bestellnummer from Bestellung order by Bestellnummer desc Limit 0,1;';
            //Ausführung von sql2
            $con = $this->con = new Connect_Mysql();
            $stmt = $con->prepare($sql2);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $bestellnr = $row['Bestellnummer'];
        
        while ($a < $total) {
            $menge = $_SESSION[$a]['anzahl'];
            $produktnr = $_SESSION[$a]['produktNummer'];
            $sql3 = 'insert into Bestellliste (Produkt_Produktnummer, Bestellung_Bestellnummer, Menge) values (' . $produktnr . ', ' . $bestellnr . ',' . $menge . ') ';
                //Ausführung von sql3
                $con = $this->con = new Connect_Mysql();
                $stmt = $con->prepare($sql3);
                $stmt->execute();
            $sql = 'select preis, SalePreis from produkt where produktnummer = ' . $produktnr;
                //Ausführung von sql
                $con = $this->con = new Connect_Mysql();
                $stmt = $con->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            //Berechnung von Preis * Menge pro Produkt
                if($row['SalePreis']<$row['Preis']){
                    $preis = $row['SalePreis'] * $menge;
                }else{
                    $preis = $row['Preis'] * $menge;
                }
            //Aufsummieren auf Gesamtpreis
            $gesamtpreis+=$preis;
            $a++;
        }
        
        $sql4 = 'Update table Bestellung set Gesamtpreis = ' . $gesamtpreis . 'where Bestellnummer = ' . $bestellnr;
            //Ausführung sql4
            $con = $this->con = new Connect_Mysql();
            $stmt = $con->prepare($sql4);
            $stmt->execute();

        //Objekt von Denis Kevljanins Mail
        include '../controller/mail.php';
        $mail = new Mail();
        if($stmt->execute()){
            $bool = true;
        }else{
            $bool = false;
        }
        
        //Connection schließen
        $con = null;
        $this->con->schließen();
        return $bool;
    }

}
