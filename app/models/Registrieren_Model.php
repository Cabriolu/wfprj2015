
<?php

//Zugriff auf die Datenbankverbindungsklasse
include "../config/Connect_Mysql.php";

class Registrieren_Model{
   
    private $sql; 
    private $Email;
    private $Passwort;
    private $Vorname;
    private $Nachname;
    private $Geschlecht;
    private $Geburtsdatum;
    private $Plz;
    private $Strasse;
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
    public function hinzufügen($Email,$Passwort,$Vorname,$Nachname,$Geschlecht,$Geburtsdatum,$Plz,$Strasse){
        
        
        $this->sql ='INSERT INTO Kunde (Kundennummer,Vorname,Nachname,Geschlecht,Geburtsdatum,Rolle,EMail_email) '
		. 'VALUES 	("null","' . $Vorname . '","' . $Nachname . '","' . $Geschlecht. '","'. $Geburtsdatum .'"'
                . ',"0","' . $Email. '");'
                . 'INSERT INTO Email (email, passwort)'
                . 'VALUES       ("' . $Email. '","' . $Passwort. '");'
                . 'INSERT INTO Adresse(Straße,Kunde_Kundennummer, Postleitzahl_PLZ)'
                . 'VALUES       ("' . $Strasse. '","Last_insert_id()","' . $Plz. '");';
        $this->con->query($this->sql);
        $this->con = null;
        $this->closeDB();
         
        echo "Sie wurden Registriert!";
    }
    // Methode um die Datenbankverbindung zu trennen
    public function closeDB(){
        $this->db->schließen();
        $this->con = 0;
    }
    
}

