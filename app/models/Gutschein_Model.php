<!-- Ridvan Atacan, 3113837
   24.11.2015 Group #4 Onlineshop
   Sprint 3, Task : 280-1 #10460
   User Story: Als Kunde möchte ich von Rabattaktionen durch Gutschein-Codes profitieren können.
   Task: Gutscheincodes einlesen und überprüfen
   Aufwand: 6 Stunden
-->
<?php

//include '../config/Connect_Mysql.php';

class Gutschein_Model {

    private $query;
    private $sql;
    private $result1;
    private $a;

    public function __construct() {

        try {
            $this->db = new Connect_Mysql();
            $this->con = $this->db->verbinden();
        } catch (PDOException $ex) {

            print $ex;
        }
    }

    public function prüfen($gid) {
        //SQL Anweisung durchführen
        $query = "SELECT GID FROM Gutschein";
        $this->sql = $this->con->prepare($query);
        $this->sql->execute();
        $this->result = $this->sql->fetch(PDO::FETCH_ASSOC);
        $this->count = $this->sql->rowCount();
        $i = 0;
        $b = 0;
        $this->a = 0;
        $this->result1 = $this->result['GID'];
        //Die Zahlenreihe aufteilen und in einen Array setzen
        $value1 = chunk_split("$gid", 1, " ");
        $array1 = explode(" ", $value1);
        //While-Schleife um die ganze Zahlenreihe, also den Array durchzulaufen
        while ($i < $this->count) {
            //Die Zahlenreihe aus der Datenbank ebenso aufteilen und in einen Array setzen
            $value = chunk_split("$this->result1", 1, " ");
            $array = explode(" ", $value);
             //Die 10 stelligen Codes auf jede Stelle vergleichen
            while ($b < 10) {

                if ($array[$b] == $array1[$b]) {
                    $b++;
                    $this->a++;

                    if ($this->a == 10) {
                        $i = $this->count;

                        $ergebnis = "Richtig";
                    }
                } else {
                    $b++;
                    $this->a = 0;
                    $ergebnis = "Falsch";
                }
            }
            $b = 0;
            $i++;
            //Den nächsten Code aus der Datenbank  holen
            $this->result = $this->sql->fetch(PDO::FETCH_ASSOC);
            $this->result1 = $this->result['GID'];
        }
        if ($ergebnis == "Richtig") {
            echo "Der Code ist gültig! </main>";
        } else {
            echo "Der Code ist ungültig!</main>";
        }
        return $ergebnis;
    }

}
