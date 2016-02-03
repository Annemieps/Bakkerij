<?php

//

require_once 'Entities/Klant.php';
require_once 'DBConfig.php';

class klantDAO {

    //Om te controleren bij het aanmaken van een account of een account bestaat, returned een 0 of een 1
    public function getByEmail($email) {
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select * from klant where emailadres =  :email";
        $stmt = $dba->prepare($sql);
        $stmt->execute(array(':email' => $email));
        $result = $stmt->rowCount();
        $dba = null;
        return $result;
    }

    //effectief aanmaken van de account
    public function createUser($email, $wachtwoord, $voornaam, $familienaam, $adres, $postcodeID, $gemeente, $statusID) {

        //var_dump( "createuser", $email, $wachtwoord, $voornaam, $familienaam, $adres, $postcodeID, $gemeente, $statusID); 
        $bestaandeUser = $this->getByEmail($email);
        if ($bestaandeUser != 0) {
            throw new emailBestaatAlException();
        } else {

            $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "insert into klant (emailadres, wachtwoord, voornaam, familienaam, adres, postcodeID, gemeente, statusID)  
                   values(:email,:wachtwoord,:voornaam,:familienaam, :adres, :postcodeID,:gemeente, :statusID )";
            $stmt = $dba->prepare($sql);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":wachtwoord", $wachtwoord);
            $stmt->bindParam(":voornaam", $voornaam);
            $stmt->bindParam(":familienaam", $familienaam);
            $stmt->bindParam(":adres", $adres);
            $stmt->bindParam(":postcodeID", $postcodeID);
            $stmt->bindParam(":gemeente", $gemeente);
            $stmt->bindParam(":statusID", $statusID);
            $stmt->execute();
            //$stmt->execute(array(':email' => $email, ':wachtwoord' => $wachtwoord, ':voornaam' => $voornaam, ':familienaam' => $familienaam,':adres' => $adres , ':postcodeID' =>  $postcodeID , ':gemeente' => $gemeente , ':statusID' => $statusID ));

            $dba = null;
        }
    }

    //Om bij inloggen te checken of de informatie klopt
    public function checkLogin($email) {
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select emailadres,wachtwoord, familienaam  from klant where emailadres =  :email";
        $stmt = $dba->prepare($sql);
        $stmt->execute(array(':email' => $email));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        
        $user = ['emailadres'=>$result["emailadres"], 'wachtwoord'=>$result["wachtwoord"], 'familienaam'=>$result["familienaam"]];
        $dba = null;
        return $user;
    }
    
    //om bij het afrekenen te checken of de status het toe staat op te bestellen.
    public function checkStatus($email) {
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select statusID  from klant where emailadres =  :email";
        $stmt = $dba->prepare($sql);
        $stmt->execute(array(':email' => $email));
        $result=$stmt->fetch();
        return $result;
    }
    
    
}
