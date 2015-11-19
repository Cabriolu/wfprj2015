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
<table>
<tr><td>Vorame:</td><td><?php print $profil['Vorname']; ?></td></tr>
<tr><td>Nachname:</td><td><?php print $profil['Nachname']; ?></td></tr>
<tr><td>Geschlecht:</td><td><?php print $profil['Geschlecht']; ?></td></tr>
<tr><td>Geburtstag:</td><td><?php print $profil['Geburtsdatum'];?></td></tr>
<tr><td>Stra&szlig;e:</td><td><?php print $profil['Straße'];?></td></tr>
<tr><td>PLZ:</td><td><?php print $profil['PLZ'];?></td></tr>
<tr><td>Ort:</td><td><?php print $profil['Ort'];?></td></tr>
</table>
<form method="post" action="../../app/controller/Profilcontroller.php">
<input type="text" name="id" value="<?php print $profil['Kundennummer']; ?>" hidden />
<button type="submit" name="han" value="bearbeiten">Bearbeiten</button>
</form>
</body>


</html>
