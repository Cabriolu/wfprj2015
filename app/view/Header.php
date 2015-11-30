<!--Sprint: 2
 * @author: Renat Cabriolu
 * Datum: 10.11.2015
 * User Story (Nr.: 140-7) Eigenen Code an MVC anpassen 
 * Zeit insgesamt: 3h
 * bemerkung : es gab einige probleme mit Bootstrape
-->


<!--Sprint: 1
 * @author: Renat Cabriolu
 * Datum: 25.10.2015
 * User Story (Nr.: 10) Einheitliches Design
 * Zeit insgesamt: 8h

-->


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php session_start(); ?>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
        <title>Fashion-Factory</title>

        <!-- Bootstrap -->
        <link href="/WIFprojekt/public/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="/WIFprojekt/public/css/sty.css">
        <script src="../public/js/jquery-1.6.1.min.js"></script>
        <script src="../public/js/bootstrap.min.js"></script>
        <script src="../public/js/bootstrap.min_1.js"></script>
        <script src="../public/js/init.js"></script>
        <!-- Unterstützung für Media Queries und HTML5-Elemente in IE8 über HTML5 shim und Respond.js -->
        <!-- ACHTUNG: Respond.js funktioniert nicht, wenn du die Seite über file:// aufrufst -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="../public/home" title="Zur startseite">
                            <img src="/WIFprojekt/public/Grafiken/Logo.png" width="121" height="51" alt="Logo">
                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Navigation ein-/ausblenden</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="../public/Kategoriecontroller/2" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Herren <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <!-- Die folgenden Links sind von Marcel Riedl -->
                                    <li><a href="../public/ProduktlisteController/7">Jacken</a></li>
                                    <li><a href="../public/ProduktlisteController/8">Oberbekleidung</a></li>
                                    <li><a href="../public/ProduktlisteController/9">Hosen</a></li>
                                    <li><a href="../public/ProduktlisteController/10">Unterwäsche</a></li>
                                    <li><a href="../public/man">Accessoires</a></li>
                                    <!-- Marcel Riedl Ende -->
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="../public/Kategoriecontroller/1" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Damen <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <!-- Die folgenden Links sind von Marcel Riedl -->
                                    <li><a href="../public/ProduktlisteController/1">Jacken</a></li>
                                    <li><a href="../public/ProduktlisteController/2">Oberbekleidung</a></li>
                                    <li><a href="../public/ProduktlisteController/3">Hosen</a></li>
                                    <li><a href="../public/ProduktlisteController/4">Unterwäsche</a></li>
                                    <li><a href="../public/ProduktlisteController/5">Accessoires</a></li>
                                    <li><a href="../public/ProduktlisteController/6">Röcke</a></li>
                                    <!-- Marcel Riedl Ende -->
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="../public/Kategoriecontroller/3" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kinder <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <!-- Die folgenden Links sind von Marcel Riedl -->
                                    <li><a href="../public/ProduktlisteController/12">Jacken</a></li>
                                    <li><a href="../public/ProduktlisteController/13">Oberbekleidung</a></li>
                                    <li><a href="../public/ProduktlisteController/14">Hosen</a></li>
                                    <li><a href="../public/ProduktlisteController/15">Unterwäsche</a></li>
                                    <li><a href="../public/ProduktlisteController/16">Accessoires</a></li>
                                    <!-- Marcel Riedl Ende -->
                                </ul>
                            </li>
                            <!-- Die folgenden Links sind von Marcel Riedl -->
                            <li><a href="../public/ProduktlisteController/17">Sale</a></li>
                            <!-- Marcel Riedl Ende -->
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="../public/WarenkorbAnzeigen/anzeigen">Warenkorb</a></li>
                            <li><a href='../public/Registrieren_Controller'>Registrieren</a></li>
                            <li><a href="../public/LoginController/rufView">Login</a></li>
                            <li><a href="../public/Profielcontroller">Profil</a></li>
                            <!--            Verweis auf Suche_Controller von @Kevljanin,Denis-->
                            <form class="navbar-form navbar-right" action="/WIFprojekt/public/Suche_Controller" method="post">
                                <input type="text" class="form-control" name="Suche" placeholder="Suchen...">
                                <input type="submit" value="Suche" method="post" >
                            </form>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </nav>
        </header>