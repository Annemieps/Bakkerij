<?php
require_once 'Data/bestellingDAO.php';

class bestellingService{
    public function insertBestelling($klantID,$dag){
        $bestellingDAO=new bestellingDAO();
        $bestellingDAO->insertBestelling($klantID, $dag);
        
    }
    public function alEenBestelling($klantID,$dag){
        $bestellingDAO=new bestellingDAO();
        $bestellingDAO->alEenBestelling($klantID, $dag);
    }
    public function getBestelling($klantID){
        $bestellingDAO=new bestellingDAO();
        return $bestellingDAO->getBestelling($klantID);
        
    }
    public function verwijderBestelling($bestellingenID){
        $bestellingDAO=new bestellingDAO();
        $bestellingDAO->verwijderBestelling($bestellingenID);
    }
}

