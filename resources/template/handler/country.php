<?php 
/*
    Class to work with the countryes in database.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/sql/dbInterface.php');
require_once($rootPath . '/resources/template/types/country.php');

class countryHandler extends dbFacade implements dbInterface{

	public function insert($toAdd){
        if ($this->isRightType($toAdd, "country")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO 
            									`country`(`country_id`, `name`, `thumb`, `uf`) 
            									VALUES (:country_id,:name,:thumb,:uf)");

            $stmt->bindValue(':country_id', $toAdd->country_id);
            $stmt->bindValue(':name', $toAdd->name);
            $stmt->bindValue(':thumb', $toAdd->thumb);
            $stmt->bindValue(':uf', $toAdd->uf);            
            $ret = $stmt->execute();
            return $ret;
        }else{
            //TODO return error;
        }
    }  

    public function delete($toDelete){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("DELETE FROM `country` 
                                            WHERE `country_id` = :toDelete");
        $stmt->bindValue(':toDelete', $toDelete, PDO::PARAM_INT);
        $ret = $stmt->execute();
        return $ret;
    }

    public function update($toUpdate){
        if ($this->isRightType($toAdd, "country")){
            if(!self::$dbHandler) {
                $this->connect();
            }             
            $stmt = self::$dbHandler->prepare("UPDATE `country` 
                                                SET `country_id` = :country_id , `name` = :name, `thumb` = :thumb_pic, `uf` = :uf 
                                                WHERE `badge_id` = :badge_id ");

            $stmt->bindValue(':country_id', $toUpdate->country_id);
            $stmt->bindValue(':name', $toUpdate->name);        
            $stmt->bindValue(':thumb', $toUpdate->thumb);        
            $stmt->bindValue(':uf', $toUpdate->uf);        
            $ret = $stmt->execute();
            return $ret;
        }else{
            //TODO return error;
        }
    }

    public function select($firstElement){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("SELECT * FROM `country` 
                                            WHERE `country_id` > :country_id 
                                            ORDER BY `country_id` LIMIT 25");
        $stmt->bindValue(':country_id', $firstElement);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>