<?php

//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 02.11.2015 Version 1
//UserStory: Als Programmierer möchte ich meinen Code als Model-View-Controller (MVC) haben.
//Task: 140-2 (#10190) Eigenen Code an MVC anpassen
//Aufwand: 3 Stunden
//Beschreibung: Es wird der Controller des Produkts im Frontend erstellt. 

require_once '../model/Produkt_Model.php';

class Produktfrontcontroller {

    function __construct() {
        
        $url = $_SERVER['REQUEST_URI'];
        $ur = explode('?', $url);
        $u = $ur[1];
        $hatschi = explode('&', $u);
        $handle = $hatschi[0];
        switch ($handle) {
            case 'liste':
                $this->liste();
                break;
            case 'ansicht':
                $this->ansicht();
                break;
            default :
                break;
        }
    }

    // function um die Produktliste anzuzueigen
    function liste() {
        require '../view/Produkt/Produktliste.php';
        $produkt = new Produkt_Model();
        $produkt->produktliste();
    }

    // function um die Produktansicht anzuzeigen
    function ansicht() {
        $produkt = new Produkt_Model();
        $url = $_SERVER['REQUEST_URI'];
        $ur = explode('=', $url);
        $handle = $ur[1];
        require '../view/Produkt/Produktansicht.php';
        $produkt->produktansicht($handle);
    }

}

$produkt = new Produktfrontcontroller();
