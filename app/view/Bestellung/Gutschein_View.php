<!-- Ridvan Atacan, 3113837
   24.11.2015 Group #4 Onlineshop
   Sprint 3, Task : 280-1 #10460
   User Story: Als Kunde möchte ich von Rabattaktionen durch Gutschein-Codes profitieren können.
   Task: Gutscheincodes einlesen und überprüfen
   Aufwand: 6 Stunden
-->
<!-- Einlesen des eingegebenen Codes und Übergabe per POST Variable an den Controller -->
<main>
    <form action ='/wfprj2015/public/Gutschein_Controller' method = 'post'>

        <label for="code"> Gutscheincode: </label><br>
        <input type ="text" name ="code"><br>

        <input type ="submit" value ="Bestätigen">

    </form>
