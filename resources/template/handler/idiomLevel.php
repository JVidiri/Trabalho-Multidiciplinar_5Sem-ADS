<?php
/*
    Class to work with the badges in database.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/sql/dbInterface.php');
require_once($rootPath . '/resources/template/types/idiomLevel.php');

class idiomLevelHandler extends dbFacade implements dbInterface{

	public function insert($toAdd){
        if ($this->isRightType($toAdd, "idiomLevel")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO 
            									`idiom_level`(`name`, `description`) 
            									VALUES (:name, :description)");

            $stmt->bindValue(':name', $toAdd->name);            
            $stmt->bindValue(':description', $toAdd->description);            
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
        $stmt = self::$dbHandler->prepare("DELETE FROM `idiom_level` 
                                            WHERE `idiom_level_id` = :toDelete");
        $stmt->bindValue(':toDelete', $toDelete);
        $ret = $stmt->execute();
        return $ret;
    }

    public function update($toUpdate){
        if ($this->isRightType($toAdd, "idiomLevel")){
            if(!self::$dbHandler) {
                $this->connect();
            }             
            $stmt = self::$dbHandler->prepare("UPDATE `idiom_level` 
                                                SET `name` = `:name`, `description` = :description 
                                                WHERE `idiom_level_id` = :idiom_level_id ");
            
            $stmt->bindValue(':idiom_level_id', $toUpdate->idiom_level_id);
            $stmt->bindValue(':name', $toUpdate->name);
            $stmt->bindValue(':description', $toUpdate->description);                    
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
        $stmt = self::$dbHandler->prepare("SELECT * FROM `idiom_level` 
                                            WHERE `idiom_level_id` > :idiom_level_id 
                                            ORDER BY `idiom_level_id` LIMIT 25");
        $stmt->bindValue(':idiom_level_id', $firstElement);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>