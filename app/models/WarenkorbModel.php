<?php

require_once '../app/config/Connect_Mysql.php';

class WarenkorbModel {

    private $db;
    private $res;
    private $con;

    public function __construct() {

        $this->db = new Connect_Mysql();
        $this->con = $this->db->verbinden();
    }

    public function getArtikel($id) {
        $produktID = $id;
        $query = "Select * From Produkt Where produktnummer=" . $produktID;

        $sql = $this->con->prepare($query);
        $sql->execute();
        // Falls angefordertes Query in res vorhanden
        $this->res = $sql->fetch(PDO::FETCH_ASSOC);
        $this->closeDB();
        return $this->res;
    }

    public function closeDB() {

        
        $this->db = null;
    }

}

?>