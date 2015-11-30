<?php
//Sprint 3, Gruppe 4 Onlineshop, 
//Verfasser: Marcel Riedl, Datum: 19.11.2015 Version 1
//UserStory: 270 Als Programmierer möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
//Task: 270-1 (#10329) Zusammenführen
//Aufwand: 2 Stunden
//Beschreibung: Es wird der Controller der Rezensionssicht im Frontend erstellt. 
session_start();

class BewertungController extends Controller{
   
    private $id;
    private $produktName;
    private $idKunde;
    private $rezension;
    
    public function bewertungAnzeigen($idProdukt) {
        
        $this->id=$idProdukt;
        $bewertungModel = $this->model('BewertungZeigenModel');
        //$this->view('Header',[]);
        $this->view('Bewertungen/BewertungenRender',$bewertungModel->bewertungAnzeigen($this->id));
        //$this->view('Footer',[]);
    }
    
    public function bewertungErstellen($idKunde,$produktName,$id) {
        $this->id = $id;
        $this->idKunde = $idKunde;
        $this->produktName = $produktName;
        $this->view('Bewertungen/BewertungFormular');
        //var_dump($this->idKunde);var_dump($this->produktName);var_dump($this->id);
        if(isset($_POST['rezension'])){
            $this->rezension = $_POST['rezension'];
            $bewertungErstellen = $this->model('BewertungZeigenModel');
            $bewertungErstellen->bewertungErstellen($this->id,  $this->idKunde, $this->rezension);
            
        }
    }
    
}

?>
