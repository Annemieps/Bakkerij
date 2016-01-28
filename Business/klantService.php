<?php
require_once 'Data/klantDAO.php';

class KlantService{
    public function wachtwoord(){
//        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
//        $wachtwoord = "";
//        for ($i = 0; $i <= 6; $i++) {
//            $wachtwoord . $characters[mt_rand(0, strlen($characters) - 1)];
//        }
        $wachtwoord=rand(1,6);
        return $wachtwoord;
        
    }
    
    
    public function maakKlant($email, $wachtwoord, $familienaam, $voornaam, $adres, $postcodeID, $gemeente,$statusID){
        $klantDAO= new klantDAO();
        $klantDAO->createUser($email, $wachtwoord, $familienaam, $voornaam, $adres, $postcodeID, $gemeente, $statusID);
        
    }
}
