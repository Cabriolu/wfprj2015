<?php


class backend extends Controller{
    
    public function index($name =''){
       //home index view
        $this->view('Backend/Backendheader',['name'=> $user->name]);
        $this->view('Backend/Backendmain',['name'=> $user->name]);
        
    }
}


