<?php

require_once 'Entities/Klant.php';
require_once 'DBConfig.php';

class klantDAO {

    public function getByEmail($email) {
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select * from klant where emailadres =  :emailadres";
        $stmt = $dba->prepare($sql);
        $stmt->execute(array(':emailadres' => $email));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $dba=null;
        
        $bestaatOfNiet=count($result);
        return $bestaatOfNiet;
    }

    public function createUser($email, $wachtwoord,$voornaam, $familienaam, $adres, $postcodeID, $gemeente, $statusID){
        
        /*$bestaandeUser = $this->getByEmail($email);
        if ($bestaandeUser!=null) {
            throw new klantBestaatAlException();
        }*/

        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "insert into klant (emailadres, wachtwoord, voornaam, familienaam, adres, postcodeID, gemeente, statusID)  
                   values(:email,:wachtwoord,:voornaam,:familienaam, :adres, :postcodeID,:gemeente, :statusID )";
        var_dump($dba);
        $stmt = $dba->prepare($sql);
        var_dump($email, $wachtwoord, $familienaam, $voornaam, $adres, $postcodeID, $gemeente, $statusID);
        $stmt->execute(array(':email' => $email, ':wachtwoord' => $wachtwoord, ':voornaam' => $voornaam, ':familienaam' => $familienaam, ':adres' => $adres , ':postcodeID' =>  $postcodeID , ':gemeente' => $gemeente , ':statusID' => $statusID ));
        
        $dba = null;
        }
        
}
