<!-- Ridvan Atacan, 3113837
    10.11.2015 Group #4 Onlineshop
    Sprint 2, Task : 140-6 #10204
    User Story: Als Programmierer möchte ich meine Codes als Model–view–controller (MVC) haben
    Task: Eigenen Code an MVC anpassen
    Aufwand: 5 Stunden
 -->
<?php

//Zugriff auf die Datenbankverbindungsklasse


class LieferAdresse_Model{
   
   private $sql; 
   private $name;
   private $nname;
   private $strasse;
   private $plz;
   private $kid;
    //Datenbankverbindung versuchen aufzubauen sobald ein Objekt der Klasse erzeugt wird
    public function __construct(){
        
         try{
           $this->db = new Connect_Mysql();
           $this->con = $this->db->verbinden();
            
            
        }catch(PDOException $ex){
            
            print $ex;
    }
        
    }
    //Methode zum Hinzufügen einer Lieferadresse anhand der $_POST- Parameter die vom View übergeben werden
    public function hinzufügen($name,$nname,$strasse,$plz,$kid){
        
        
        $this->sql ='INSERT INTO Lieferadresse(Vorname,Nachname,Straße,Postleitzahl_PLZ,Kunde_Kundennummer) '
		. 'VALUES 	("'. $name .'","' . $nname . '","' . $strasse . '","' . $plz. '","'. $kid .'");';
        $this->con->query($this->sql);
        $this->con = null;
        $this->closeDB();
         
        echo "Die neue Lieferadresse wurde angelegt!";
    }
    // Methode um die Datenbankverbindung zu trennen
    public function closeDB(){
        $this->db->schließen();
        $this->con = 0;
    }
    
}

