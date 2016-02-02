<?php

require_once 'Entities/bestellinglijn.php';
require_once 'DBConfig.php';

class bestellinglijnDAO{
    
    public function laatsteLijn(){
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql= "SELECT bestellingID FROM bestellingen ORDER BY DESC LIMIT 1";
        $stmt=$dba->prepare($sql);
        $result= $stmt->execute();
        return $result;
    }
}