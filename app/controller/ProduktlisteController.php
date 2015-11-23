<?php

//Sprint 3, Gruppe 4 Onlineshop, 
//Verfasser: Marcel Riedl, Datum: 19.11.2015 Version 1
//UserStory: 270 Als Programmierer möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
//Task: 270-1 (#10329) Zusammenführen
//Aufwand: 3 Stunden
//Beschreibung: Es wird der Controller des Produkts im Frontend erstellt. 
// von Kerstin Gräter
require_once '../app/config/Connect_Mysql.php';

class ProduktlisteController extends Controller {

    function index($kategorie) {
        $produktliste = $this->model('Produkt_Model');
        $produktliste->egal = '';
        //home index view
        $this->view('Header', ['view' => $produktliste->egal]);
        $this->view('Produkt/Produktliste', ['view' => $produktliste->ansicht($kategorie)]);
        $this->view('Footer', ['view' => $produktliste->egal]);
    }

}
