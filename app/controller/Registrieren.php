<?php


class Registrieren extends Controller{
    
    public function index($name =''){
        $user = $this->model('Registrieren');
        $user->name = $name;
       //home index view
        $this->view('Header',['name'=> $user->name]);
        $this->view('Registrieren/Registrieren',['name'=> $user->name]);
        $this->view('Footer',['name'=> $user->name]);
    }
}
