<?php

class Bestelling{
    private $bestellingenID;
    private $klantID;
    private $dag;
    
    function __construct($bestellingenID, $klantID, $dag) {
        $this->bestellingenID = $bestellingenID;
        $this->klantID = $klantID;
        $this->dag = $dag;
    }
    function getBestellingenID() {
        return $this->bestellingenID;
    }

    function getKlantID() {
        return $this->klantID;
    }

    function getDag() {
        return $this->dag;
    }

    function setBestellingenID($bestellingenID) {
        $this->bestellingenID = $bestellingenID;
    }

    function setKlantID($klantID) {
        $this->klantID = $klantID;
    }

    function setDag($dag) {
        $this->dag = $dag;
    }


}