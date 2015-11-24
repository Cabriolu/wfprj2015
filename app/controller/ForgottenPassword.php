<?php

/* --Sprint 3, Gruppe 4 Onlineshop, 
Verfasser: Hanim Yerlikaya, Datum: 24.11.2015
UserStory: Als Kunde möchte ich mein Profil verwalten.
Task: 160-1 (#10195) Eigenen Code an MVC anpassen
Aufwand: 5 Stunden
Beschreibung: Der User kann ein einen neuen Passwort beantragen.     */
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
            
            require_once '../app/PHPMailer/class.phpmailer.php';
            $phpmailer = new PHPMailer();
            $phpmailer->addAddress($profil->email);
            $phpmailer->textLine('Hello '.$profil->vorname.' '.$profil->name);
            $phpmailer->textLine('Here is your new Password: '.$password);
            $phpmailer->send();
            
            $this->model('ForgottenPasswordModel')->savePassword($email, $password);
            
            $this->success($email);
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
}

$controller = new ForgottenPassword();
