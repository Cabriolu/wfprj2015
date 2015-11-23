<!--Sprint 3, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 23.11.2015 Version 2
UserStory: 270 Als Kunde möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
Task: 270-1 (#10329) Zusammenführen
Aufwand: 0,5 Stunden
Beschreibung: Es wird der View zum Anlegen eines neuen Produkts erstellt.     -->


<!--Sprint 2, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 02.11.2015 Version 1
UserStory: Als Programmierer möchte ich meinen Code als Model-View-Controller (MVC) haben.
Task: 140-2 (#10190) Eigenen Code an MVC anpassen
Aufwand: 0,5 Stunden
Beschreibung: Es wird ein View des Produkts erstellt.     -->
<main>        
    <br>
    <h1>Produkt anlegen</h1>
    <!--
            <p>Anmerkungen: <br>
                1. Um einen Artikel löschen oder aktualisieren zu können, benötigen Sie die dazugehörige Produktnummer.<br>
                2. Bei der Aktualisierung dürfen nur die Felder ausgefüllt sein, die zu ändern sind.<br>
            </p>
    
            <a id='handle' href="../controller/produktcontroller.php">Produkte anzeigen</a><br /><br />
    -->
    <!--Formular, um Produkte Verwalten zu können-->
    <form action="produktcontroller.php" method="POST"> 
        Name: <input type="text" name="name" placeholder="Pflichtfeld"> <br>
        Hersteller: <input type="text" name="hersteller" placeholder="Pflichtfeld"> <br>
        Farbe: <input type="text" name="farbe" placeholder="Pflichtfeld"><br>
        Größe: <input type="text" name="groeße" placeholder="Pflichtfeld"><br>
        Preis: <input type="text" name="preis" placeholder="Pflichtfeld"> <br>
        Kategorie: <input type="number" name="kategorie" placeholder="Pflichtfeld"><br>
        <input type="submit" name="anlegen" value="Anlegen">

        <input type="submit" name="bild" value="Bild hinzufügen">
    </form>

</main>