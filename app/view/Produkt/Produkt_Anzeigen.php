<!-- Sprint 3, Gruppe 4 Onlineshop, Verfasser Marcel Riedl, Datum: 23.11.2015 Version 2
UserStory: 270 Als Kunde möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
Task: 270-1 (#10329) Zusammenführen
Auswand: 2 Stunden
Beschreibung: Er wird hier eine Liste aller verfügbarer Produkte angezeigt, um dann eines Löschen zu können
-->

<main>
    <br>
    <h2>Produkte löschen</h2>
    <div>
        
        <table>
            <tr><td>Produktnummer</td><td>Name</td><td>Farbe</td><td>Größe</td><td>Hersteller</td><td>Preis</td><td>Kategorie</td><td>Oberkategorie</td></tr>
        <?php
        $a = 0;
$total = sizeof($data);

while ($a < $total) {
    echo '<tr><td>'.$data[$a]['Produktnummer']
            .'</td><td>'. $data[$a]['Name'] 
            . '</td><td>'.$data[$a]['Farbe']
            . '</td><td>'.$data[$a]['Groeße']
            . '</td><td>'.$data[$a]['Hersteller']
            . '</td><td>'.$data[$a]['Preis']
            . '</td><td>'.$data[$a]['Kategorie']
            .'</td><td>'.$data[$a]['oberkat'].'</td></tr>';
    
    $a++;
}
        ?>
 </table>       
    </div>
    <div>
        <br>
        Geben Sie hier die Produktnummer des zu löschenden Produkts ein:
    <form method="post">
        Produktnummer: <input type="number" name="produktnr"><br>
        <input type="submit" name="loeschen" value="Produkt löschen">
    </form>
    </div>
</main>

<!--Sprint 2, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 02.11.2015 Version 1
UserStory: Als Programmierer möchte ich meinen Code als Model-View-Controller (MVC) haben.
Task: 110-2 (#10190) Eigenen Code an MVC anpassen
Aufwand: 0,5 Stunden
Beschreibung: Es wird ein View aller Produkte eines einzelnen Herstellers erstellt.     

Produkte anzeigen <br />
Anmerkungen: Notieren Sie sich die richtige Produktnummer
<table> <tr> <td> Produktnummer </td> <td> Produktname </td> </tr>
-->