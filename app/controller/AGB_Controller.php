<!-- Renato Cabriolu, 3112468
    23.11.2015 Group #4 Onlineshop
    Sprint 3, Task : 250-1
    User Story: Als Kunde möchte ich ein Impressum und die AGB Lesen könen:
    Task : Impressum und AGB anzeigen lassen
    Aufwand: 2 Stunden
 -->

<?php


class AGB_Controller extends Controller{
    
    public function index($name =''){
      
       //home index view
       
        $this->view('AGB/AGB_View',[]);
  
    }
}