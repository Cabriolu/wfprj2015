<?php
//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Denis Kevljanin, Datum: 05.11.2015
//UserStory: Als Kunde möchte ich eine automatische Bestellbestätigung per Mail erhalten
//Task: 180-1 Automatischen E-Mailversand programmieren (#10196)
//Aufwand: 22 Stunden
//Beschreibung: Es wird eine automatich generierte Bestellbestätigung verschickt 

require ('../PHPMailer/PHPMailerAutoload.php');
require ('../model/userdata.php');
   
//Erstellen der Klasse Mail
class Mail{
  

public function mail() {


    //Objekte von Userdata und PHPMailer erstellen
    $data = new Userdata();
    $mail = new PHPMailer;
    //Variablen
    $bestellung = $data->getBestellung();
    $kundennummer = $data->getKundennummer();
    $vorname = $data->getVorname();
    $nachname = $data->getNachname();
    $empfänger = $data->getEmpfänger();
    //function um die Anrede Männlich/Weiblich zu definieren
    $geschlecht = $data->getGeschlecht();
        if ($geschlecht == 'w'){
            $anrede = ' geehrte Frau ';
        }
        else {
            $anrede = ' geehrter Herr ';
        }
    
    $mail->SMTPDebug = 2;
    //SMTP Versand definieren
    $mail->isSMTP();
    //Username, Passwort und Port deklarieren 
    $mail->Host = 'mail.gmx.net';
    $mail->SMTPAuth = true;
    $mail->Username = 'wifshop@gmx.de';
    $mail->Password = 'shop1234';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    //Absender/Empfänger und Reply definieren
    $mail->setFrom('WIFShop@gmx.de', 'WIFShop');
    $mail->addAddress($empfänger, $nachname);
    $mail->addReplyTo('WIFShop@gmx.de', 'Kundendienst');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    //Betreff und Inhalt 
    $mail->Subject = 'Ihre Bestellung Nr: - '.$bestellung;
    $mail->CharSet = 'utf-8';
    $mail->isHTML(true);
    $mail->Body    = '<img src="https://t1.ftcdn.net/jpg/00/46/79/64/500_F_46796494_T2nsU8rxP1NKLBb8a8Egy6TgZiMgf3lz.jpg" />
                      <br>
                      <h1><b>Vielen Dank für Ihre Bestellung bei WIFShop!</b></h1><br>
                      <hr><br>_<br>
                      Sehr'.$anrede.$vorname.' '.$nachname.',<br><br>
                      Wir haben Ihre Bestellung mit der Bestellnummer: '.$bestellung.' erhalten.
                      ';
    //Bestätigung über Versand bzw. ErrorInfo
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
    else {
		$data->closeDB();
        echo 'Message has been sent';
    }
}
}
$obj = new Mail();
