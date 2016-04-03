<?php
/*
    Class to work with the badges in database.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/sql/dbInterface.php');
require_once($rootPath . '/resources/template/types/city.php');

class cityHandler extends dbFacade implements dbInterface{

	public function insert($toAdd){
        if ($this->isRightType($toAdd, "city")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO 
            									`city`(`name`, `fk_government_district`) 
            									VALUES (:name,:fk_government_district)");

            $stmt->bindValue(':name', $toAdd->name);
            $stmt->bindValue(':fk_government_district', $toAdd->fk_government_district);            
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
        $stmt = self::$dbHandler->prepare("DELETE FROM `city` 
                                            WHERE `city_id` = :toDelete");
        $stmt->bindValue(':toDelete', $toDelete);
        $ret = $stmt->execute();
        return $ret;
    }

    public function update($toUpdate){
        if ($this->isRightType($toAdd, "city")){
            if(!self::$dbHandler) {
                $this->connect();
            }             
            $stmt = self::$dbHandler->prepare("UPDATE `city` 
                                                SET `name` = :name , `fk_government_district` = :fk_government_district
                                                WHERE `city_id` = :city_id ");

            $stmt->bindValue(':city_id', $toUpdate->city_id);
            $stmt->bindValue(':name', $toUpdate->name);        
            $stmt->bindValue(':fk_government_district', $toUpdate->fk_government_district);            
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
        $stmt = self::$dbHandler->prepare("SELECT * FROM `city` 
                                            WHERE `city_id` > :city_id 
                                            ORDER BY `city_id` LIMIT 25");
        $stmt->bindValue(':city_id', $firstElement);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>