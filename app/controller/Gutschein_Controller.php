<?php

class Gutschein_Controller{
    
    private $code;
    
   public function __construct(){
       
        
        $this->code = $_POST['code'];
       
           $this->testen();
    }
    
   public function testen(){
        
        if($this->code == 12345){
            
            echo("Der Code ist richtig");
        }else{
            
            echo("Gutscheincode ungültig!");
        }
    }
}
$obj = new Gutschein_Controller();