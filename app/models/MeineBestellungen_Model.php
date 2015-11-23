<!-- Ridvan Atacan, 3113837
    10.11.2015 Group #4 Onlineshop
    Sprint 2, Task : 170-1 #10197
    User Story: Als Kunde möchte ich meine alten Bestellungen darstellen können. 
    Task: Alte Bestellungen anzeigen
    Aufwand: 10 Stunden
 -->
<?php
// Zugriff auf die Datenbankverbindungsklasse

//include "../config/Login.php";

class MeineBestellungen_Model{
		
    private $con;
    private $bestellnummer;
    private $datum;
    private $gesamtpreis;
    private $menge;
    private $data;
    private $db;
    private $sql;
    private $result;
    
    //Datenbankverbindung versuchen aufzubauen sobald ein Objekt der Klasse erzeugt wird
    public function __construct(){
       
        try{
           $this->db = new Connect_Mysql();
           $this->con = $this->db->verbinden();
            
            
        }catch(PDOException $ex){
            
            print $ex;
    }
    }
	//Methode zur Ausgabe von der Bestellnummer zum zugehörigen Kunden
     public function bestellliste() {
        
		//Zugriff auf die Tabellen auf der Datenbank mittels SQL Statements und PDO
        echo '<br>Meine Bestellungen <br>';
        $this ->sql = $this->con->prepare("SELECT Bestellnummer FROM BESTELLUNG WHERE Kunde_Kundennummer = 6");
        $this ->sql->execute();
        $this->data = $this->sql->fetch();
        $this->bestellnummer = $this->data[0];
        
        $cnt = $this->sql->rowCount();
        echo("Bestellnummer : <br>");
        echo($this->bestellnummer);
        
         $this->closeDB();
        
        }
	//Methode zur Ausgabe aller Bestellungen zum zugehörigen Kunden
	//Im weiteren Verlauf wird es möglich sein nur dem eingeloggten Kunden seine Bestellungen darzustellen
     public function alleBestellungen(){
        
		//Zugriff auf die Tabellen auf der Datenbank mittels SQL Statements und PDO		
        echo'<br><strong>Alle Bestellungen</br></strong>';
        $query = "SELECT Bestellnummer,Gesamtpreis,Menge,Datum FROM Bestellung WHERE Kunde_Kundennummer = 5" ;
        $this->sql = $this->con->prepare($query);
        $this->sql->execute();
        $this->result = $this->sql->fetch(PDO::FETCH_ASSOC);
        $this->count = $this->sql->rowCount();
        
		//Abfrage, ob dem jeweiligen Kunden eine Bestellung vorliegt
         if(empty($this->result)){
            
            echo"Sie haben noch keine Bestellungen:<br> ";
             
        }else{
           
            echo"Sie haben folgende Bestellungen:<br> "
            . "Bestellungen : " .$this->count ."<br>";
        }
        
        $i = 0;
		// Wenn mehrere Zeilen von der Datenbank gelesen werden, diese durchgehen und Zeile für Zeile ausgeben
        while ($i < $this->count){
            echo"<br><fieldset>";
            echo "Bestellnummer : " .$this->result['Bestellnummer'];
            echo "<br>Gesamtpreis : " .$this->result['Gesamtpreis'];
            echo "<br>Menge : " .$this->result['Menge'];
            echo "<br>Datum : " .$this->result['Datum'];
            echo "</fieldset>";
            
           
           
            $i++;
            $this->result = $this->sql->fetch(PDO::FETCH_ASSOC);
            
        }
        $this->gesamtpreis = $this->result['Gesamtpreis'];
        
        echo "</table>";
        
        
        $this->closeDB();
     }        
        
    public function prnt(){
        print $this->bestellnummer;
    }
	//Methode um die Datenbankverbindung zu trennen
    public function closeDB(){
       $this->db->schließen();
       $this->con = 0;
   }
   
   public function getPreis(){
       
       return $this->gesamtpreis;
   }
   
   public function getRow(){
        
      return $this->count;
   }
        
}
/*obj = new MeineBestellungen_Model();
$obj->prnt();
$obj->bestellliste();
*/