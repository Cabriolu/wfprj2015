<?php
//Sprint 3, Gruppe 4 Onlineshop, 
//Verfasser: Christian Frindt, Datum: 19.11.2015 Version 1.1
//UserStory: 270 Als Programmierer möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
//Task: Zusammenführen
//Aufwand: 2 Stunden
//Beschreibung: Es wird der Controller des Warenkorbs im Frontend erstellt.

require_once '../app/config/Connect_Mysql.php';

class WarenkorbModel {

    private $db;
    private $res;
    private $con;

    public function __construct() {
        //Connection zu Kerstins Datenbank
        $this->db = new Connect_Mysql();
        $this->con = $this->db->verbinden();
    }

    public function getArtikel($id) {
        //Methode die anhand von übergebener ID Produktinfos für den warenkorb aus der datenbank an den Controller zurückgibt
        $produktID = $id;
        $query = "Select * From Produkt Where produktnummer=" . $produktID;

        $sql = $this->con->prepare($query);
        $sql->execute();
        $this->res = $sql->fetch(PDO::FETCH_ASSOC);
        $this->closeDB();
        return $this->res;
    }

    public function closeDB() {

        $this->con->null;
        $this->db = null;
    }

}

?>