<?php

// UPDATE AUF VERSION 2, 23.11.15
//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Kerstin Gräter, Datum: 09.11.2015 Version 1
//UserStory: Als Programmierer möchte ich den Aufbau als Model-View-Controller (MVC) haben.
//Task: 110-2 (#10190) MVC Programmieren
//Aufwand: 5 Stunden
//Beschreibung: Es wird der grundlegende Aufbau der Bestellabwicklung als MVC erstellt.
// Hier wird der Controller dazu erstellt

class Bestellungcontroller extends Controller {

    function index() {
        $bestellung = $this->model('Bestellung_Model');

        $kundennummer = $_SESSION['logged']['id'];

        $this->view('Header');
        $this->view('Bestellung/Rechnungsadresse', $bestellung->adresseanzeigen($kundennummer));
        $this->view('Bestellung/Lieferadresse');
        $this->view('Footer');
    }

}
