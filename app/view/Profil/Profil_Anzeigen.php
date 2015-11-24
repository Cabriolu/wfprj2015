<!--Sprint 2, Gruppe 4 Onlineshop, Verfasser: Hanim Yerlikaya, Datum: 05.11.2015
UserStory: Als Kunde möchte ich mein Profil verwalten.
Task: 160-1 (#10195) Eigenen Code an MVC anpassen
Aufwand: 10 Stunden
Beschreibung: Der Kunde kann somit sein Profil bearbeiten und löschen     -->


<?php
$profil_model = new Profil_Model();
$profil;
if(isset($_GET['id'])) $profil = $profil_model->laden($_GET['id']);
if(isset($_POST['id'])) $profil = $profil_model->laden($_POST['id']);
?>

<main>
<h2>Profil</h2>
<table>
<tr><td>Vorame:</td><td><?php print isset($profil['Vorname']) ? $profil['Vorname'] : ''; ?></td></tr>
<tr><td>Nachname:</td><td><?php print isset($profil['Nachname']) ? $profil['Nachname'] : ''; ?></td></tr>
<tr><td>Geschlecht:</td><td><?php print isset($profil['Geschlecht']) ? $profil['Geschlecht'] : ''; ?></td></tr>
<tr><td>Geburtstag:</td><td><?php print isset($profil['Geburtsdatum']) ? $profil['Geburtsdatum'] : '';?></td></tr>
<tr><td>Stra&szlig;e:</td><td><?php print isset($profil['Straße']) ? $profil['Straße'] : '';?></td></tr>
<tr><td>PLZ:</td><td><?php print isset($profil['PLZ']) ? $profil['PLZ'] : '';?></td></tr>
<tr><td>Ort:</td><td><?php print isset($profil['Ort']) ? $profil['Ort'] : '';?></td></tr>
</table>
<form method="post" action="/wfprj2015/public/Profilcontroller">
<input type="text" name="id" value="<?php print isset($profil['Kundennummer']) ? $profil['Kundennummer'] : ''; ?>" hidden />
<button type="submit" name="han" value="bearbeiten">Bearbeiten</button>
</form>
</main>
