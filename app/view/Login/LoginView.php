<!DOCTYPE html>
<!--Sprint 3, Gruppe 4 Onlineshop, 
//Verfasser: Christian Frindt, Datum: 19.11.2015 Version 1.1
//UserStory: Als Programmierer möchte ich ein in den wichtigsten Funktionen fertiges Ergebnis sehen.
//Task: Zusammenführen
//Aufwand: 15min Stunden
//Beschreibung: Es wird das >Formular zum login erstellt...getrennt von model -->
<html>
    <head>
        <meta charset="UTF-8">
        
        <title></title>
        
    </head>
    <body>
       
        <form action="login" method="post">
            <label>Email</label><input type="text" name="mail" size="24" maxlength="50"/><br/>
            <label>Passwort</label><input type="password" name="pw" size="24" maxlength="50"/><br/>
            <label><a href="/wfprj2015/public/ForgottenPassword/">Passwort vergessen?</a></label><input type="submit" name="submit" value="Bestätigen"/>
        </form>
        
    </body>
</html>