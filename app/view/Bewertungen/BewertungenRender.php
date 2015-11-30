<?php

//Sprint 3, Gruppe 4 Onlineshop, 
//Verfasser: Christian Frindt, Datum: 19.11.2015 Version 1.1
//UserStory:Als Kunde möchte ich Rezensionen zu gekauften Produkten schreiben und lesen können
//Task: View zur Rezensionsausgabe
//Aufwand: 4 Stunden
//Beschreibung: ermöglicht eine personalisierte übersicht der rezenssionen zu einem bestimmten artikel... mit login check

   
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        
        <title></title>
        <link href="../../public/css/StyleBewertung.css" type="text/css" rel="stylesheet">
        
    </head>
    <body>
        <div id="headerRez">
                <!-- artikel wird geplotet -->
                
                <h1> Rezensionen zum Artikel <?php echo $data[0]['name'] ?></h1>
                <!--prüfen ob usereingeloggt, wenn ja, personalisierte meldung, wenn nein > allgemeine ausgabe -->
                <?php if(isset($_SESSION['logged'])){

                        if($_SESSION['logged'] == true){
                         //Controller instanz zum abrufen der userinfos aus dem model   
                        require_once '../app/controller/LoginController.php';
                            $conLog = new LoginController();
                            $name = $conLog->gebeUser();
                            ?><h2><?php echo $name['vorname']?> <?php echo $name['nachname'] ?>, deine Meinung ist uns wichtig!</h2>
                  <?php }
                      }else{ ?>
                            <h2>Deine Meinung ist uns wichtig!</h2>
                <?php } ?>

                </br>
        </div>
        <div id="REZ">
        <hr>
        <!--Auslesen der relevanten werte bezüglich der Rezension -->
        <?php $loop =0;
        foreach($data as $rez){?>
        
            <h3>Rezension <?php echo $loop+1 ?> von <?php echo count($data)?>: </h3>
            
            <h4>Verfasser: <?php echo $rez['vorname'] ?>, 
                           <?php echo $rez['nachname'] ?></h4>
            
            <?php echo $rez['beschreibung'];
            $loop++;?>
            </br>
            </br>
            <hr>
        </div>
            <!--Falls <nutzer eingeloggt, möglichkeit eine rezension zu erstellen, ansonsten auf login oder registrierungen verweisen -->
  <?php } if(isset($_SESSION['logged'])){
     
            if( $_SESSION['logged']['id'] != NULL){ ?>
                
                <a href="https://localhost/wfprj2015/public/BewertungController/bewertungErstellen/<?php echo $_SESSION['logged']['id']?>/<?php echo $data[0]['name'] ?>/<?php echo $data[0]['Produktnummer'] ?>">Eigene Bewertung erstellen</a>
      <?php }
          }else {  ?>
            Bitte <a href="https://localhost/wfprj2015/public/LoginController/rufView">einloggen</a> 
            oder <a href="https://localhost/wfprj2015/public/>Registrieren_Controller/index.php">registrieren</a> um Rezension zu erfassen!
     <?php  } ?>
            
    </body>
</html>