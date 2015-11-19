<?php

class WarenkorbAnzeigen extends Controller{
    
    private $name = 'WarenkorbRender';
    
    public function anzeigen(){
        echo 'hahahahahaha';
        $this->view($this->name);
        
    }
    
    
}
