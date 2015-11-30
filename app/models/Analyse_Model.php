<?php

//Sprint 4, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 09.11.2015 Version 2
//UserStory: # Als Admin möchte ich verschiedene Analyse-Funktionen im Backend haben.
//Task: - (#) Auslesen der notwendigen Daten aus der Datenbank
//Aufwand: 2 Stunden
//Beschreibung: Es wird das Analyse_Model erstellt. 


// Kerstin Gräter
require_once '../config/Connect_Mysql.php';

class Analyse_Model {

    private $con;
    private $sql;

    // function um den Gewinn durch ein einzelnen Produkt zu ermitteln
    // Marcel Riedl START
    function produktgewinn($produktnummer) {
        $this->sql = 'select menge, preis from bestellliste where produkt_produktnummer = ' . $produktnummer;
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();
        $stmt = $con->prepare($this->sql);
        $row = $stmt->execute();
        $preis = $this->gewinnberechnung($row);
        $con = null;
        $this->con->schließen();
        return $preis;
    }// Marcel Riedl ENDE
    
    
    // Gewinnberechnung
    // Marcel Riedl START
    function gewinnberechnung($row) {
        $total = sizeof($row);
        $a = 0;
        while ($a < $total) {
            $menge = $row[$a]['menge'];
            $preis = $row[$a]['preis'];
            $a++;
            $gesamtpreis = $menge * $preis;
            $gpreis+=$gesamtpreis;
        }
        return $gpreis;
    }// Marcel Riedl ENDE
    
    
    // Menge der Bestellungen eines Produkts ausgeben
    // Marcel Riedl START
    function menge($produktnummer) {
        $this->sql = 'select sum(menge) from bestellliste where produkt_produktnummer = ' . $produktnummer;
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();
        $stmt = $con->prepare($this->sql);
        $data = $stmt->execute();
        $con = null;
        $this->con->schließen();
        return $data;
    }// Marcel Riedl ENDE

    
    // Umsatz des Onlineshops ermittlen
    // Marcel Riedl START
    function umsatz() {
        $this->sql = 'select sum(gesamtpreis) from bestellung;';
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();
        $stmt = $con->prepare($this->sql);
        $data = $stmt->execute();
        $con = null;
        $this->con->schließen();
        return $data;
    }// Marcel Riedl ENDE

    
    // Anzahl der Rezensionen zu einem Produkt
    // Marcel Riedl START
    function rezension($produktnummer) {
        $this->sql = 'select count(rezensionID) from rezension where produkt_produktnummer = ' . $produktnummer;
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();
        $stmt = $con->prepare($this->sql);
        $data = $stmt->execute();
        $con = null;
        $this->con->schließen();
        return $data;
    }// Marcel Riedl ENDE

    
    // Anzahl aller Produkte aus einer Kategorie
    // Marcel Riedl START
    function kategorieprodukt($kategorie) {
        $this->sql = 'select count(produktnummer) from produkt where kategorie_katID = ' . $kategorie;
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();
        $stmt = $con->prepare($this->sql);
        $data = $stmt->execute();
        $con = null;
        $this->con->schließen();
        return $data;
    }// Marcel Riedl ENDE

    
    // Anzahl aller Kunden
    // Marcel Riedl START
    function kunde($bool){
        if ($bool == true){
            $this->sql = 'select count(kundennummer) from kunde where admin = 1;';
        }else if($bool == false){
            $this->sql = 'select count(kundennummer) from kunde where admin = 0;';
        }else{
            $this->sql = 'select count(kundennummer) from kunde;';
        }
        
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();
        $stmt = $con->prepare($this->sql);
        $data = $stmt->execute();
        $con = null;
        $this->con->schließen();
        return $data;
    } // Marcel Riedl ENDE

}
