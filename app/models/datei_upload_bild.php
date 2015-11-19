<!DOCTYPE html>
<!--
Gruppe 4 Onlineshop
Meryem Güler
Sprint 1 
UserStory: Als Händler möchte ich meine angebotenen Produkte ansehnlich darstellen können 
Task: #10012 Bildupload
Zeitaufwand: 8 Stunden
-->

<html>
 <head>
  <title>Bildupload</title>
  <meta name="author" content="Meryem G&uuml;ler" />
  <meta charset="UTF-8" />
</head>
<body>
<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
Datei: <br />
<input type="hidden" name="MAX_FILE_SIZE" value="300000" /> 
<input type="file" name="datei" /><br />   
<input type="submit" value="Hochladen" />
</form>

<?php    
/*Grobe Überprüfung
 * nur wenn das Formular abgesendet wurde, wenn es keine Fehler beim Upload gab und wenn die Größe den vorgegebenen Wert nicht überschreitet
 * soll die Überarbeitung durchgeführt werden */
if (isset($_FILES["datei"]) AND ! $_FILES["datei"]["error"]  AND  ($_FILES["datei"]["size"] < 100000 )) { 
/* Im nächsten Schritt wird mit getimagesize überprüft, ob es sich um ein Bild handelt 
 * liefert FALSE zurück, wenn es sich nicht um ein Bild handelt, wenn es FAlSE wird das Skript mit 'die' abgebrochen*/ 
    $bilddaten = getimagesize($_FILES["datei"]["tmp_name"]);
    if ($bilddaten === false) {
      die("Es handelt sich um kein Bild!");
    
    } else {
      $mime = $bilddaten["mime"];  //wenn es sich um ein Bild handelt ermittle ich hier den MIME-Typ
      $mimetypen = array (        //Definition von MIME-Typs und zugehörigen Endungen
        "image/gif" => "gif",
        "image/png" => "png",
        "image/jpeg" => "jpg"
	    
	);
     if (!isset($mimetypen[$mime])) {  //wenn der MIME-Typ nicht in der Liste ist breche ich das Skript ab
       die("Das Format ist falsch!");
     } else {
       $endung = $mimetypen[$mime];  //ansonsten setze ich die Endung auf das was ich oben im Array mimetypen angegeben habe
     }

     $name_neu = basename($_FILES["datei"]["name"]);   //setze neuen Dateinamen zusammen als Basis nehme ich den ursprünglichen Dateinamen
     $name_neu = preg_replace("/\.(jpe?g|gif|png)$/i", "", $name_neu); //ersetze ursprüngliche Endung durch nix 
     $name_neu = preg_replace("/[^a-zA-Z0-9_-]/", "", $name_neu);   //ersetze Zeichen, die ich nicht haben möchte durch nix  
     $name_neu .= ".$endung";  //hänge Endung, die ich oben definiert habe an den neuen Namen an
     $ziel = "upload/$name_neu";  //Ziel Verzeichnis und Dateiname den ich ermittelt habe
     while (file_exists($ziel)) { //falls es das Bild im Zielordner bereits gibt soll es nicht überschrieben werden
       $name_neu = "copy_$name_neu"; //falls es eine Datei mit dem Namen existiert erstelle ich einen neuen Namen an dem ich Kopie dranhänge
       $ziel = "upload/$name_neu";
     }
      if (@move_uploaded_file($_FILES["datei"]["tmp_name"], $ziel)) {  //Nach Überprüfung Kopie der Datei an den angegebenen Ort 
                                                                       // @-Zeichen sorgt dafür, dass evtl. Fehlermeldungen dabei unterdrückt werden
        echo "Dateiupload hat geklappt";
     } else {
       echo "Dateiupload hat nicht geklappt";
    }
  }
}
?>


</body>
</html>

