<?php

//Sprint 3, Gruppe 4 Onlineshop, Verfasser: Denis Kevljanin, Datum: 22.11.2015
//UserStory: 190 Als Kunde möchte ich eine Filter- und Suchfunktion einsetzen können
//Task: 190-1 filterfunktion programmieren
//Aufwand: 15 Stunden
//Beschreibung: Model der Filterfunktion
require ('../app/view/Header.php');
error_reporting(E_ALL);

class Filter_Model {

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
    public function filterFarbe() {

        $base_sql = ("SELECT * FROM Produkt WHERE Farbe LIKE ");
        if (isset($_GET['blau'])) {
            $sql_extra[] = "'%blau%'";
        }
        if (isset($_GET['rot'])) {
            $sql_extra[] = "'%rot%'";
        }
        if (isset($_GET['schwarz'])) {
            $sql_extra[] = "'%schwarz%'";
        }
        if (isset($_GET['beige'])) {
            $sql_extra[] = "'%beige%'";
        }
        if (!empty($sql_extra)) {
            $sql_where = implode(" OR Farbe LIKE ", $sql_extra);
        } else {
            $sql_where = "'%%'";
        }
        $sql = $base_sql . $sql_where;
        print_r($sql);
        $stmt = $this->con->prepare($sql);

        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->con = null;
        $this->db->schließen();

        return $data;
    }

}
