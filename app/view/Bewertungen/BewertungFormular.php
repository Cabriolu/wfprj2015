<?php
//Sprint 3, Gruppe 4 Onlineshop, 
//Verfasser: Christian Frindt, Datum: 19.11.2015 Version 1.1
//UserStory:Als Kunde möchte ich Rezensionen zu gekauften Produkten schreiben und lesen können
//Task: Formular bereitstellen zur Rezenssionseingabe
//Aufwand: 15 Minuten
//Beschreibung: die view zur eingabe von rezessionen.
    require_once '../app/models/LoginModel.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        
        <title></title>
        
    </head>
    <body>
        <p> <h2>REZENSION VERFASSEN</h2> </p>
            </br></br>
                <form method="post" >
                        <!-- Eingabefelder-->
			  <table border="0" cellpadding="0" cellspacing="4">
                                <tr>
                                    <!--Durch $post wird an das model die rezenssion übergeben -->
                                    <td align="right"><h4>Feedback:</h4></td>
                                        
                                      
                                </tr>    		
                          </table><textarea rows="30" cols="120" name="rezension" placeholder="Bitte geben Sie ihre Rezension ein"></textarea>
                        
			<p>
                           
			<input type="submit" value="Abschicken">
			</p>
	</form>
        
    </body>
</html>

