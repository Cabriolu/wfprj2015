<?php

/* <!-- --Sprint 3, Gruppe 4 Onlineshop, 
Verfasser: Hanim Yerlikaya, Datum: 24.11.2015
UserStory: Passwortzurücksetzung mit automatischen Email-Versand programmieren
Task: 200-1 (#10321) Passwort zurück setzen
Aufwand: 5 Stunden
Beschreibung: Der User kann ein einen neuen Passwort beantragen.   

Mysql-Connection benutzt von Kerstin Gräter  --> */

class ForgottenPassword extends Controller
{
    public function index()
    {
        $this->view('Header',[]);
        $this->view('ForgottenPassword/ForgottenPassword',[]);
        $this->view('Footer',[]);
    }
    
    private function generatePassword()
    {
        $passwordChars = '-_?!ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $tmp = '';
        for($i = 0; $i < 12; ++$i)
        {
            $tmp .= $passwordChars[rand(0, strlen($passwordChars) - 1)];
        }
        return $tmp;
    }
    
    public function validate()
    {
        $email = $_POST['email'];
        $profil = $this->model('Profil_Model');
        $profil = $profil->findByEmail($email);
        if($profil)
        {
            $password = $this->generatePassword();
            
            $mailOk = $this->mail($profil->email, $profil->vorname . " " . $profil->name, $profil->geschlecht, $password);
            
            if($mailOk)
            {
                $this->model('ForgottenPasswordModel')->savePassword($email, $password);

                $this->success($email);
            }
            else
            {
                $this->error($email);
            }
        }
        else
        {
            $this->failed($email);
        }
    }
    
    public function failed($email)
    {
        $this->view('Header',[]);
        $this->view('ForgottenPassword/Failed',$email);
        $this->view('Footer',[]);
    }
    
    public function success($email)
    {
        $this->view('Header',[]);
        $this->view('ForgottenPassword/Success',$email);
        $this->view('Footer',[]);
    }
    
    public function error($email)
    {
        $this->view('Header',[]);
        $this->view('ForgottenPassword/Error',$email);
        $this->view('Footer',[]);
    }
    
    private function mail($email, $name, $geschlecht, $password)
    {
        require_once '../app/PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        
        if ($geschlecht == 'w') {
            $anrede = ' geehrte Frau ';
        } else {
            $anrede = ' geehrter Herr ';
        }

        $mail->SMTPDebug = 0;
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
        $mail->addAddress($email, $name);
        $mail->addReplyTo('WIFShop@gmx.de', 'Kundendienst');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        //Betreff und Inhalt 
        $mail->Subject = 'Ihr neues Passwort';
        $mail->CharSet = 'utf-8';
        $mail->isHTML(false);
        $mail->Body = 'Sehr' . $anrede . $name . ",\nIhr neues Passwort lautet: " . $password;
        //Bestätigung über Versand bzw. ErrorInfo
        return $mail->send();
    }

}

$controller = new ForgottenPassword();
