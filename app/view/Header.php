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


<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <title>Fashion-Factory</title>

    <!-- Bootstrap -->
    <link href="../public/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/sty.css">
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
                 <a href="#" title="Zur startseite">
                     <img src="../public/Grafiken/Logo.png" width="121" height="51" alt="Logo">
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
                 <a href="../app/view/manview.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Herren <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                    <li><a href="/wfprj2015/public/man">Jacken</a></li>
                    <li><a href="#">Oberbekleidung</a></li>
                    <li><a href="#">Hosen</a></li>
                    <li><a href="#">Unterwäsche</a></li>
                    <li><a href="#">Accessoires</a></li>
                </ul>
                </li>
                   <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Damen <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                    <li><a href="#">Jacken</a></li>
                    <li><a href="#">Oberbekleidung</a></li>
                    <li><a href="#">Hosen</a></li>
                    <li><a href="#">Unterwäsche</a></li>
                    <li><a href="#">Accessoires</a></li>
                    <li><a href="#">Röcke</a></li>
                </ul>
                </li>
                 <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kinder <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                    <li><a href="/wfprj2015/public/man">Jacken</a></li>
                    <li><a href="#">Oberbekleidung</a></li>
                    <li><a href="#">Hosen</a></li>
                    <li><a href="#">Unterwäsche</a></li>
                    <li><a href="#">Accessoires</a></li>
                </ul>
                </li>
                <li><a href="#">Sale</a></li>
                
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Warenkorb</a></li>
            <li><a href='/wfprj2015/public/Registrieren'>Registrieren</a></li>
            <li><a href="/wfprj2015/public/backend">Login</a></li>
            <li><a href="#">Profil</a></li>
            
            <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Suchen...">
            </form>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
   </header>