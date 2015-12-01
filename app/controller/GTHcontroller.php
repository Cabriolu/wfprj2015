<!--
Sprint 3, Gruppe 4 Onlineshop, Verfasser: Kerstin Gräter, Datum: 19.11.2015 Version 1
UserStory: Als Kunde möchte ich eine Größentabelle sehen können, um einschätzen zu können, ob ein Produkt passt.
Task: 220-1 (#10328) Größentabelle implementieren
Aufwand:  11 Stunden
Beschreibung: Größentabelle für Herren
Hier wird der Controller dazu erstellt

-->

<?php

class GTHcontroller extends Controller {

    public function index() {

        //home index view
//       if (isset($_POST['tabelle'])) {
        $this->view('Header');
        $this->view('Produkt/GroessentabelleHerren');
        $this->view('Footer');
//       }
    }

}
