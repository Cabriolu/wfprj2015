<!--
Sprint 3, Gruppe 4 Onlineshop, Verfasser: Kerstin Gräter, Datum: 19.11.2015 Version 1
UserStory: Als Kunde möchte ich eine Größentabelle sehen können, um einschätzen zu können, ob ein Produkt passt.
Task: 220-1 (#10328) Größentabelle implementieren
Aufwand:  Stunden
Beschreibung: Größentabelle für Damen
Hier wird der Controller dazu erstellt
Liegt vorrübergehen auf Herren -> Sale -> Berichte
-->

<?php


class GTDcontroller extends Controller{
    
    public function index($name =''){
        $user = $this->model('User');
        $user->name = $name;
       //home index view
        $this->view('Header',['name'=> $user->name]);
        $this->view('Produkt/GroessentabelleDamen',['name'=> $user->name]);
        $this->view('Footer',['name'=> $user->name]);
    }
}

