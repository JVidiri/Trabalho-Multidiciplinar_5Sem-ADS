<?php
/*
    Class to work with the profilePhoto in database.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/sql/dbInterface.php');
require_once($rootPath . '/resources/template/types/profilePhoto.php');

class publishedWorkHandler extends dbFacade implements dbInterface{

    public function insert($toAdd){
        if ($this->isRightType($toAdd, "profilePhoto")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO `profile_photo`(
                                                `profile_photo_id`, `fk_profile_id`, `photo_path`) 
                                                VALUES (:profile_photo_id, :fk_profile_id, :photo_path)");
            //TODO must be trgger to update te date.
            $stmt->bindValue(':profile_photo_id', $toAdd->profile_photo_id);            
            $stmt->bindValue(':fk_profile_id', $toAdd->fk_profile_id);
            $stmt->bindValue(':photo_path', $toAdd->photo_path);            
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
        $stmt = self::$dbHandler->prepare("DELETE FROM `profile_photo` 
                                            WHERE `profile_photo_id` = :toDelete");
        $stmt->bindValue(':toDelete', $toDelete);
        $ret = $stmt->execute();
        return $ret;
    }

    public function update($toUpdate){
        if ($this->isRightType($toAdd, "profilePhoto")){
            if(!self::$dbHandler) {
                $this->connect();
            }            
            $stmt = self::$dbHandler->prepare("UPDATE `profile_photo` 
                                                SET `photo_path`=:photo_path
                                                WHERE `profile_photo_id` = :profile_photo_id");

            $stmt->bindValue(':profile_photo_id', $toUpdate->profile_photo_id);   
            $stmt->bindValue(':photo_path', $toUpdate->photo_path);
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
                                            ORDER BY `profile_photo_id`");
        $stmt->bindValue(':fk_profile_id', $fk_profile_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}