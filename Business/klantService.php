<?php
require_once 'Data/klantDAO.php';

class KlantService{
    public function wachtwoord(){
        $code=array('1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $wachtwoordshuffle=  shuffle($code);
        $wachtwoord= array_slice($code, 2, 6);
        return $wachtwoord;
    }
    public function safety(){
        $wachtwoord=  $this->wachtwoord();
        $hash1=  substr($this->maakKlant($familienaam),2,3);
        $hashedvalue=  sha1($hash1.$wachtwoord);
        $hash2=  sha1(strrev($hashedvalue));
        return $hash2;
    }
    
    
    
    public function maakKlant($email, $wachtwoord, $familienaam, $voornaam, $adres, $postcodeID, $gemeente,$statusID){
        $klantDAO= new klantDAO();
        $klantDAO->createUser($email, $wachtwoord, $familienaam, $voornaam, $adres, $postcodeID, $gemeente, $statusID);
        
    }
}
