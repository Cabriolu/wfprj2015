 <main>
     <p> <h3>Zum Registrieren, bitte das Formular ausfuellen. </h3> </p>
		<!--mit post methode, die eingegebene Werte weiterleiten-->
                <form action="/app/controller/Registrieren.php" method="post" >
                        <!-- Eingabefälder für das Formular-->
			  <table border="0" cellpadding="0" cellspacing="4">
                                <tr>
                                        <td align="right">Email:</td>
                                        <td><input class="tf" type = "text" name = "Email" required="required"  maxlength="45" value="max.mustermann@hotmail.de" /></td>
                                </tr>
				<tr>
					<td align="right">Passwort:</td>
                                        <td><input class="tf" type="password" name="Passwort" required="required"  maxlength="45" value="$Passwort"/><br></td>
				</tr>
				
				<tr>	
					<td align="right">Vorname:</td>
                                        <td><input class="tf" type="text" name="Vorname"  required="required" maxlength="45" value="Max"/><br></td>
				</tr>	
				
				<tr>
					<td align="right">Nachname</td>
                                        <td><input class="tf" type="text" name="Nachname"  required="required" maxlength="45" value="Mustermann"/><br></td>
				</tr>			
		
				<tr>
					<td align="right">Geschlecht</td>
                                        <td><input class="tf" type="radio" name="Geschlecht" value="Maennlich" checked="checked"/> Männlich<br></td>
                                        <td><input class="tf" type="radio" name="Geschlecht" value="Weiblich"/> Weiblich<br></td>
                                </tr>   
				
				<tr>	
					<td align="right">Geburtsdatum:</p</td>
                                        <td><input class="tf" type="date" name="Geburtsdatum" required="required" maxlength="45" value="1990-12-21"/><br></td>
				</tr>
                            
                                <tr>
					<td align="right">Plz</td>
                                        <td><input class="tf" type="text" name="Plz"  required="required" maxlength="45" value="89073"/><br></td>
				</tr>	
                                
                                <tr>
					<td align="right">Strasse</td>
                                        <td><input class="tf" type="text" name="Strasse"  required="required" maxlength="45" value="Pritwitzstrasse"/><br></td>
				</tr>	
                                
                                <tr>
					<td align="right">Hausnummer</td>
                                        <td><input class="tf" type="text" name="Hausnummer"  required="required" maxlength="45" value="1"/><br></td>
				</tr>	
				
			</table>
			<p>
			<input type="submit" value="Registerieren">
			</p>
	</form>
</mai>
