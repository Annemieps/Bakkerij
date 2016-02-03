<?php

require_once 'Data/bestellinglijnDAO.php';

class bestellingLijnService{
    public function getLaatsteLijn(){
        $bestellinglijnDAO=new bestellinglijnDAO;
        $laatstelijn=$bestellinglijnDAO->laatsteLijn();
        return $laatstelijn;
    }

    public function insertLijnen($bestellingenID,$productID,$hoeveelheid){
        $bestellinglijnDAO=new bestellinglijnDAO();
        $bestellinglijnDAO->insertLijnen($bestellingenID, $productID, $hoeveelheid);
    }
}
