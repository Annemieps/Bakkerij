<?php

class bestellinglijn{
    private $bestellinglijnID;
    private $productID;
    private $hoeveelheid;
    
    function __construct($bestellinglijnID, $productID, $hoeveelheid) {
        $this->bestellinglijnID = $bestellinglijnID;
        $this->productID = $productID;
        $this->hoeveelheid = $hoeveelheid;
    }
    
    function getBestellinglijnID() {
        return $this->bestellinglijnID;
    }

    function getProductID() {
        return $this->productID;
    }

    function getHoeveelheid() {
        return $this->hoeveelheid;
    }

    function setBestellinglijnID($bestellinglijnID) {
        $this->bestellinglijnID = $bestellinglijnID;
    }

    function setProductID($productID) {
        $this->productID = $productID;
    }

    function setHoeveelheid($hoeveelheid) {
        $this->hoeveelheid = $hoeveelheid;
    }


}