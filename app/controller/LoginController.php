<?php
//Sprint 3, Gruppe 4 Onlineshop, 
//Verfasser: Christian Frindt, Datum: 19.11.2015 Version 1
//UserStory: 270 Als Programmierer möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
//Task: 270-1 (#10329) Zusammenführen
//Aufwand: 3 Stunden
//Beschreibung: Es wird der Controller des Logins im Frontend erstellt. 


require_once '../app/config/Connect_Mysql.php';
require_once '../app/controller/backend.php';
session_start();
class LoginController extends Controller {

    public function rufView(){
        $this->view('Login/LoginView');
    }


    public function login(){
   
        if(isset($_POST['mail']) && isset($_POST['pw'])){
            
            $emailAdresse = $_POST['mail'];
            $pw = $_POST['pw'];
            $LogModel = $this->model('LoginModel');
            $check = $LogModel->login($emailAdresse,$pw);
            
            if($check && isset($_SESSION['logged'])){
                if($_SESSION['logged']['admin'] == true){
                   $b = new backend();
                   $b->index();
                }else{
                    $this->view('main');
                }
            }else{
                echo 'Bitte geben Sie Mail und Passwort ein!';
                $this->view('Login/LoginView');
            }
            
        }
    }
    public function logout(){
        
        $loginModel = $this->model('Login/LoginModel');
        $check = $loginModel->logout();
        
        if($check){
            
            $this->view('main');
        
        }
    }
    
    public function gebeUser() {
        
        require_once '../app/models/LoginModel.php';
        $model = new LoginModel();
        return $model->getUser();
    }
    

}

?>