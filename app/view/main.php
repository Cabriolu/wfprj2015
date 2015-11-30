<!--Sprint: 2
 * @author: Renat Cabriolu
 * Datum: 10.11.2015
 * User Story (Nr.: 140-7) Eigenen Code an MVC anpassen 
 * Zeit insgesamt: 1h
 * bemerkung : es gab einige probleme mit Bootstrape
-->

<main>
    <!-- Sliedebar im Header-->
    <section class="feator-rotator">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Positionsanzeige -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img class="first-slide" src="../public/Grafiken/fashion.jpg" alt="Erste Folie">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Erfahre mehr</h1>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Melde dich noch heute an</a></p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img class="second-slide" src="../public/Grafiken/fashion2.jpg" alt="Zweite Folie">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Dein Style</h1>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">Zum Registrieren</a></p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img class="third-slide" src="../public/Grafiken/fashion3.jpg" alt="Dritte Folie">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Zum Schop</h1>
                            <p><a class="btn btn-lg btn-primary" href="/wfprj/public/man" role="button">Hier Geht es zum Shop</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Zurück</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Weiter</span>
            </a>
        </div><!-- /.carousel -->

</main> 