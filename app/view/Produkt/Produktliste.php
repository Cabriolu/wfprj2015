<!--Sprint 3, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 19.11.2015 Version 2
UserStory: Als Kunde möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
Task: 170-1 (#10329) Zusammenführen
Aufwand: 2 Stunden
Beschreibung: Es wird ein View für alle Produkte aus einer Kategorie gezeigt  -->

<!--//Sprint 2, Gruppe 4 Onlineshop, Verfasser: Marcel Riedl, Datum: 02.11.2015 Version 1
//UserStory: Als Programmierer möchte ich meinen Code als Model-View-Controller (MVC) haben.
//Task: 140-2 (#10200) Eigenen Code an MVC anpassen
//Aufwand: 0,5 Stunden
//Beschreibung: Es wird der View der Produktliste erstellt. -->

<!--Sprint 1, Gruppe 4 Onlineshop
Verfasser: Marcel Riedl Matrikelnummer: 3113845
UserStory: Als Kunde erwarte ich eine schnelle und einfache, sowie eine reibungslose Bestellabwicklung
Task: #10003 Produkte anlegen
Datum: 23.10.2015 Version 1
Zeitaufwand: 8 Stunden-->

<main>
    <!-- Section #3 -->
    <section id="about" data-speed="2" data-type="background">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="#">Überblick <span class="sr-only">(aktuell)</span></a></li>
                        <div>
                            <label for="range">Bereich</label>
                            <input type="range" name="range" id="range" min="0" max="10" step="2">
                        </div>
                        <li><a href="#">Berichte</a></li>
                        <li><a href="#">Analysen</a></li>
                        <li><a href="#">Exportieren</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <form action="wfprj2015/public/Filter_Controller" method="post">
                            <input type="checkbox" name="blau" value="blau"/>blau<br>
                            <input type="checkbox" name="rot" value="rot"/>rot<br>
                            <input type="checkbox" name="schwarz" value="schwarz"/>schwarz<br>
                            <input type="checkbox" name="beige" value="beige"/>beige<br>
                            <input type="submit" value="Filter"/>
                        </form>
                        <li><a href="">Noch ein Nav-Eintrag</a></li>
                        <li><a href="">Und noch einer</a></li>
                        <li><a href="">Anderer Nav-Eintrag</a></li>
                        <li><a href="">Mehr Navigation</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li><a href="">Noch ein Nav-Eintrag</a></li>
                        <li><a href="">Und noch einer</a></li>
                        <li><a href="">Anderer Nav-Eintrag</a></li>
                    </ul>
                </div>
                <?php
                $a = 0;
                $total = sizeof($data);

                while ($a < $total) {
                    if ($data[$a]['SalePreis'] < $data[$a]['Preis']) {
                        $preis = $data[$a]['SalePreis'];
                    } else {
                        $preis = $data[$a]['Preis'];
                    }
                    echo '<dir class="col-xs-6 col-lg-4"><h2><a href = "../ProduktansichtController/'
                    . $data[$a]['Produktnummer'] . '">' . $data[$a]['Name'] . '</a></h2>';
                    echo 'Preis: ' . $preis . ' Hersteller: ' . $data[$a]['Hersteller']
                    . '&nbsp<br>' . ' Farbe: ' . $data[$a]['Farbe'] . ' Größe: ' . $data[$a]['Groeße'] . '</dir>';
                    $a++;
                }
                ?>


            </div><!--/.col-xs-12.col-sm-9-->
        </div>



    </section>
</main>