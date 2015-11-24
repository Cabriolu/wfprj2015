<?php

require_once '../app/config/Connect_Mysql.php';

class LoginController extends Controller {

    public function rufView(){
        $this->view('LoginView');
    }


    public function login(){
   
        if(isset($_POST['mail']) && isset($_POST['pw'])){
            
            $emailAdresse = $_POST['mail'];
            $pw = $_POST['pw'];
            $LogModel = $this->model('LoginModel');
            $check = $LogModel->login($emailAdresse,$pw);
            
            if($check){
                $this->view('main');
            }else{
                echo 'Bitte geben Sie Mail und Passwort ein!';
                $this->view('LoginView');
            }
            
        }
    }
    public function logout(){
        
        $loginModel = $this->model('LoginModel');
        $check = $loginModel->logout();
        
        if($check){
            
            $this->view('main');
        
        }
    }
    

}

?>