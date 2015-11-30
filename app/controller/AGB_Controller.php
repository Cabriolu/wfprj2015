<?php


class AGB_Controller extends Controller{
    
    public function index($name =''){
      
       //home index view
       
        $this->view('AGB/AGB_View',[]);
  
    }
}