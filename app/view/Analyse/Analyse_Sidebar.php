
<!--Sprint 4, Gruppe 4 Onlineshop, Datum: 01.12.2015, Version 1
Verfasser: Kerstin Gräter, Matrikelnummer: 3113720
UserStory: #320 Als Admin möchte ich verschiedene AnalyseFuntionen im backend haben
Task: 320-3 (#10505) Daten in einem View aufbereiten
Zeitaufwand:
Beschreibung: Hier wird die Sidebar für das Backend erstellt-->

<main>
    <!-- Section #3 -->
    <section id="about" data-speed="2" data-type="background">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <form method="post">
                            Produktnummer: <input type="text" name="produktnummer">
                        </form>
                        <li class="active"><a href="#">Bestellungen</a></li>
                        <li><a href="#">Durchschnittsbestellpreis</a></li>
                        <li><a href="#"> Umsatz aus allen Bestellungen </a></li>
                        <li><a href="#"> ?? </a></li>
                    </ul>
                    <ul class="nav nav-sidebar">                        
                        <form method="post">
                            Produktnummer: <input type="text" name="produktnummer">
                        </form>
                        <li class="active"><a href="#">Produkte</a></li>
                        <li><a href="#">Rezensionen pro Produkt</a></li>
                        <li><a href="#">Umsatz pro Produkt</a></li>
                        <li><a href="#">Bestellungen pro Produkt</a></li>
                        <li><a href="#">Produkte pro Kategorie</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">                        
                        <form method="post">
                            Kategorienummer: <input type="text" name="KatID">
                        </form>
                        <li class="active"><a href="#">Kategorie</a></li>
                        <li><a href="#">Produkte pro Kategorie</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <form>
                            Kundennummer: <input type="text" name="kundennummer">
                        </form>
                        <li class="active"><a href="#">Kunden</a></li>
                        <li><a href="#">Anzahl der Kunden</a></li>
                        <li><a href="#">Bestellungen pro Kunde</a></li>
                        <li><a href="#">Umsatz pro Kunde</a></li>
                    </ul>
                </div>
            </div><!--/.col-xs-12.col-sm-9-->
        </div>
