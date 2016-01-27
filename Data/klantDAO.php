<?php

require_once '../Entities/Klant.php';

class klantDAO {

    public function getByUser($email) {
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select * from klant where emailadres =  :emailadres";
        $stmt = $dba->prepare($sql);
        $stmt->execute(array(':id' => $email));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function create($email, $wachtwoord, $familienaam, $voornaam, $adres, $postcodeID, $statusID){
        $bestaandeUser = $this->getByUser($email);
        if (!is_null($bestaandeUser)) {
            throw new UserBestaatAlException();
        }

        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = 'insert into klant (emailadres,wachtwoord,familienaam,voornaam,adres,postcodeID, genre_id, statusID)  
                    values (:email, :wachtwoord, :familienaam, :voornaam, :adres, :postcodeID, :statusID )';

        $stmt = $dba->prepare($sql);
        $stmt->execute(array(':email' => $email, ':wachtwoord' => $wachtwoord, ':familienaam' => $familienaam, 
            ':voornaam' =>$voornaam, ':adres' => $adres , ':postcodeID' =>$postcodeID , ':status' => $statusID ));
            $dbh = null;
        }

}
