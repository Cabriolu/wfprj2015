<?php

/*
  //Sprint 1, Gruppe 4 Onlineshop, Verfasser: Christian Frindt, Datum: 26.11.2015 Version 1.1
  //UserStory: Als Kunde möchte ich über einen Warenkorb, meine bereits gewählten Produkte übersichtlich angeordnet bekommen.
  //Task: Algorithmus zur behandlung der Session Var, übersichtliches rendern der Ergebnisse
  //Aufwand: 9 Stunden
  //Beschreibung: Diese Klasse sorgt dafür das Waren in den Korb fiktiv in einer Session Var, also
  // solange die Sitzung gültig ist, in einem Warenkorb abzulegen
 */

class Warenkorb {

    public function __construct() {
        $this->pruefeInAus();
    }

    public function pruefeInAus() {


        //Pruefe ob hinzufügen,einzel Löschen, oder gesamten Korb löschen
        if (isset($_POST["add"])) {
            $id = $_POST["add"];
            $this->inWarenkorb($id);
        } else if (isset($_POST["del"])) {
            $idDel = $_POST["del"];
            $this->ausWarenkorb($idDel);
        } else if (isset($_POST["delall"])) {

            $this->loescheWarenkorb();
        }
    }

    public function inWarenkorb($id) {

        $gefunden = false;
        $stelle = 0;
        //Prüf ob Session existiert
        if (!isset($_SESSION["warenkorb"])) {
            //wenn nicht, lege sessionvar mit benötigten attributen an
            $_SESSION['warenkorb'] = array(1 => array("produktNummer" => $id, "anzahl" => 1));
        } else {
            //falls bereits vorhanden, prüfe ob artikel bereits im warenkorb
            foreach ($_SESSION['warenkorb'] as $produkt) {
                $stelle++;
                while (list($key, $value) = each($produkt)) {
                    //falls bereits vorhanden
                    if ($key == "produktNummer" && $value == $id) {
                        $gefunden = true;
                        //erhöhe an existierendem Artikel das Attribut anzahl um eins
                        array_splice($_SESSION['warenkorb'], $stelle - 1, 1, array(array("produktNummer" => $id, "anzahl" => $produkt['anzahl'] + 1)));
                    }
                }
            }
            //falls nicht bereits vorhanden in korb, füge in session var artikel ein
            if ($gefunden == false) {
                array_push($_SESSION['warenkorb'], array("produktNummer" => $id, "anzahl" => 1));
            }
        }
    }

    public function ausWarenkorb($idDel) {

        $stelle = 0;
        //falls session vorhanden(sollte vorhanden sein, sonst in html kein löschen button zur verfügung)
        if (isset($_SESSION['warenkorb']) && count($_SESSION["warenkorb"]) > 0) {
            echo 'ende';
            //suche nach zu löschendem artikel 
            foreach ($_SESSION['warenkorb'] as $produkt) {
                $stelle++;
                while (list($key, $value) = each($produkt)) {
                    if ($key == "produktNummer" && $value == "$idDel") {
                        //falls die anzahl des artikels im wwarenkorb größer als 1
                        if ($produkt['anzahl'] > 1) {
                            //dekrementieren des attribut anzahl des artikels
                            array_splice($_SESSION['warenkorb'], $stelle - 1, 1, array(array("produktNummer" => $idDel, "anzahl" => $produkt['anzahl'] - 1)));
                        } else if ($produkt['anzahl'] == 1) {
                            //ansonsten lösche artikel aus warenkorb
                            array_splice($_SESSION['warenkorb'], $stelle - 1, 1);
                        }
                    }
                }
            }
        }
    }

    public function loescheWarenkorb() {
        //löschen der gesetzten Session wenn Warenkorb leeren gedrückt
        unset($_SESSION['warenkorb']);
    }

}

$korb = new Warenkorb();
?>

