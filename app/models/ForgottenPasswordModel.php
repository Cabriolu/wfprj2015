<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ForgottenPasswordModel
 *
 * @author Yerlikaya
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
