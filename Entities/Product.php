<?php

class Product{
    private $productID;
    private $productnaam;
    private $productprijs;
    private $omschrijving;
    
    function __construct($productID, $productnaam, $productprijs, $omschrijving) {
        $this->productID = $productID;
        $this->productnaam = $productnaam;
        $this->productprijs = $productprijs;
        $this->omschrijving = $omschrijving;
    }
    function getProductID() {
        return $this->productID;
    }

    function getProductnaam() {
        return $this->productnaam;
    }

    function getProductprijs() {
        return $this->productprijs;
    }

    function getOmschrijving() {
        return $this->omschrijving;
    }

    function setProductID($productID) {
        $this->productID = $productID;
    }

    function setProductnaam($productnaam) {
        $this->productnaam = $productnaam;
    }

    function setProductprijs($productprijs) {
        $this->productprijs = $productprijs;
    }

    function setOmschrijving($omschrijving) {
        $this->omschrijving = $omschrijving;
    }



}