<?php


class Impressum extends Controller{
    
    public function index($name =''){
      
       //home index view
        $this->view('Header',[]);
        $this->view('Impressum/Impressummain',[]);
        $this->view('Footer',[]);
    }
}


