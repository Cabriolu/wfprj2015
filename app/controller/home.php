<?php


class Home extends Controller{
    
    public function index($name =''){
       //home index view
        $this->view('Header',[]);
        $this->view('main',[]);
        $this->view('Footer',[]);
    }
}
