<?php

require '../app/models/Suche_Model.php';

class Suche_Controller extends Controller{

    public function __construct() {
        
    }
    public function index(){
        $suche = $this->model('Suche_Model');
        $row = $suche->suchabfrage();
        $this->view('ProduktAnzeigenSuche', $row);
    }
    
}

