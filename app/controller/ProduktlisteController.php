<?php

//Sprint 3, Gruppe 4 Onlineshop, 
//Verfasser: Marcel Riedl, Datum: 19.11.2015 Version 1
//UserStory: Als Programmierer m
//Task:  (#) Zusammenführen
//Aufwand:  Stunden
//Beschreibung: Es wird der Controller des Produkts im Frontend erstellt. 
// von Kerstin Gräter
require_once '../app/config/Connect_Mysql.php';

class ProduktlisteController extends Controller {

    function index($kategorie) {
        $produktliste = $this->model('Produkt_Model');
        $produktliste->egal = '';
        //home index view
        $this->view('Header', ['view' => $produktliste->egal]);
        $this->view('Produkt/Produktansicht', ['view' => $produktliste->ansicht($kategorie)]);
        $this->view('Footer', ['view' => $produktliste->egal]);
    }

}
