<!--Sprint 3, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 19.11.2015 Version 2
UserStory: Als Kunde möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
Task: 170-1 (#10329) Zusammenführen
Aufwand: 2 Stunden
Beschreibung: Es wird ein View für ein bestimmtes Produkte aus einer Kategorie gezeigt  -->

<!--Sprint 2, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 02.11.2015 Version 1
UserStory: Als Programmierer möchte ich meinen Code als Model-View-Controller (MVC) haben.
Task: 140-2 (#10190) Eigenen Code an MVC anpassen
Aufwand: 0,5 Stunden
Beschreibung: Es wird ein View über ein bestimmtes Produkt erstellt.     -->

<!--Sprint 1, Gruppe 4 Onlineshop
Verfasser: Marcel Riedl Matrikelnummer: 3113845
UserStory: Als Kunde erwarte ich eine schnelle und einfache, sowie eine reibungslose Bestellabwicklung
Task: #10003 Produkte anlegen
Datum: 23.10.2015 Version 1
Zeitaufwand: 8 Stunden-->

<main><div class="col-xs-6 col-lg-4">
        <?php
        // Christian Frindt
        require_once '../app/lib/Warenkorb.php';
        $a = 0;
        $total = sizeof($data);

        // Anzeige des Produkts
        while ($a < $total) {
            if ($data['data']['SalePreis'] < $data['data']['Preis']) {
                $preis = $data['data']['SalePreis'];
            } else {
                $preis = $data['data']['Preis'];
            }

            echo '<div><h2>' . $data['data']['Name'] . '</h2>' . $data['data']['Hersteller'] . '<br>'
            . $preis . ' € <br>';
            echo 'Farbe:' . $data['data']['Farbe'] . ' <br>Größe: ' . $data['data']['Groeße'];
            $a++;
        }
        ?>
    </div>
    <!--    Von Christian Frindt-->
    <form method="post">
        <input type="hidden" name="add" value="<?php echo $id = $data['data']['Produktnummer'] ?>">
        <input type="submit" value="In den Warenkorb">
    </form>
    <?php
    echo $id;
    if (isset($_SESSION['warenkorb'])) {
        var_dump($_SESSION['warenkorb']);
    }
    ?>
    <!--    Christian Frindt Ende-->
    <form method="POST">
        <input type="submit" value="Sofortkaufen">
    </form>

    <!--  Von Kerstin Gräter -->
    <form action='../GTHcontroller' method="post">
        <input type="submit" value="Größentabelle" name="tabelle">
    </form>
    <!--  Kerstin Gräter Ende-->
</main> 