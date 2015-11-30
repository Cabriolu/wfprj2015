<?php

require_once '../app/config/Connect_Mysql.php';

class LoginController extends Controller {

    public function rufView(){
        $this->view('Header');
        $this->view('Login/LoginView');
        $this->view('Footer');
    }


    public function login(){
   
        if(isset($_POST['mail']) && isset($_POST['pw'])){
            
            $emailAdresse = $_POST['mail'];
            $pw = $_POST['pw'];
            $LogModel = $this->model('LoginModel');
            $check = $LogModel->login($emailAdresse,$pw);
            
            if($check == true AND isset($_SESSION['logged'])){
                if($_SESSION['logged']['admin'] == true){
                    
                    require '../app/controller/backend.php';
                    $backend = new backend();
                    $backend->index();
                }else{
                    $this->view('Header');
                    $this->view('main');
                    $this->view('Footer');
                }
            }else{
                echo 'Bitte geben Sie Mail und Passwort ein!';
                $this->view('Header');
                $this->view('Login/LoginView');
                $this->view('Footer');
            }
            
        }
    }
    public function logout(){
        
        $loginModel = $this->model('Login/LoginModel');
        $check = $loginModel->logout();
        
        if($check){
            $this->view('Header');
            $this->view('main');
            $this->view('Footer');
        
        }
    }
    

}

?>