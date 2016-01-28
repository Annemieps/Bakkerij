<?php

//

require_once 'Entities/Klant.php';
require_once 'DBConfig.php';

class klantDAO {

    public function getByEmail($email) {
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select * from klant where emailadres =  :email";
        $stmt = $dba->prepare($sql);
        $stmt->execute(array(':email' => $email));
        $result = $stmt->rowCount();
        $dba = null;

       
        return $result;
    }

    public function createUser($email, $wachtwoord, $voornaam, $familienaam, $adres, $postcodeID, $gemeente, $statusID) {

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

}
