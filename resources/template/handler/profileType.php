<?php
/*
    Class to work with the badges in database.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/sql/dbInterface.php');
require_once($rootPath . '/resources/template/types/profileType.php');

class profileTypeHandler extends dbFacade implements dbInterface{

	public function insert($toAdd){
        if ($this->isRightType($toAdd, "profileType")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO 
            									`profile_type`(`name`, `description`) 
            									VALUES (:name,:description)");
            
            $stmt->bindValue(':name', $toAdd->title);
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
        $stmt = self::$dbHandler->prepare("DELETE FROM `profile_type` 
                                            WHERE `type_id` = :toDelete");
        $stmt->bindValue(':toDelete', $toDelete);
        $ret = $stmt->execute();
        return $ret;
    }

    public function update($toUpdate){
        if ($this->isRightType($toAdd, "profileType")){
            if(!self::$dbHandler) {
                $this->connect();
            }             
            $stmt = self::$dbHandler->prepare("UPDATE `profile_type` 
                                                SET `name` = :name, `description` = :description
                                                WHERE `type_id` = :type_id ");

            $stmt->bindValue(':type_id', $toUpdate->type_id);
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
        $stmt = self::$dbHandler->prepare("SELECT * FROM `profile_type` 
                                            WHERE `type_id` > :type_id 
                                            ORDER BY `type_id` LIMIT 25");
        $stmt->bindValue(':type_id', $firstElement);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>