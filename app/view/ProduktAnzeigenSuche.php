<!--//Sprint 3, Gruppe 4 Onlineshop, Verfasser: Denis Kevljanin, Datum: 22.11.2015
//UserStory: 190 Als Kunde möchte ich eine Filter- und Suchfunktion einsetzen können
//Task: 190-2 Suchfunktion programmieren
//Aufwand: 15 Stunden
//Beschreibung: View zur Ausgabe der gesuchten Produkte-->

Produkte der Suche anzeigen <br />
<!--
Erstellen einer Tabelle-->
<table> <tr> <td> Name&nbsp; </td> <td> Hersteller&nbsp; </td> <td> Preis </td> </tr>

    <?php
        //Schleife zur Ausgabe des resultSet-arrays
        $total = sizeof($data);
        $a = 0;
        
        while ($a < $total) {
            echo '<tr><td>' . $data[$a]['Name'] . '</td><td>' . $data[$a]['Hersteller'] . '</td><td>'
            . $data[$a]['Preis'] . '</td></tr>';
            $a++;
    }
    ?>
</table>
    