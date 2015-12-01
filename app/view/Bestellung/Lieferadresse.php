<!--//Sprint 3, Gruppe 4 Onlineshop, Verfasser: Kerstin Gräter, Datum: 23.11.2015 Version 2
//UserStory: Als Kunde möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
//Task: (270-2) #10330 Zusammenführen
//Aufwand: 7 Stunden

//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Kerstin Gräter, Datum: 09.11.2015 Version 1
//UserStory: Als Programmierer möchte ich den Aufbau als Model-View-Controller (MVC) haben.
//Task: 110-2 (#10190) MVC Programmieren
//Aufwand: 5 Stunden
//Beschreibung: Es wird der grundlegende Aufbau der Bestellabwicklung als MVC erstellt.
// Hier wird das Model dazu erstellt

//Sprint 1: Bestellabwicklung -->

<div>
    <h2>Ihre Lieferadresse: </h2>
    Geben Sie Ihre Lieferadresse ein, falls diese von Ihrer oben genannten Rechnungsadresse abweicht:

    <form action="Bestellungcontroller.php" method="post">
        Vorname <input type="text" name="vorname"><br>
        Nachname <input type="text" name="nachname"><br>
        Straße <input type="text" name="straße"><br>
        PLZ <input type="text" name="plz"><br>
        Ort <input type="text" name="ort"><br>

        <input type="button" name="speichern" value="Speichern">

        <br><br><br>
    </form>

    <form action="../BestellungAbschliesenCon" method="post">    
        <input type="button" name="los" value="Bestellung abschließen">
    </form>
</div>
</main>