<?php
/*
    Class to work with the badges in database.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/sql/dbInterface.php');
require_once($rootPath . '/resources/template/types/userSite.php');

class userSiteHandler extends dbFacade implements dbInterface{

	public function insert($toAdd){
        if ($this->isRightType($toAdd, "userSite")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO 
            									`user_site`(`fk_profile_id`, `URL`, `alias`) 
            									VALUES (:fk_profile_id,:URL,:alias)");
            $stmt->bindValue(':fk_profile_id', $toAdd->type);
            $stmt->bindValue(':URL', $toAdd->title);
            $stmt->bindValue(':alias', $toAdd->description);
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
        $stmt = self::$dbHandler->prepare("DELETE FROM `user_site` 
                                            WHERE `user_site_id` = :toDelete");
        $stmt->bindValue(':toDelete', $toDelete);
        $ret = $stmt->execute();
        return $ret;
    }

    public function update($toUpdate){
        if ($this->isRightType($toAdd, "useSite")){
            if(!self::$dbHandler) {
                $this->connect();
            }             
            $stmt = self::$dbHandler->prepare("UPDATE `user_site` 
                                                SET `URL`= :URL,
                                                    `alias`= :alias 
                                                WHERE `user_site_id` = :user_site_id");
            $stmt->bindValue(':URL', $toAdd->title);
            $stmt->bindValue(':alias', $toAdd->description);
            $ret = $stmt->execute();
            return $ret;
        }else{
            //TODO return error;
        }
    }

    public function select($profile_id){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("SELECT * FROM `user_site` 
                                            WHERE `fk_profile_id` = :fk_profile_id 
                                            ORDER BY `user_site_id` LIMIT 25");
        $stmt->bindValue(':fk_profile_id', $profile_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>