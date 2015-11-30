<?php

class WarenkorbAnzeigen extends Controller{
    
    private $name = 'WarenkorbRender';
    
    public function anzeigen(){
        echo 'hahahahahaha';
        $this->view('Header');
        $this->view('Warenkorb/WarenkorbRender');
        $this->view('Footer');
    }
    
    
}
