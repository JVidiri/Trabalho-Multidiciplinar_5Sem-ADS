<?php
/*
    Class to work with the badges in database.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/sql/dbInterface.php');
require_once($rootPath . '/resources/template/types/idiom.php');

class idiomHandler extends dbFacade implements dbInterface{

	public function insert($toAdd){
        if ($this->isRightType($toAdd, "idiom")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO 
            									`idiom`(`name`, `fk_country_id`) 
            									VALUES (:name,:fk_country_id)");

            $stmt->bindValue(':name', $toAdd->name);            
            $stmt->bindValue(':fk_country_id', $toAdd->fk_country_id);            
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
        $stmt = self::$dbHandler->prepare("DELETE FROM `idiom` 
                                            WHERE `idiom_id` = :toDelete");
        $stmt->bindValue(':toDelete', $toDelete);
        $ret = $stmt->execute();
        return $ret;
    }

    public function update($toUpdate){
        if ($this->isRightType($toAdd, "idiom")){
            if(!self::$dbHandler) {
                $this->connect();
            }             
            $stmt = self::$dbHandler->prepare("UPDATE `idiom` 
                                                SET `name` = :name, `fk_country_id` = :fk_country_id 
                                                WHERE `idiom_id` = :idiom_id ");
            
            $stmt->bindValue(':idiom_id', $toUpdate->idiom_id);
            $stmt->bindValue(':name', $toUpdate->name);
            $stmt->bindValue(':fk_country_id', $toUpdate->fk_country_id);                    
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
        $stmt = self::$dbHandler->prepare("SELECT * FROM `idiom` 
                                            WHERE `idiom_id` > :idiom_id 
                                            ORDER BY `idiom_id` LIMIT 25");
        $stmt->bindValue(':idiom_id', $firstElement);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>