<!-- Ridvan Atacan, 3113837
    10.11.2015 Group #4 Onlineshop
    Sprint 2, Task : 140-6 #10204
    User Story: Als Programmierer möchte ich meine Codes als Model–view–controller (MVC) haben
    Task: Eigenen Code an MVC anpassen
    Aufwand: 5 Stunden
 -->
 <!-- Ridvan Atacan, 3113837
    24.11.2015 Group #4 Onlineshop
    Sprint 3, Task : 270-6 #10334
    User Story: Als Kunde möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
    Task: Zusammenführen
    Aufwand: 5 Stunden
 -->
<?php




class LieferAdresse_Model{
 
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
        
        
        $this->sql ='INSERT INTO Lieferadresse(LieferID,Vorname,Nachname,Straße,Postleitzahl_PLZ,Kunde_Kundennummer) '
		. 'VALUES 	(null,"'. $name .'","' . $nname . '","' . $strasse . '",' . $plz. ','. $kid .');';
        
        $this->con->query($this->sql);
        $this->con = null;
        $this->closeDB();
        
        echo "Die neue Lieferadresse wurde angelegt!</main>";
    }
    // Methode um die Datenbankverbindung zu trennen
    public function closeDB(){
        $this->db->schließen();
        $this->con = 0;
    }
    
}

