<!--
Sprint 2, Gruppe 4 Onlineshop, Verfasser: Kerstin Gräter, Datum: 09.11.2015 Version 1
UserStory: Als Programmierer möchte ich den Aufbau als Model-View-Controller (MVC) haben.
Task: 110-2 (#10190) MVC Programmieren
Aufwand: 5 Stunden
Beschreibung: Es wird der grundlegende Aufbau der Bestellabwicklung als MVC erstellt.
Hier wird ein View dazu erstellt-->
<main>
    <div>
        <h2>Ihre Rechnungsadresse:</h2>
        <?php
        $total = sizeof($data);

        $a = 0;

// Ausgabe
        while ($a < $total) {
            echo $data[$a]['straße'] . ' <br>' . $data[$a]['plz'] . ' ' . $data[$a]['ort'];
            $a++;
        }
        ?>

    </div>