<!--Sprint 2, Gruppe 4 Onlineshop, Verfasser: Hanim Yerlikaya, Datum: 05.11.2015
UserStory: Als Kunde möchte ich mein Profil verwalten.
Task: 160-1 (#10195) Eigenen Code an MVC anpassen
Aufwand: 10 Stunden
Beschreibung: Der Kunde kann somit sein Profil bearbeiten und löschen     -->


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
											where Kundennummer = '.$id.';';
			$stmt = $db->query($sql);
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			if($row = $stmt->fetch())
			{
				$this->connection->schließen();
				return $row;
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
                                $profil->name = $row['Nachname'];
                                $profil->vorname = $row['Vorname'];
                                $profil->email = $row['EMail_email'];
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