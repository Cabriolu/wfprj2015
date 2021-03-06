﻿
<!--Sprint 2, Gruppe 4 Onlineshop, Verfasser: Hanim Yerlikaya, Datum: 05.11.2015
UserStory: Als Kunde möchte ich mein Profil verwalten.
Task: 160-1 (#10195) Eigenen Code an MVC anpassen
Aufwand: 10 Stunden
Beschreibung: Der Kunde kann somit sein Profil bearbeiten und löschen     -->

<html>
<?php
$profil_model = new Profil_Model();
$profil;
if(isset($_GET['id'])) $profil = $profil_model->laden($_GET['id']);
if(isset($_POST['id'])) $profil = $profil_model->laden($_POST['id']);
?>

<head>
<meta charset="utf-8">
<title>Profil - <?php
	if(isset($profil))
	{
		print $profil['Vorname'].' '.$profil['Nachname'];
	}
	else
	{
		print 'NOT FOUND';
	}
?></title></head>

<body>
<h2>Profil</h2>
<form action="../../app/controller/Profilcontroller.php" method="post">
<input type="text" name="id" value="<?php print $profil['Kundennummer']; ?>" hidden />
<table>
<tr><td>Vorame:</td><td><input type="text" name="vorname" value="<?php print $profil['Vorname']; ?>" placeholder="Vorname" /></td></tr>
<tr><td>Nachname:</td><td><input type="text" name="nachname" value="<?php print $profil['Nachname']; ?>" placeholder="Nachname" /></td></tr>
<tr><td>Geschlecht:</td><td><input type="text" name="geschlecht" value="<?php print $profil['Geschlecht']; ?>" placeholder="Geschlecht" /></td></tr>
<tr><td>Geburtstag:</td><td><input type="text" name="geburtstag" value="<?php print $profil['Geburtsdatum']; ?>" placeholder="Geburtstag" /></td></tr>
<tr><td>Stra&szlig;e:</td><td><input type="text" name="strasse" value="<?php print $profil['Straße']; ?>" placeholder="Stra&szlig;e" /></td></tr>
<tr><td>PLZ:</td><td><input type="text" name="plz" value="<?php print $profil['PLZ']; ?>" placeholder="PLZ" /></td></tr>
<tr><td>Ort:</td><td><input type="text" name="ort" value="<?php print $profil['Ort']; ?>" placeholder="Ort" /></td></tr>
<tr><td></td><td><button type="submit" name="han" value="aktualisieren">Aktualisieren</button></td></tr>
<tr><td></td><td>&nbsp;</td></tr>
<tr><td></td><td><button type="submit" name="han" value="loeschen">Account loeschen</button></td></tr>
</table>
</body>

</form>
</html>