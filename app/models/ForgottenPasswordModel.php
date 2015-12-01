<?php

/*
 <!-- --Sprint 3, Gruppe 4 Onlineshop, 
Verfasser: Hanim Yerlikaya, Datum: 24.11.2015
UserStory: Passwortzurücksetzung mit automatischen Email-Versand programmieren
Task: 200-1 (#10321) Passwort zurück setzen
Aufwand: 5 Stunden
Beschreibung: Der User kann ein einen neuen Passwort beantragen.   

Mysql-Connection benutzt von Kerstin Gräter  -->
 */
class ForgottenPasswordModel
{
    protected $connection;

    public function __construct() {
        $this->connection = new Connect_Mysql();
    }
    
    public function savePassword($email, $password)
    {
        $password = hash('md5', $password);
        
        $db = $this->connection->verbinden();
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = 'UPDATE EMail SET Passwort=:password where email = :email;';
	$stmt = $db->prepare($sql);
	$stmt->execute(array('email' => $email, 'password' => $password));
        
        $this->connection->schließen();
    }
}
