<!--//Sprint 3, Gruppe 4 Onlineshop, Verfasser: Kerstin Gräter, Datum: 23.11.2015 Version 2
//UserStory: Als Kunde möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
//Task: (270-2) #10330 Zusammenführen
//Aufwand: 7 Stunden

//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Kerstin Gräter, Datum: 09.11.2015 Version 1
//UserStory: Als Programmierer möchte ich den Aufbau als Model-View-Controller (MVC) haben.
//Task: 110-2 (#10190) MVC Programmieren
//Aufwand: 5 Stunden
//Beschreibung: Es wird der grundlegende Aufbau der Bestellabwicklung als MVC erstellt.
// Hier wird das Model dazu erstellt

//Sprint 1: Bestellabwicklung -->

<?php


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
