<?php
/*
    Class to work with the admin in database.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/sql/dbInterface.php');
require_once($rootPath . '/resources/template/types/experience.php');

class experienceHandler extends dbFacade implements dbInterface{

    public function insert($toAdd){
        if ($this->isRightType($toAdd, "experience")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO `experience`
                                                    (`title`, `content`, `date_ini`, `date_end`) 
                                                    VALUES (:title, :content, :date_ini, :date_end)");

            $stmt->bindValue(':title', $toAdd->name);
            $stmt->bindValue(':content', $toAdd->pass_hash);
            $stmt->bindValue(':date_ini', $toAdd->date_ini);
            $stmt->bindValue(':date_end', $toAdd->date_end);
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
        $stmt = self::$dbHandler->prepare("DELETE FROM `experience` 
                                            WHERE `experience_id` = :toDelete");
        $stmt->bindValue(':toDelete', $toDelete);
        $ret = $stmt->execute();
        return $ret;
    }

    public function update($toUpdate){
        if ($this->isRightType($toAdd, "experience")){
            if(!self::$dbHandler) {
                $this->connect();
            }            
            $stmt = self::$dbHandler->prepare("UPDATE `experience_user` 
                                                SET `title`=:title,
                                                    `content`=:content,
                                                    `date_ini`=date_ini,
                                                    `date_end`=date_end
                                                WHERE `experience_id` = :experience_id");

            $stmt->bindValue(':title', $toAdd->name);
            $stmt->bindValue(':content', $toAdd->pass_hash);
            $stmt->bindValue(':date_ini', $toAdd->date_ini);
            $stmt->bindValue(':date_end', $toAdd->date_end);
            $ret = $stmt->execute();
            return $ret;
        }else{
            //TODO return error;
        }
    }

    /*
        This will be by profile_id
    */
    public function select($profileId){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("SELECT * FROM `experience` 
                                            WHERE `profile_id` = :profile_id 
                                            ORDER BY `experience_id`");
        $stmt->bindValue(':last_user', $profileId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}