<!--Sprint 2, Gruppe 4 Onlineshop, Verfasser: Hanim Yerlikaya, Datum: 05.11.2015
UserStory: Als Kunde mÃ¶chte ich mein Profil verwalten.
Task: 160-1 (#10195) Eigenen Code an MVC anpassen
Aufwand: 10 Stunden
Beschreibung: Der Kunde kann somit sein Profil bearbeiten und lÃ¶schen     -->


<?php
include_once '../config/Connect_Mysql.php';

class Profil_Model {

/*
	protected $id;
	protected $vorname
    protected $name;
	protected $geschlecht;
	protected $geburtstag
    protected $strasse;
    protected $plz;
	protected $ort;
	protected $tele;
*/
	protected $connection;

	public function __construct() {
		$this->connection = new Connect_Mysql();
	}

    // function das Profil anzeigen zu können
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
				$this->connection->schliessen();
				return $row;
			}
			else
			{
				$this->connection->schliessen();
				return null;
			}
		}
		catch(PDOException $e)
		{
			print '<pre>'.$e.'</pre>';
		}
    }

    // function um ein Profil löschen zu können
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
		 
			$this->connection->schliessen();
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
			
			$sql = 'UPDATE adresse SET StraÃŸe="'.$strasse.'", Postleitzahl_PLZ="'.$plz.'" where Kunde_Kundennummer = '.$id.';';
			$stmt = $db->prepare($sql);
			$stmt->execute();
		 
			$this->connection->schliessen();
		}
		catch(PDOException $e)
		{
			print '<pre>'.$e.'</pre>';
		}
    }

}

?>