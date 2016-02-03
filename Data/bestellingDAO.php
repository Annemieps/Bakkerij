<?php
require_once 'DBConfig.php';

class bestellingDAO{
    public function insertBestelling($klantID,$dag) {
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql= "Insert into bestellingen (klantID,dag) VALUES (:klantID,:dag)";
        $stmt=$dba->prepare($sql);
        $stmt->bindParam(":klantID", $klantID);
        $stmt->bindParam(":dag", $dag);
        $stmt->execute();
        
        //return $dba->lastInsertId();
        $dba=null;
    }
   
    public function alEenBestelling($klantID,$dag){
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql= "select * from bestelling where klantID = :klantID and dag = :dag";
        $stmt=$dba->prepare($sql);
        $stmt->bindParam(":klantID", $klantID);
        $stmt->bindParam(":dag", $dag);
        $stmt->execute();
        $result = $stmt->rowCount();
        $dba=null;
        return $result;
    }
}