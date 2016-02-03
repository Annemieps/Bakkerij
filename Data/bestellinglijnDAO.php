<?php

require_once 'Entities/bestellinglijn.php';
require_once 'DBConfig.php';

class bestellinglijnDAO{
    
    public function laatsteLijn(){
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql= "SELECT bestellingenID FROM bestellingen ORDER BY bestellingenID DESC LIMIT 1";
        $stmt=$dba->prepare($sql);
        $result= $stmt->fetch(PDO::FETCH_ASSOC);
        $dba=null;
        return $result;
        
    }
    //$bestellingenID
    public function insertLijnen($bestellingenID,$productID,$hoeveelheid){
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "insert into bestellinglijn (bestellingenID, productID,hoeveelheid) VALUES(:bestellingenID, :productID,:hoeveelheid)";
        $stmt=$dba->prepare($sql);
        $stmt->bindParam(":bestellingenID", $bestellingenID);
        $stmt->bindParam(":productID", $productID);
        $stmt->bindParam(":hoeveelheid", $hoeveelheid);
        $stmt->execute();
        $dba=null;
    }
}