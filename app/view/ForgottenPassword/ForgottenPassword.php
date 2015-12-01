<!-- --Sprint 3, Gruppe 4 Onlineshop, 
Verfasser: Hanim Yerlikaya, Datum: 24.11.2015
UserStory: Passwortzurücksetzung mit automatischen Email-Versand programmieren
Task: 200-1 (#10321) Passwort zurück setzen
Aufwand: 5 Stunden
Beschreibung: Der User kann ein einen neuen Passwort beantragen.   

Mysql-Connection benutzt von Kerstin Gräter  -->



<main>
    <form method="post" action="/wfprj2015/public/ForgottenPassword/validate">
        <label>Email: </label><input type="text" name="email" />
        <button type="submit">Request</button>
    </form>
</main>