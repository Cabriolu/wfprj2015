<main>

    <?php
//Sprint 3, Gruppe 4 Onlineshop 
//Verfasser: Marcel Riedl, Datum: 14.11.2015 Version 1
//UserStory: #90 Als Kunde möchte ich eine einfache Navigation in Kategorien, so dass ich schnell mein Wunschprodukt finden kann.
//Task: #90-1 (10315) Kategorien auswählen und programmieren
//Aufwand: 2 Stunden
//Beschreibung: Es wird das Model für die Kategorien erstellt. 
    ?>


    <h2>Hier sehen Sie alle Kategorien</h2>

    <?php
    $total = sizeof($data);
    $a = 0;

    // Schreiben der Kategoruen mit Link
    while ($a < $total) {
        echo '<div><a href="../public/ProduktlisteController/' . $data[$a]['KatID'] . '">' . $data[$a]['Kategorie'] . '</a></div><br>';
        $a++;
    }
    ?>
</main>