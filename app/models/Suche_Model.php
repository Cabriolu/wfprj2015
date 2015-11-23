<?php

require_once ('../app/config/Connect_Mysql.php');
require ('../app/view/Header.php');
error_reporting(E_ALL);

class Suche_Model {


    private $db;
    private $con;

    public function __construct() {
        try {
            $this->db = new Connect_Mysql();
            $this->con = $this->db->verbinden();
        } catch (PDOException $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function suchabfrage() {
        $suche = $_POST['Suche'];
        $sql = $this->con->prepare("SELECT Name, Hersteller, Preis FROM Produkt WHERE Name LIKE '%$suche%'");
        $sql->execute();
        
        $total = $sql->rowCount();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $a = 0;


        while ($a < $total) {
            $row['Name'];
            $row['Hersteller'];
            $row['Preis'];
            $a++;
        }
        echo '</table>';
        
        $this->con = null;
        $this->db->schließen();
    }

}
