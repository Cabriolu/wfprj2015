<?php

//Sprint 3, Gruppe 4 Onlineshop, 
//Verfasser: Marcel Riedl, Datum: 19.11.2015 Version 1
//UserStory: 270 Als Programmierer möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen
//Task: 270-1 (#10329) Zusammenführen
//Aufwand:  Stunden
//Beschreibung: Es wird das Model zum Produkt erstellt. 
//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 09.11.2015 Version 2
//UserStory: Als Programmierer möchte ich den Aufbau als Model-View-Controller (MVC) haben.
//Task: 140-2 (#10190) Eigenen Code an MVC anpassen
//Aufwand: 4 Stunden
//Beschreibung: Es wird der grundlegende Aufbau des Produkts als MVC erstellt. 

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
    public function anlegen($name, $hersteller, $preis, $kategorie) {
        $this->sql = 'insert into Produkt (Produktnummer, Name, Hersteller, alterPreis, neuerPreis, Kategorien_Kategorie) '
                . 'values (null, "' . $name . '", "' . $hersteller . '", ' . $preis . ',0.0 , "' . $kategorie . '");';
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
        $this->sql = 'Select Name, Farbe, Groeße, Hersteller, Preis, SalePreis from produkt where Produktnummer = ' . $produktnummer;
        // Verbindung zur Datenbank
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();
        // Prepared Statement erzeugen und ausführen
        $stmt = $con->prepare($this->sql);
        $stmt->execute();
        $total = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $a = 0;

        // Anzeige des Produkts
        while ($a < $total) {
            if ($row['SalePreis'] < $row['Preis']) {
                $preis = $row['SalePreis'];
            } else {
                $preis = $row['Preis'];
            }
            
            echo '<h2>' . $row['Name'] . '</h2><br>' . $row['Hersteller'] . '<br>'
            . $preis . '<br>';
            echo 'Farbe:'.$row['Farbe'].' Größe: '.$row['Groeße'];
            $a++;
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        echo'<form action="../../controller/produktcontroller.php" method="post">'
        . '<input type="button" name="warenkorb" value="In den Warenkorb">'
        . '<input type="button" name="sofortkauf" value="Direktkauf"></form>';
        $con = null;
        $this->con->schließen();
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
        $this->sql = 'Select Produktnummer, Name, Hersteller, alterPreis from produkt;';

        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();

        $stmt = $con->prepare($this->sql);
        $stmt->execute();
        $total = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $a = 0;


        while ($a < $total) {
            echo '<tr> <td> ' . $row['Produktnummer'] . ' </td> <td>' . $row['Name']
            . ' </td><td>' . $row['Hersteller'] . '</td><td>' . $row['alterPreis'] . '</td> </tr>';
            $a++;
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        echo '</table>';
        $con = null;
        $this->con->schließen();
    }

    // function um Produkte aus einer Kategorie zu sehen
    function ansicht($kategorie) {
        echo 'hallo';
        $sql = 'Select Produktnummer, Name, Farbe, Groeße, Hersteller, Preis, SalePreis from Produkt where Kategorie_KatID = ' . $kategorie;
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();

        $stmt = $con->prepare($sql);
        $stmt->execute();
        $total = $stmt->rowCount();
        $a = 0;
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        while ($a < $total) {
            if ($row['SalePreis'] < $row['Preis']) {
                $preis = $row['SalePreis'];
            } else {
                $preis = $row['Preis'];
            }
            echo '<div class="col-xs-6 col-lg-4"><h2><a href="/mysql2015/public/ProduktansichtController/'
            . $row['Produktnummer'] . '">' . $row['Name'] . ' </a><nbsp><nbsp><nbsp><nbsp>' . $preis . '</h2>';
            echo '<p>Hersteller: ' . $row['Hersteller'] . '<br>Farbe: ' . $row['Farbe']
            . '<br>Größe: ' . $row['Groeße'] . '<br></p>';
            echo '</div>';
            $a++;
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        $con = null;
        $this->con->schließen();
    }

}
