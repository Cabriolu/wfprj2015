<?php


class Home extends Controller{
    
    public function index(){
       //home index view
        $this->view('Header');
        $this->view('main');
        $this->view('Footer');
    }
}
