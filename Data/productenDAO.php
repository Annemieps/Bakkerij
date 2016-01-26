<?php

//require_once 'DBConfig.php';
require_once 'Entities/product.php';

class productDAO {

    public function getAllProducts() {
        $dba = new PDO("mysql:host=localhost;dbname=testphp;charset=utf8", "cursusgebruiker", "cursuspwd");
        $sql = 'select * from producten';
        $result = $dba->query($sql);
        
        $productenlijst = array();
        foreach ($result as $rij) {
            $product = new Product($rij["productID"], $rij["productnaam"], $rij["productprijs"], $rij["omschrijving"]);
            array_push($productenlijst, $product);
        }
        $dba = null;
        return $productenlijst;
    }

}
