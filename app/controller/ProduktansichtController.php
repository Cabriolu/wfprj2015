<?php

//Sprint 3, Gruppe 4 Onlineshop, 
//Verfasser: Marcel Riedl, Datum: 19.11.2015 Version 1
//UserStory: 270 Als Programmierer möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
//Task: 270-1 (#10329) Zusammenführen
//Aufwand: 2 Stunden
//Beschreibung: Es wird der Controller des Produkts im Frontend erstellt. 
// von Kerstin Gräter
require_once '../app/config/Connect_Mysql.php';

class ProduktansichtController extends Controller {

    function index($produktnummer) {
        $produktliste = $this->model('Produkt_Model');
        $rezen = '';
        //home index view
        $this->view('Header', ['view' => $produktliste->egal]);
        $this->view('Produkt/Produktansicht', ['data' => $produktliste->produktansicht($produktnummer)]);
        $this->view('Footer', ['view' => $produktliste->egal]);
        
    }

}
