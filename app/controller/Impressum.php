<?php


class Impressum extends Controller{
    
    public function index($name =''){
        $user = $this->model('User');
        $user->name = $name;
       //home index view
        $this->view('Header',['name'=> $user->name]);
        $this->view('Impressum/Impressummain',['name'=> $user->name]);
        $this->view('Footer',['name'=> $user->name]);
    }
}


