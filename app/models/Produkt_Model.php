<?php

//Sprint 3, Gruppe 4 Onlineshop, 
//Verfasser: Marcel Riedl, Datum: 19.11.2015 Version 1
//UserStory: 90 Als Kunde möchte ich eine einfache Navigation in Kategorien, so dass ich schnell mein Wunschprodukt finden kann.
//UserStory: 270 Als Programmierer möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen
//Task: 270-1 (#10329) Zusammenführen
//Task: 90-1 (10315) Kategorien auswählen und programmieren
//Aufwand: 5 Stunden
//Beschreibung: Es wird das Model zum Produkt erstellt.
//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 09.11.2015 Version 2
//UserStory: Als Programmierer möchte ich den Aufbau als Model-View-Controller (MVC) haben.
//Task: 140-2 (#10190) Eigenen Code an MVC anpassen
//Aufwand: 4 Stunden
//Beschreibung: Es wird der grundlegende Aufbau des Produkts als MVC erstellt. 
//Sprint 1, Gruppe 4 Onlineshop
//Verfasser: Marcel Riedl Matrikelnummer: 3113845
//UserStory: Als Kunde erwarte ich eine schnelle und einfache, sowie eine reibungslose Bestellabwicklung
//Task: #10003 Produkte anlegen
//Datum: 23.10.2015 Version 1
//Zeitaufwand: 8 Stunden
// Kerstin Gräter
include_once '../app/config/Connect_Mysql.php';

class Produkt_Model {

    public $egal;
    protected $hersteller;
    protected $preis;
    protected $sql;
    protected $con;
    protected $result;

    function __construct() {
        
    }

    // function um ein Produkt anlegen zu können
    public function anlegen($name, $hersteller, $farbe, $groeße, $preis, $kategorie) {
        $this->sql = 'insert into Produkt (Produktnummer, Name, Farbe, Groeße, Hersteller, Preis, SalePreis, Kategorie_katID) '
                . 'values (null, "' . $name . '","' . $farbe . '","' . $groeße . '", "'
                . $hersteller . '", ' . $preis . ',' . $preis . ' , "' . $kategorie . '");';
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();

        $con->query($this->sql);
        $con = null;
        $this->con->schließen();
        echo 'Das Produkt ' . $name . ' wurde angelegt!';
    }

    // function um ein Produkt löschen zu können
    public function loeschen($produktnummer) {
        $this->sql = 'delete from Produkt where produktnummer = ' . $produktnummer;

        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();

        $stmt = $con->prepare($this->sql);
        $stmt->execute();
        $con = null;
        $this->con->schließen();
        return 'Das Produkt wurde gelöscht.';
    }

    // function um das Produkt zu aktualisieren
    // still under work
    public function aktualisieren($produktnummer, $aenderung, $wert) {
        $this->sql = 'update table produkt set' . $aenderung . ' = ' . $wert
                . ' where produktnummer = ' . $produktnummer;

        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();

        $stmt = $con->prepare($this->sql);
        $stmt->execute();
        $con = null;
        $this->con->schließen();

        return "Das Produkt wurde aktualisiert.";
    }

    // function um ein spezielles Produkt anzuzeigen
    public function produktansicht($produktnummer) {
        // Abfrage nach dem Produkt
        $this->sql = 'Select Produktnummer, Name, Farbe, Groeße, Hersteller, Preis, SalePreis from produkt where Produktnummer = ' . $produktnummer;
        // Verbindung zur Datenbank
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();
        // Prepared Statement erzeugen und ausführen
        $stmt = $con->prepare($this->sql);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $con = null;
        $this->con->schließen();
        return $data;
    }

    // function um alle produkte eines speziellen Herstellers anzuzeigen
    public function produkthersteller($hersteller) {
        // SQL-Abfrage zu allen Produkten eines speziellen Herstellers
        $this->sql = 'Select Produktnummer, Name from produkt where hersteller = "' . $hersteller . '";';

        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();

        $stmt = $con->prepare($this->sql);
        $stmt->execute();
        $total = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $a = 0;


        while ($a < $total) {
            echo '<tr> <td> ' . $row['Produktnummer'] . ' </td> <td>' . $row['Name'] . ' </td> </tr>';
            $a++;
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        echo '</table>';
        $con = null;
        $this->con->schließen();
    }

    // function um alle Produkte anzuzeigen
    public function alleProdukte() {
        // SQL-Abfrage zu allen Produkten eines speziellen Herstellers
        $this->sql = 'Select p.Produktnummer, p.Name, p.Farbe, p.Groeße, p.Hersteller, '
                . 'p.Preis, k.Kategorie, o.oberkat from Produkt p join Kategorie k '
                . 'join Oberkategorie o where p.Kategorie_katID = k.katID '
                . 'and k.Oberkategorie_OberkatID = o.OberkatID order by Produktnummer;';

        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();

        $stmt = $con->prepare($this->sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $con = null;
        $this->con->schließen();
        return $row;
    }

    function liste($kategorie) {


        $this->sql = 'Select Produktnummer, Name, Farbe, Groeße, Hersteller, Preis, SalePreis from Produkt where Kategorie_katID = ' . $kategorie;
        
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();

       
        $stmt = $con->prepare($this->sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $con = null;
        $this->con->schließen();
        return $data;
    }

    // function um Produkte aus einer Kategorie zu sehen
    public function produktliste($kategorie) {
        $this->sql = 'Select Produktnummer, Name,Farbe, Groeße, Hersteller, Preis, SalePreis from produkt where Kategorie_KatID = ' . $kategorie;
        // Verbinden mit Datenbank
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();
        // Prepared Statement erstellen und ausführen
        $stmt = $con->prepare($this->sql);
        $stmt->execute();

        $total = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $a = 0;
        echo '<main>';

        while ($a < $total) {
            echo '<div><h2><a href ="../ProduktansichtController/' . $row['Produktnummer'] . '" >'
            . $row['Name'] . ' </a></h2> <nbsp><nbsp><nbsp>' . $row['Preis'] . ' €';
            echo '<br>Hersteller:' . $row['Hersteller'] . '<br>';
            echo 'Farbe: ' . $row['Farbe'];
            echo '     Größe: ' . $row['Groeße'];
            $a++;
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        echo '</main>';
        $con = null;
        $this->con->schließen();
    }

}
