<?php

/*
  Gruppe 4 Onlineshop
  Kerstin Gräter 3113720
  Sprint 2
  UserStory: Als Programmierer möchte ich eine Datenbank-Verbindung haben.
  Task: 120-1 Connection erstellen
  Datum: 03.11.2015
  Zeitaufwand: 3 Stunden
 */

class Connect_Mysql extends PDO {

//    private $db_user ='wfprj_wf5_36';
//    private $db_pswd = 'wfprj_wf5_36';
//    private $db_host = 'i-intra-07.informatik.hs-ulm.de';
//    private $db_name = 'wfprj_wf5_36';
    private $db;

    public function __construct() {
//        $db_user ='wfprj_wf5_36';
//    $db_pswd = 'wfprj_wf5_36';
//    $db_host = 'i-intra-07.informatik.hs-ulm.de';
//    $db_name = 'wfprj_wf5_36';


        try {
            $this->db = new PDO('mysql:host=i-intra-07.informatik.hs-ulm.de;dbname=wfprj_wf5_36;', 'wfprj_wf5_36', 'wfprj_wf5_36');
        } catch (PDOException $e) {
            echo $e->getMessage() . "Verbindung fehlgeschlagen!";
        }
    }

    public function verbinden() {
        if ($this->db instanceof PDO) {
//            echo 'Erfolgreich verbunden!';
            return $this->db;
        }
    }

    public function schließen() {
        $this->db = null;
    }

}

?>