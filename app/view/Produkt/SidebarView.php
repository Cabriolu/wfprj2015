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
                        <form>
                            <input type="checkbox" name="blau" value="blau">blau<br>
                            <input type="checkbox" name="rot" value="rot">rot<br>
                            <input type="checkbox" name="schwarz" value="schwarz">schwarz<br>
                            <input type="checkbox" name="beige" value="beige">beige<br>
                            <input type="submit" action="wfprj2015/public/Filter_Controller" value="Filter" method="post">
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