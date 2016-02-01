<?php

require_once 'Data/klantDAO.php';

class KlantService {

    //voor aanmaken user wachtwoord
    public function wachtwoord() {
        //$code = array('1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        //$wachtwoordshuffle = shuffle($code);
        //$wachtwoord=  implode($wachtwoordshuffle);
        $wachtwoord=rand(100000,999999);
        return $wachtwoord;
    }

    //voor veiligheid van het net aangemaakte wachtwoord, aan de hand van de gegevens van de net aangemaakte klant
    public function safety() {
        $wachtwoord = $this->wachtwoord();
        $hashedvalue = sha1("batman" . $wachtwoord);
        $hash1=strrev($hashedvalue);
        $hash2 = sha1($hash1);
        return $hash2;
    }

    //klant aanmaken
    public function maakKlant($email, $wachtwoord, $familienaam, $voornaam, $adres, $postcodeID, $gemeente, $statusID) {
        $klantDAO = new klantDAO();
        $klantDAO->createUser($email, $wachtwoord, $familienaam, $voornaam, $adres, $postcodeID, $gemeente, $statusID);
    }

    
    //inloggen. Parameters email en wachtwoord
    //eerst kijken of het email adres bestaat anders false returnen 
    public function logIn($email, $wachtwoord) {
        $klantDAO = new klantDAO();

        
        //als de klant bestaat moet er voor dat email adress, de familienaam opgehaald worden en de hash. 
        //Het ingegeven wachtwoord word door dezelfde salts gehaald en dan vergeleken met de hash in de database. 
        
        if ($klantDAO->getByEmail($email) != 0) {
            //klant bevat de login check met het email adres 
            $klant = $klantDAO->checkLogin($email);
            $hashedvalue = sha1("batman" . $wachtwoord);
            $hash1=strrev($hashedvalue);
            $hash2 = sha1($hash1);
            if ($hash2 == $klant["wachtwoord"]) {
                $login="juist";
                return $login;
            }
            $login="emailJwachtwoordF";
            return $login;
        }
            $login="fout";
            return $login;
    }

    public function adminpw() {
        $wachtwoord = "admin";
        $hashedvalue = sha1("batman" . $wachtwoord);
        $hash1=strrev($hashedvalue);
        $hash2 = sha1($hash1);
        return $hash2;
                
    }

}
