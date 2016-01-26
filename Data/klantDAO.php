<?php
require_once '../Entities/Klant.php';

class klantDAO{
    public function getByUser($email){
        $dba = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME,DBConfig::$DB_PASSWORD);
            $sql = "select mvc_boeken.id as boek_id, titel, genre_id, genre  
                    from mvc_boeken, mvc_genres  
                    where genre_id = mvc_genres.id and mvc_boeken.id = :id" ;
    }
    
//    public function create($email, $vn $fmn, $adres, $postcode, $gemeente) {
//            $bestaandeUser = $this->getByTitel($titel);
//            if (!is_null($bestaandBoek)) {
//                    throw new TitelBestaatException();
//            }
//
//            $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME,  
//                    DBConfig::$DB_PASSWORD);
//            $sql = "insert into mvc_boeken (titel, genre_id)  
//                    values (:titel, :genreId)";
//            
//            $stmt = $dbh->prepare($sql);
//            $stmt->execute(array(':titel' => $titel, ':genreId' => $genreId));
//
//            //id van de net ingevoerde boek
//            $boekId = $dbh->lastInsertId();
//            $dbh = null;
//
//            //genre id ophalen voor het boek
//            $genreDAO = new GenreDAO();
//            $genre = $genreDAO->getById($genreId);
//            //creer boek aan de hand van boekid,titel en genre
//            $boek = Boek::create($boekId, $titel, $genre);
//            return $boek;
//        }
        
    
}