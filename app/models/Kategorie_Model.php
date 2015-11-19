<?php

//Sprint 3, Gruppe 4 Onlineshop 
//Verfasser: Marcel Riedl, Datum: 14.11.2015 Version 1
//UserStory: #90 Als Kunde möchte ich eine einfache Navigation in Kategorien, so dass ich schnell mein Wunschprodukt finden kann.
//Task: #90-1 (10315) Kategorien auswählen und programmieren
//Aufwand:  Stunden
//Beschreibung: Es wird das Model für die Kategorien erstellt. 
// Kerstin Gräter
require_once '../config/Connect_Mysql.php';

class Kategorie_Model {

    private $sql;
    private $con;

    function __construct() {
        
    }

    // function um alle Kategorien anzeigen zu können
    function kategorienanzeigen() {
        $this->sql = 'Select * from Kategorien;';
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();
        // Prepared Statement erstellen und ausführen
        $stmt = $con->prepare($this->sql);
        $stmt->execute();

        $total = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $a = 0;

        // Schreiben der Kategoruen mit Link
        while ($a < $total) {
            echo '<a href="../Kategoriecontroller.php">' . $row['Kategorie'] . '</a>';
            $a++;
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        $con = null;
        $this->con->schließen();
    }

    // function um die Produkte anzeigen zu können, die zur Kategorie gehören
    function kategorieprodukte($kategorie) {
        $this->sql = 'Select Name, alterPreis, neuerPreis from Produkt where Kategorien_Kategorie = "' . $kategorie . '";';
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();
        // Prepared Statement erstellen und ausführen
        $stmt = $con->prepare($this->sql);
        $stmt->execute();

        $total = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $a = 0;

        // Ausgabe der Produkte einer einzelnen Kategorie
        while ($a < $total) {
            echo '<tr> <td> <a href ="../controller/produktfrontcontroller.php?ansicht&ha=' . $row['Produktnummer'] . '" >'
            . $row['Name'] . ' </a> </td> <td> ' . $row['alterPreis'] . ' </td> </tr>';
            echo '<tr><td>Hersteller:' . $row['Hersteller'] . ' </td><td></td></tr>';
            $a++;
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        $con = null;
        $this->con->schließen();
    }
    
    // function um die jeweiligen Oberkategorien zu sehen und dann in die dazugehörigen Kategorien zu gelangen
    function kategorieauswaehlen() {
        $this->sql = 'Select Oberkat from Oberkategorie';
        $this->con = new Connect_Mysql();
        $this->con->verbinden();
        $stmt = $this->con->prepare($this->sql);
        $stmt->execute();

        $total = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $a = 0;

        // Ausgabe der Kategorien
        while ($a < $total) {
            echo '<a href="../controller/Kategoriecontroller.php">' . $row['Oberkat'] . '</a><br>';
            $a++;
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        $this->con->schließen();
    }

}
