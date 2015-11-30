<?php

class Test extends Controller{
    
    public function index($name =''){
        $user = $this->model('User');
        $user->name = $name;
       //home index view
        $this->view('Header',['name'=> $user->name]);
        $this->view('Login/LoginView',['name'=> $user->name]);
        $this->view('Footer',['name'=> $user->name]);
    }
}

