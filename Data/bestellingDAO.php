<?php

require_once 'DBConfig.php';
require_once 'Entities/Bestelling.php';

class bestellingDAO {

    public function insertBestelling($klantID, $dag) {
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "Insert into bestellingen (klantID,dag) VALUES (:klantID,:dag)";
        $stmt = $dba->prepare($sql);
        $stmt->bindParam(":klantID", $klantID);
        $stmt->bindParam(":dag", $dag);
        $stmt->execute();

        //return $dba->lastInsertId();
        $dba = null;
    }

    //functie last minute verwijderd om opt e halen op basis van klant en alleen datum te returnen. 
//    public function alEenBestelling($klantID, $dag) {
//        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
//        $sql = "select * from bestelling where klantID = :klantID and dag = :dag";
//        $stmt = $dba->prepare($sql);
//        $stmt->bindParam(":klantID", $klantID);
//        $stmt->bindParam(":dag", $dag);
//        $stmt->execute();
//        $result = $stmt->rowCount();
//        $dba = null;
//        return $result;
//    }
    
    public function getdatum($klantID) {
            $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "select dag from bestellingen where klantID = :klantID";
            $stmt = $dba->prepare($sql);
            $stmt->bindParam(":klantID", $klantID);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dba = null;
            return $result;
        }
        
    public function getBestelling($klantID) {
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select * from bestellingen where klantID = :klantID";
        $stmt = $dba->prepare($sql);
        $stmt->bindParam(":klantID", $klantID);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dba = null;

        return $result;
    }

    public function verwijderBestelling($bestellingenID) {
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "Delete from bestellingen where bestellingenID = :bestellingenID";
        $stmt = $dba->prepare($sql);
        $stmt->bindParam(":bestellingenID", $bestellingenID);
        $stmt->execute();
        $dba = null;
    }

}
