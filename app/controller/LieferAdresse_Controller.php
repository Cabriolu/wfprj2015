
<?php
require '../model/LieferAdresse_Model.php';
class LieferAdresse_Controller{

    
    public function __construct(){
        
        $this->hinzufügen();
    }
    
    public function hinzufügen(){
       
        $liefer = new LieferAdresse_Model();
        $liefer->hinzufügen("Hans","Fritz","Teststrasse",88348,00001);
    }

}

$obj = new LieferAdresse_Controller();