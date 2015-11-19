<html>
    <head>
        <title> Produkt anlegen </title>
        <!--Sprint 2, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 02.11.2015 Version 1
        UserStory: Als Programmierer möchte ich meinen Code als Model-View-Controller (MVC) haben.
        Task: 140-2 (#10190) Eigenen Code an MVC anpassen
        Aufwand: 0,5 Stunden
        Beschreibung: Es wird ein View des Produkts erstellt.     -->
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Produkt anlegen</h1>

        <p>Anmerkungen: <br>
            1. Um einen Artikel löschen oder aktualisieren zu können, benötigen Sie die dazugehörige Produktnummer.<br>
            2. Bei der Aktualisierung dürfen nur die Felder ausgefüllt sein, die zu ändern sind.<br>
        </p>

        <a id='handle' href="../controller/produktcontroller.php?herstelleranzeigen">Produkte anzeigen</a><br /><br />

        <!--Formular, um Produkte Verwalten zu können-->
        <form action="produktcontroller.php" method="POST"> 
            Name: <input type="text" name="name" placeholder="Pflichtfeld"> <br>
            Hersteller: <input type="text" name="hersteller" placeholder="Pflichtfeld"> <br>
            Preis: <input type="text" name="preis" placeholder="Pflichtfeld"> <br>
            reduzierter Preis: <input type="text" name="neuPreis" placeholder="für aktualisieren">
            Kategorie: <input type="text" name="kategorie" placeholder="Pflichtfeld"><br>
            Produktnummer: <input type="number" name="nummer" placeholder="für aktualisieren / löschen"><br><br>
            <input type="submit" name="anlegen" value="Anlegen">
            <input type="submit" name="loeschen" value="Löschen">
            <input type="submit" name="aktualisieren" value="Aktualisieren">
            <input type="submit" name="bild" value="Bild hinzufügen">
        </form>

    </body>
</html>