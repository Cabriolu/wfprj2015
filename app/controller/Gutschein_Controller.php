<!-- Ridvan Atacan, 3113837
   24.11.2015 Group #4 Onlineshop
   Sprint 3, Task : 280-1 #10460
   User Story: Als Kunde möchte ich von Rabattaktionen durch Gutschein-Codes profitieren können.
   Task: Gutscheincodes einlesen und überprüfen
   Aufwand: 6 Stunden
-->
<?php

//require '../models/Gutschein_Model.php';
class Gutschein_Controller extends Controller {

    private $code;
    private $a;

    public function index() {

        $this->view('Header', []);

        $this->view('Bestellung/Gutschein_View');

        //Abfrage ob die Code Variable übermittelt wurde und nicht leer ist
        if (isset($_POST["code"]) && !empty($_POST["code"])) {
            
            $this->code = $_POST['code'];
            $gutschein = $this->model('Gutschein_Model');
            //Den Code aus der POST variable mit der Datenbank abgleichen
            $this->a = $gutschein->prüfen($this->code);
            //$this->view('Bestellung/GutscheinErgebnis_View',$this->a);   
        } else {
            echo "10-stelliger Code <br>";
        }
        $this->view('Footer', []);
    }

    public function testen() {

        $gutsch = new Gutschein_Model();
        $gutsch->prüfen($this->code);
    }

}

$obj = new Gutschein_Controller();
