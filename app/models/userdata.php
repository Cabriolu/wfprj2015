<?php

//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Denis Kevljanin, Datum: 05.11.2015
//UserStory: Als Kunde möchte ich eine automatische Bestellbestätigung per Mail erhalten
//Task: 180-1 Automatischen E-Mailversand programmieren (#10196)
//Aufwand: 22 Stunden
//Beschreibung: Klasse mit SQL-Abfragen zur weiterverarbeitung als Mail

require_once('../config/Connect_Mysql.php');

error_reporting(E_ALL);

//Erstellen der Klasse Userdata
class Userdata {

    //Variablen
    private $db;
    private $con;
    private $bestellung;
    private $vorname;
    private $nachname;
    private $geschlecht;
    private $empfänger;
    private $produktname;
    private $menge;
    private $preis;
    private $produktnummer;
    private $gesamt;
    private $kundennummer;

    //Konstruktor
    public function __construct() {
        try {
            $this->db = new Connect_Mysql();
            $this->con = $this->db->verbinden();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //Function um die Bestellnummer zu bekommen 
    public function getBestellung() {

        $sql1 = $this->con->prepare("SELECT Bestellnummer FROM Bestellung WHERE Datum = (SELECT MAX(Datum) FROM bestellung)");
        $sql1->execute();
        $bestellung = $sql1->fetch();
        $this->bestellung = $bestellung[0];
        return $this->bestellung;
    }

    //Function um die Kundennummer zu bekommen
    public function getKundennummer() {

        $sql7 = $this->con->prepare("SELECT Kunde_Kundennummer FROM Bestellung WHERE Bestellnummer =" . $this->bestellung);
        $sql7->execute();
        $kundennummer = $sql7->fetch();
        $this->kundennummer = $kundennummer[0];
        return $this->kundennummer;
    }

    //Funktion um den Vornamen zu bekommen
    public function getVorname() {

        $sql2 = $this->con->prepare("SELECT Vorname FROM Kunde WHERE Kundennummer =" . $this->kundennummer);
        $sql2->execute();
        $vorname = $sql2->fetch();
        $this->vorname = $vorname[0];
        return $this->vorname;
    }

    //Function un den Nachnamen zu bekommen
    public function getNachname() {

        $sql3 = $this->con->prepare("SELECT Nachname FROM Kunde WHERE Kundennummer =" . $this->kundennummer);
        $sql3->execute();
        $nachname = $sql3->fetch();
        $this->nachname = $nachname[0];
        return $this->nachname;
    }

    //Function um das Geschlecht zu bekommen
    public function getGeschlecht() {

        $sql4 = $this->con->prepare("SELECT Geschlecht FROM Kunde WHERE Kundennummer =" . $this->kundennummer);
        $sql4->execute();
        $geschlecht = $sql4->fetch();
        $this->geschlecht = $geschlecht[0];
        return $this->geschlecht;
    }

    //Function um die E-Mailadresse zu bekommen
    public function getEmpfänger() {

        $sql5 = $this->con->prepare("SELECT EMail_email FROM Kunde WHERE Kundennummer =" . $this->kundennummer);
        $sql5->execute();
        $empfänger = $sql5->fetch();
        $this->empfänger = $empfänger[0];
        return $this->empfänger;
    }

    //Function um Datenbankverbindung zu schließen
    public function closeDB() {
        $this->db->schließen();
        $this->con = NULL;
        $this->db = NULL;
    }

}
