<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BestellungAbschliesenCon extends Controller {

    function index() {

        $bestellung = $this->model('Bestellung_Model');
        // Ausführung sobald Button 'speichern' gedrückt wird
        if (isset($_POST['speichern'])) {
            $vorname = $_POST['vorname'];
            $nachname = $_POST['nachname'];
            $straße = $_POST['straße'];
            $plz = $_POST['plz'];
            $ort = $_POST['ort'];
            if ($vorname != null && $nachname != null && $straße != null && $plz != null && $ort != null){
            $bestellung->adresse($vorname, $nachname, $straße, $plz, $ort, $kundennummer);}
            else{
                echo 'Ihre Adresse hat einen Fehler!';
            }
        }
        // Ausführung sobald Button 'los' gedrückt wird
        if (isset($_POST['los'])) {
            $bool = $bestellung->bestellungabschließen();
            if ($bool == true){
                $this->view('Header');
                $this->view('Bestellung/Abgeschlossen');
                $this->view('Footer');
            }
        }
    }

}
