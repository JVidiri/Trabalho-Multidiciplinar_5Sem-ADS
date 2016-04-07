<?php
/*
    Class to work with the badges in database.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/sql/dbInterface.php');
require_once($rootPath . '/resources/template/types/badge.php');

class badgeHandler extends dbFacade implements dbInterface{

	public function insert($toAdd){
        if ($this->isRightType($toAdd, "badge")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO 
            									`badge`(`fk_type_id`, `title`, `description`, `thumb`) 
            									VALUES (:type,:title,:description,:thumb)");

            $stmt->bindValue(':type', $toAdd->type);
            $stmt->bindValue(':title', $toAdd->title);
            $stmt->bindValue(':description', $toAdd->description);
            $stmt->bindValue(':thumb', $toAdd->thumb);            
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
        $stmt = self::$dbHandler->prepare("DELETE FROM `badge` 
                                            WHERE `badge_id` = :toDelete");
        $stmt->bindValue(':toDelete', $toDelete);
        $ret = $stmt->execute();
        return $ret;
    }

    public function update($toUpdate){
        if ($this->isRightType($toAdd, "badge")){
            if(!self::$dbHandler) {
                $this->connect();
            }             
            $stmt = self::$dbHandler->prepare("UPDATE `badge` 
                                                SET `type` = :type , `title` = :title, `description` = :description, `thumb` = :thumb 
                                                WHERE `badge_id` = :badge_id ");

            $stmt->bindValue(':badge_id', $toUpdate->badge_id);
            $stmt->bindValue(':title', $toUpdate->title);        
            $stmt->bindValue(':description', $toUpdate->description);        
            $stmt->bindValue(':thumb', $toUpdate->thumb);        
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
        $stmt = self::$dbHandler->prepare("SELECT * FROM `badge` 
                                            WHERE `badge_id` > :badge_id 
                                            ORDER BY `badge_id` LIMIT 25");
        $stmt->bindValue(':badge_id', $firstElement);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>