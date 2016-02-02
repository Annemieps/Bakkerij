<?php

//require_once 'DBConfig.php';
require_once 'Entities/product.php';
require_once 'DBConfig.php';

class productDAO {

    public function getAllProducts() {
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
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

    public function getByID($productID){
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql= "select productprijs where productID= :productid";
        $stmt = $dba->prepare($sql);
        $stmt->bindParam(":productid", $productID);
        $stmt->execute();
        $productprijs= $stmt->fetch();
        
        return $productprijs;
    }
}
