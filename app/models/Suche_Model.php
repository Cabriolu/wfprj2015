<?php
//Sprint 3, Gruppe 4 Onlineshop, Verfasser: Denis Kevljanin, Datum: 22.11.2015
//UserStory: 190 Als Kunde möchte ich eine Filter- und Suchfunktion einsetzen können
//Task: 190-2 Suchfunktion programmieren
//Aufwand: 15 Stunden
//Beschreibung: Model der Suchfunktion

require ('../app/view/Header.php');
error_reporting(E_ALL);

class Suche_Model {

    private $db;
    private $con;
    //Datenbankconnection übernommen von @Gräter,Kerstin
    public function __construct() {
        try {
            $this->db = new Connect_Mysql();
            $this->con = $this->db->verbinden();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }
    //Funktion mit dem SQL Prepare Statement und schließen der Connection
    public function suchabfrage() {
        $suche = $_POST['Suche'];
        $sql = $this->con->prepare("SELECT * FROM Produkt WHERE Name LIKE '%$suche%'");
        $sql->execute();
        
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        $this->con = null;
        $this->db->schließen();
        
        return $data;
    }

}
