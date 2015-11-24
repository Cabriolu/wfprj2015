<!--
-- Meryem Güler, 3107546
-- Group #4 Onlineshop
-- Sprint 3, Task : (230-1) #10323 Version 1
-- User Story: Als Kunde möchte ich über ein Kontaktformular mit den OnlineShop-betreibern in Verbindung kommen.
-- Task: Kontaktformular programmieren
-- Aufwand : 10 Stunden
 -->


<?php
    //Zugriff auf die Datenbankverbindungsklasse
include "../config/Connect_Mysql.php";

class Kontakt_Model{
   
   private $sql; 
   private $datum;
   private $vorname;
   private $nachname;
   private $email;
   private $betreff;
   private $kommentar;
    //Datenbankverbindung versuchen aufzubauen sobald ein Objekt der Klasse erzeugt wird
    public function __construct(){
        
         try{
           $this->db = new Connect_Mysql();
           $this->con = $this->db->verbinden();
            
            
        }catch(PDOException $ex){
            
            print $ex;
    }
        
    }
    //Methode zum Hinzufügen einer Nachricht anhand der $_POST- Parameter die vom View übergeben werden
    public function hinzufügen($datum,$vorname,$nachname,$email,$betreff,$kommentar){
        
        
        $this->sql ='INSERT INTO Kontakt(Datum,Vorname,Nachname,Email,Betreff,Nachricht) '
		. 'VALUES 	("'. $datum .'","'. $vorname .'","' . $nachname . '","' . $email . '","' . $betreff. '","'. $kommentar .'");';
        $this->con->query($this->sql);
        $this->con = null;
        $this->closeDB();
         
        echo "Die Nachricht wurde in die Datenbank hinzugef&uuml;gt!";
    }
    // Methode um die Datenbankverbindung zu trennen
    public function closeDB(){
        $this->db->schließen();
        $this->con = 0;
    }
    
}

?>