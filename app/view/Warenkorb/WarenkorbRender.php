<?php
//Sprint 3, Gruppe 4 Onlineshop, 
//Verfasser: Christian Frindt, Datum: 19.11.2015 Version 1.1
//UserStory: Als Programmierer möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
//Task: Zusammenführen
//Aufwand: 2 Stunden
//Beschreibung: Warenkorb view überarbeitet, sodass model getrennt ist.

    error_reporting (E_ALL);

   
    require '../app/lib/Warenkorb.php';
    $summe = 0;
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        
        <title></title>
        <link href="../../public/css/StyleWarenkorb.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <!-- Button zum beenden des Warenkorbs -->
             <div id="backPr">
                 <a href="../" style="text-decoration: none">X</a>
             </div>
        <!-- Äusserer Rahmen des Warenkorbs -->
        <div id="rahmen">
            <h2>Warenkorb</h2>
            <!-- Prüfen ob etwas im Warenkorb liegt -->
            <?php if(!isset($_SESSION['warenkorb'])){?>
                    <!-- Wenn nichts im Warenkorb Meldung ausgeben -->
                    <h3> Keine Artikel im Warenkorb!</h3>
            <?php }else{?>
                    <!-- Andernfalls Tabelle vorbereiten und Waren anzeigen -->
                    <table id="tabelleWarenkorb">
                        <colgroup>
                            <col width="8%" />
                            <col width="56%" />
                            <col width="18%" span="2" />
                            <col width="8%" />
                        </colgroup>
                        <thead>
                            
                             <tr>
                                 <th align='left' >Anzahl</th>
                                 <th align='left'>Produkt</th>
                                 <th align='left' >Einzelpreis</th>
                                 <th align='left' >Gesamt</th>  
                            </tr>

                        </thead>

                        <tbody>
                            
                            <!-- Für jedes Produkt, dass in session Warenkorb vorhanden ist, fülle die reihe der Tabelle
                            mit gewählten Produkten, welche aus der Datenbank gelsen werden  -->
                            
                            <?php $loop=0; foreach ($_SESSION['warenkorb'] as $produkt){
                                
                                $produktID = $produkt['produktNummer'];
                                $produktAnzahl = $produkt["anzahl"];
                                
                                // data aus der controller klasse mit werten aus dem model
                                
                                if($data){
                                    
                                    

                                    ?>
                                        <!-- Befülle Tabelle mit benötigten Werten aus dem array data(Datenbank)-->
                                        
                                       <tr class="produktOrdnungR">
                                           <td class="produktOrdnungC" ><?php echo ''.$produktAnzahl ;?></td>
                                           <td class="produktOrdnungC"  ><?php echo ''.$data[$loop]['Name']; ?></td>
                                           <td class="produktOrdnungC"   ><?php echo ''.number_format($data[$loop]['SalePreis'], 2, ",", "."); ?> EUR</td>
                                           <td class="produktOrdnungC"  ><?php echo ''.number_format(($data[$loop]['SalePreis']) * $produktAnzahl, 2, ",", "."); ?> EUR</td>
                                       </tr>
                                       <!--Summe berechnen -->
                                       <?php $summe = $summe+($produktAnzahl * $data[$loop]['SalePreis']); $loop ++; ?>
                                       
                                     
                                <?php  
                               }
                            }?>
                                       
                        </tbody>
                        <tfoot>
                            <tr>
                                
                                <!--Ausgabe der totalen Summe in Euro -> Format sind zwei Nachkommastellen, sowie punkt zu komma Änderung -->
                                
                                <td class="foot" colspan="3">Summe Warenkorb:</td>
                                <td class="foot" ><?php echo ''.number_format($summe, 2, ",", "."); ?> EUR</td>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- Ende Tabelle-->
                    
                    <!-- Warenkorb löschen Button -->
                    <div id="wDelBtn">
                        <form name="form"  method="post">
                            <input type="hidden" name="delall" value= "delall">
                            <input class="myButton" type="submit" value="Waren entfernen">
                        </form>
                    </div>
                    
         <!--Ende else Block -->           
         <?php } ?>       
               
        </div>   
        
    </body>
</html>





