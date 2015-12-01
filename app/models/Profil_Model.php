<!-- --Sprint 3, Gruppe 4 Onlineshop, 
Verfasser: Hanim Yerlikaya, Datum: 24.11.2015
UserStory: Passwortzurücksetzung mit automatischen Email-Versand programmieren
Task: 200-1 (#10321) Passwort zurück setzen
Aufwand: 5 Stunden
Beschreibung: Der User kann ein einen neuen Passwort beantragen.  
Ergänzung der Function " public function findByEmail($email) für das 3. Sprint" 

Mysql-Connection benutzt von Kerstin Gräter  -->


<?php

class Profil_Model {

	public $id;
        public $email;
	public $vorname;
        public $name;
	public $geschlecht;
	public $geburtstag;
        public $strasse;
        public $plz;
	public $ort;
	public $tele;
        
	protected $connection;

	public function __construct() {
		$this->connection = new Connect_Mysql();
	}

    // function das Profil anzeigen zu k�nnen
    public function laden($id) {
		try
		{
			$db = $this->connection->verbinden();
			$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
			$sql = 'SELECT * FROM kunde left join adresse ON Kundennummer = Kunde_Kundennummer 
										left join postleitzahl ON Postleitzahl_PLZ = PLZ 
											where Kundennummer = :id;';
			$stmt = $db->prepare($sql);
                        $stmt->execute(array('id' => $id));
                        
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			if($row = $stmt->fetch())
			{
				$this->connection->schließen();
                                $profil = new Profil_Model();
                                
                                $profil->id = $row['Kundennummer'];
                                $profil->email = $row['EMail_email'];
                                $profil->vorname = $row['Vorname'];
                                $profil->name = $row['Nachname'];
                                $profil->geschlecht = $row['Geschlecht'];
                                $profil->geburtstag = $row['Geburtsdatum'];
                                $profil->strasse = $row['Straße'];
                                $profil->plz = $row['PLZ'];
                                $profil->ort = $row['Ort'];
                                
				return $profil;
			}
			else
			{
				$this->connection->schließen();
				return null;
			}
		}
		catch(PDOException $e)
		{
			print '<pre>'.$e.'</pre>';
		}
    }
    /*Ergänzung zum 3. Sprint*/
    public function findByEmail($email) {
		try
		{
			$db = $this->connection->verbinden();
			$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = 'SELECT * FROM kunde left join adresse ON Kundennummer = Kunde_Kundennummer 
										left join postleitzahl ON Postleitzahl_PLZ = PLZ 
											where EMail_email = :email;';
                        
			$stmt = $db->prepare($sql);
                        $stmt->execute(array('email' => $email));
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			if($row = $stmt->fetch())
			{
				$this->connection->schließen();
                                
                                $profil = new Profil_Model();
                                $profil->id = $row['Kundennummer'];
                                $profil->email = $row['EMail_email'];
                                $profil->vorname = $row['Vorname'];
                                $profil->name = $row['Nachname'];
                                $profil->geschlecht = $row['Geschlecht'];
                                $profil->geburtstag = $row['Geburtsdatum'];
                                $profil->strasse = $row['Straße'];
                                $profil->plz = $row['PLZ'];
                                $profil->ort = $row['Ort'];
                                
				return $profil;
			}
			else
			{
				$this->connection->schließen();
				return null;
			}
		}
		catch(PDOException $e)
		{
			print '<pre>'.$e.'</pre>';
		}
    }
    
    /*Ende der Funktion bei der Ergänzung*/

    // function um ein Profil l�schen zu k�nnen
    public function loeschen($id) {
		try
		{
			$db = $this->connection->verbinden();
			$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = 'DELETE FROM bestellung WHERE Kunde_Kundennummer = '.$id.';';
			$stmt = $db->prepare($sql);
			$stmt->execute();
			
			//TODO wenn im erm adresse verbessert wurde
			$sql = 'DELETE FROM adresse where Kunde_Kundennummer = '.$id.';';
			$stmt = $db->prepare($sql);
			$stmt->execute();
			
			$sql = 'DELETE FROM kunde where Kundennummer = '.$id.';';
			$stmt = $db->prepare($sql);
			$stmt->execute();
		 
			$this->connection->schließen();
		}
		catch(PDOException $e)
		{
			print '<pre>'.$e.'</pre>';
		}
    }

    // function um das Profil zu aktualisieren
    public function aktualisieren($id, $vorname, $name, $geschlecht, $geburtstag, $strasse, $plz, $ort) {
		
        
		try
		{
			$db = $this->connection->verbinden();
			$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$sql = 'UPDATE kunde SET Vorname="'. $vorname . '",  Nachname="'. $name . '",  Geschlecht="'. $geschlecht . '",  Geburtsdatum="'. $geburtstag . '" where Kundennummer = ' . $id . ';';
			$stmt = $db->prepare($sql);
			$stmt->execute();
						
			//TODO wenn im erm adresse verbessert wurde
			$sql = 'INSERT INTO postleitzahl (PLZ, Ort) VALUES ('.$plz.', "'.$ort.'") ON DUPLICATE KEY UPDATE PLZ='.$plz.', Ort="'.$ort.'" ;';
			$stmt = $db->prepare($sql);
			$stmt->execute();
			
			$sql = 'UPDATE adresse SET Straße="'.$strasse.'", Postleitzahl_PLZ="'.$plz.'" where Kunde_Kundennummer = '.$id.';';
			$stmt = $db->prepare($sql);
			$stmt->execute();
		 
			$this->connection->schließen();
		}
		catch(PDOException $e)
		{
			print '<pre>'.$e.'</pre>';
		}
    }

}

?>