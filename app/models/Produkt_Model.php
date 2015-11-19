<?php

//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 09.11.2015 Version 2
//UserStory: Als Programmierer möchte ich den Aufbau als Model-View-Controller (MVC) haben.
//Task: 140-2 (#10190) Eigenen Code an MVC anpassen
//Aufwand: 4 Stunden
//Beschreibung: Es wird der grundlegende Aufbau des Produkts als MVC erstellt. 

include_once '../config/Connect_Mysql.php';

class Produkt_Model {

    protected $name;
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

    // function um alle Produkte zeigen zu lassen
    public function produktliste($kategorie) {
        $this->sql = 'Select Produktnummer, Name, Hersteller, alterPreis from produkt where Kategorien_Kategorie = '.$kategorie;
        // Verbinden mit Datenbank
        $this->con = new Connect_Mysql();
        $con = $this->con->verbinden();
        // Prepared Statement erstellen und ausführen
        $stmt = $con->prepare($this->sql);
        $stmt->execute();

        $total = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $a = 0;


        while ($a < $total) {
            echo '<tr> <td> <a href ="../controller/produktfrontcontroller.php?ansicht&ha=' . $row['Produktnummer'] . '" >'
            . $row['Name'] . ' </a> </td> <td> ' . $row['alterPreis'] . ' </td> </tr>';
            echo '<tr><td>Hersteller:' . $row['Hersteller'] . ' </td><td></td></tr>';
            $a++;
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        echo '</table>';
        $con = null;
        $this->con->schließen();
    }

// function um ein spezielles Produkt anzuzeigen
    public function produktansicht($produktnummer) {
        // Abfrage nach dem Produkt
        $this->sql = 'Select Name, Hersteller, alterPreis from produkt where Produktnummer = ' . $produktnummer;
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
            echo '<h2>' . $row['Name'] . '</h2><br>' . $row['Hersteller'] . '<br>'
            . $row['alterPreis'] . '<br>';
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

}
