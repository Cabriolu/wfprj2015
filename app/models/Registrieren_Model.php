<!-- Renato Cabriolu, 3112468
    23.11.2015 Group #4 Onlineshop
    Sprint 3, Task : 270-1
    User Story: Als Kunde möchte ich in den Wichtigsten Funktionen ein Fertiges Ergebnis sehen. 
    Task: Eigener Code anpassen
    Aufwand: 4 Stunden
 -->
<?php


class Registrieren_Model{
   
    public $sql; 
    public $Email;
    public $Passwort;
    public $Vorname;
    public $Nachname;
    public $Geschlecht;
    public $Geburtsdatum;
    public $Plz;
    public $Strasse;
    //Datenbankverbindung versuchen aufzubauen sobald ein Objekt der Klasse erzeugt wird
    public function __construct(){
        
         try{
           $this->db = new Connect_Mysql();
           $this->con = $this->db->verbinden();
            
            
        }catch(PDOException $ex){
            
            print $ex;
    }
        
    }
    //Methode zum Registrieren eines Kunden anhand der $_POST- Parameter die vom View übergeben werden
    public function hinzufuegen($Email,$Passwort,$Vorname,$Nachname,$Geschlecht,$Geburtsdatum,$Plz,$Strasse){
        
        
        $this->sql ="insert into Email (Email, Passwort)values ('$Email', '$Passwort'); insert into Kunde (Kundennummer, Vorname, Nachname, Geschlecht, Geburtsdatum, Rolle, EMail_email)
                    values ('Null','$Vorname', '$Nachname', '$Geschlecht', '$Geburtsdatum','0','$Email'); insert into Adresse (Straße,Kunde_Kundennummer,Postleitzahl_PLZ) values ($Strasse', 'Last_insert_id()','$Plz');";
                    
       
        
        echo 'Sie wurden erfolgreich registriert!!!';
        $this->con->query($this->sql);
        $this->con = null;
        $this->closeDB();
    }
    // Methode um die Datenbankverbindung zu trennen
    public function closeDB(){
        $this->db->schließen();
        $this->con = 0;
    }
    
}

