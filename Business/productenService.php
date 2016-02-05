<?php

require_once 'Data/productenDAO.php';
require_once 'Entities/Product.php';

class productService {

    public function getProductenOverview() {
        $productenDAO = new productDAO();
        $productenLijst = $productenDAO->getAllProducts();
        return $productenLijst;
    }

    public function getPrijsEnNaam($bestellijnen) {
        $productenDAO = new productDAO();
        $bestelling = array();
        foreach ($bestellijnen as $bestellijn) {
            $prijsEnNaam = $productenDAO->getByID($bestellijn['productID']);
            $bestelling[] = array("productprijs" => $prijsEnNaam[0]['productprijs'], "productnaam" => $prijsEnNaam[0]['productnaam'], "hoeveelheid" => $bestellijn['hoeveelheid']);
        }
        return $bestelling;
    }

}
