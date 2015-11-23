<?php
require_once '../app/config/Connect_Mysql.php';

class LoginModel {

    private $res;
    private $con;
    private $emailAdresse;
    private $pw;
    private $check;
    private $md5Pw;
    private $db;

    public function __construct() {

        if (!isset($_SESSION['logged'])) {
            $_SESSION['logged'] = array('flag' => false, 'id' => null, 'admin' => false);
        }
        $this->db = new Connect_Mysql();
        $this->con = $this->db->verbinden();
   
    }
    public function login($mail,$pw){
        
        $this->emailAdresse = $mail;
        $this->pw = $pw;
        
        if( $this->emailAdresse == null || $this->pw == null){
             $check = false;
             return $check;
        }else{
            //Passwort MD5 aufbereiten und gegen Datenbank prüfen
            $this->transfermd5();
        
            $query = "Select kn.kundennummer, e.email , e.passwort from email e join kunde kn on e.email = kn.EMAIL_email where e.email like '".$this->emailAdresse."'";
            $sql = $this->con->prepare($query);
            $sql->execute();
            // Falls angefordertes Query in res vorhanden
            $this->res= $sql->fetch(PDO::FETCH_ASSOC);

                //Schreibe Werte in row array
               
                //Prüfe ob resultate aus der DB mit Eingaben übereinstimmen
                if($this->res['email'] === $this->emailAdresse && $this->res['passwort'] === $this->md5Pw){
                    
                    //Bearbeite Session Var für aktuellen Nutzer... Sichert logged Flag auf true und hinterlässt KundenID für weitere Skripte
                    $_SESSION['logged']['flag'] = true;
                    $_SESSION['logged']['id'] = $this->res['kundennummer'];
                    $_SESSION['logged']['admin'] = $this->checkAdmin();
                    
                    $this->db->schließen();
                    $this->check=true;
                    return $this->check;
                }else{
                    //Verweisst zurück zum Login
                    $this->check = false;
                     return $this->check;
                }
            }
    }
    public function logout(){
        $this->unset($_SESSION['logged']);
        $check = true;
        return $check;
    }
    
    public function checkAdmin(){
        
        if(isset($_SESSION['logged'])){
            
            $query = "Select * from kunde where kundennummer =".$_SESSION['logged']['id'];
            $sql = $this->con->prepare($query);
            $sql->execute();
            // Falls angefordertes Query in res vorhanden
            $this->res= $sql->fetch(PDO::FETCH_ASSOC);
            if($this->res['Rolle']==1){
                
                return true;
            
            }else{
                
                return false;
                
            }

        }
    }
    public function transfermd5(){
        
        //Wandel pw in md5 krypt und gebe diese zurück
        $this->md5Pw = md5($this->pw);
    }

}
