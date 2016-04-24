<?php
/*
    Class to work with the publishedWork in database.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/sql/dbInterface.php');
require_once($rootPath . '/resources/template/types/publishedWork.php');

class publishedWorkHandler extends dbFacade implements dbInterface{

    public function insert($toAdd){
        if ($this->isRightType($toAdd, "publishedWork")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO `published_work`
                                                        (`fk_profile_id`, `title`, `type`, `description`)
                                                VALUES (:fk_profile_id, :title, :type, :description)");

            $stmt->bindValue(':fk_profile_id', $toAdd->fk_profile_id);            
            $stmt->bindValue(':title', $toAdd->title);
            $stmt->bindValue(':type', $toAdd->type);
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
        $stmt = self::$dbHandler->prepare("DELETE FROM `published_work` 
                                            WHERE `published_work_id` = :toDelete");
        $stmt->bindValue(':toDelete', $toDelete);
        $ret = $stmt->execute();
        return $ret;
    }

    public function update($toUpdate){
        if ($this->isRightType($toAdd, "publishedWork")){
            if(!self::$dbHandler) {
                $this->connect();
            }            
            $stmt = self::$dbHandler->prepare("UPDATE `published_work` 
                                                SET `fk_profile_id`=:fk_profile_id,
                                                    `title`=:title,
                                                    `type`=:type,
                                                    `description`=:description 
                                                WHERE `published_work_id`=:published_work_id,");

            $stmt->bindValue(':published_work_id', $toUpdate->published_work_id);
            $stmt->bindValue(':fk_profile_id', $toAdd->fk_profile_id);            
            $stmt->bindValue(':title', $toAdd->title);
            $stmt->bindValue(':type', $toAdd->type);
            $stmt->bindValue(':description', $toAdd->description);            
            $ret = $stmt->execute();
            return $ret;
        }else{
            //TODO return error;
        }
    }

    /*This kind of data must be selected via the profile id. */
    public function select($profile_id){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("SELECT * FROM `published_work` 
                                            WHERE `fk_profile_id` = :fk_profile_id 
                                            ORDER BY `published_work_id`");
        $stmt->bindValue(':fk_profile_id', $fk_profile_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}