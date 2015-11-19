<!--
Sprint 2, Gruppe 4 Onlineshop, Verfasser: Kerstin Gräter, Datum: 09.11.2015 Version 1
UserStory: Als Programmierer möchte ich den Aufbau als Model-View-Controller (MVC) haben.
Task: 110-2 (#10190) MVC Programmieren
Aufwand: 5 Stunden
Beschreibung: Es wird der grundlegende Aufbau der Bestellabwicklung als MVC erstellt.
Hier wird ein View dazu erstellt-->

<h2>Ihre Lieferadresse: </h2>
Geben Sie Ihre Lieferadresse ein:

<form action="Bestellungcontroller.php" method="post">
    Straße <input type="text" name="straße"><br>
    PLZ <input type="text" name="plz"><br>
    Ort <input type="text" name="ort"><br>

    <input type="button" name="speichern" value="Speichern">

    <br><br><br>
    <input type="button" name="los" value="Bestellung abschließen">
</form>