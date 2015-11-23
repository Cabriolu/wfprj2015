<!--Sprint 3, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 19.11.2015 Version 2
UserStory: Als Kunde möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
Task: 170-1 (#10329) Zusammenführen
Aufwand: 2 Stunden
Beschreibung: Es wird ein View für alle Produkte aus einer Kategorie gezeigt  -->

<!--//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 02.11.2015 Version 1
//UserStory: Als Programmierer möchte ich meinen Code als Model-View-Controller (MVC) haben.
//Task: 140-2 (#10200) Eigenen Code an MVC anpassen
//Aufwand: 0,5 Stunden
//Beschreibung: Es wird der View der Produktliste erstellt. -->


<?php
$a = 0;
$total = sizeof($data);

while ($a < $total) {
    if ($data[$a]['SalePreis'] < $data[$a]['Preis']) {
        $preis = $data[$a]['SalePreis'];
    } else {
        $preis = $data[$a]['Preis'];
    }
    echo '<dir class="col-xs-6 col-lg-4"><h2><a href = "../ProduktansichtController/'
    . $data[$a]['Produktnummer'] . '">' . $data[$a]['Name'] . '</a></h2>';
    echo 'Preis: ' . $preis;
    echo 'Hersteller: ' . $data[$a]['Hersteller'] . '</dir>';
    echo 'Farbe: ' . $data[$a]['Farbe'];
    echo 'Größe: ' . $data[$a]['Groeße'];
    $a++;
}
?>
