<?php

class Klant{
    private $email;
    private $wachtwoord;
    private $familienaam;
    private $voornaam;
    private $adres;
    private $postcodeID;
    private $gemeente;
    private $statusID;
    
    function __construct($email, $wachtwoord, $familienaam, $voornaam, $adres, $postcodeID, $gemeente, $statusID) {
        $this->email = $email;
        $this->wachtwoord = $wachtwoord;
        $this->familienaam = $familienaam;
        $this->voornaam = $voornaam;
        $this->adres = $adres;
        $this->postcodeID = $postcodeID;
        $this->gemeente=$gemeente;
        $this->statusID = $statusID;
    }
    function getGemeente() {
        return $this->gemeente;
    }

    function setGemeente($gemeente) {
        $this->gemeente = $gemeente;
    }

        function getEmail() {
        return $this->email;
    }

    function getWachtwoord() {
        return $this->wachtwoord;
    }

    function getFamilienaam() {
        return $this->familienaam;
    }

    function getVoornaam() {
        return $this->voornaam;
    }

    function getAdres() {
        return $this->adres;
    }

    function getPostcodeID() {
        return $this->postcodeID;
    }

    function getStatusID() {
        return $this->statusID;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setWachtwoord($wachtwoord) {
        $this->wachtwoord = $wachtwoord;
    }

    function setFamilienaam($familienaam) {
        $this->familienaam = $familienaam;
    }

    function setVoornaam($voornaam) {
        $this->voornaam = $voornaam;
    }

    function setAdres($adres) {
        $this->adres = $adres;
    }

    function setPostcodeID($postcodeID) {
        $this->postcodeID = $postcodeID;
    }

    function setStatusID($statusID) {
        $this->statusID = $statusID;
    }


}