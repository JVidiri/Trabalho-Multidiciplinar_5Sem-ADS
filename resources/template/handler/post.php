<?php
/*
    Class to post with the user in database.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/sql/dbInterface.php');
require_once($rootPath . '/resources/template/types/post.php');

class postHandler extends dbFacade implements dbInterface{

	 public function insert($toAdd){
        if ($this->isRightType($toAdd, "post")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO `post`
            									(`fk_user_id`, `content`) 
            									VALUES (:fk_user_id,:content)");

            $stmt->bindValue(':fk_user_id', $toAdd->fk_user_id);
            $stmt->bindValue(':content', $toAdd->content);            
            $ret = $stmt->execute();           

            //getting the last inserted id to the next inserts.
            $id = self::$dbHandler->lastInsertId();            
            return $id;
        }else{
            //TODO return error;
        }
    }  

    public function delete($toDelete){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("DELETE FROM `profile` 
                                            WHERE `profile_id` = :toDelete");
        $stmt->bindValue(':toDelete', $toDelete);
        $ret = $stmt->execute();
        return $ret;
    }

    public function update($toUpdate){
        if ($this->isRightType($toAdd, "profile")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            //If the email change we have to unconfirm the email
            $oldUser = $this->getUserById($toUpdate->user_id);
            if (!$oldUser){
                //TODO return error
            }
            if ($oldUser->mail = $toUpdate->mail){
                confirmEmail($toUpdate->user_id, 0);
            }        
            $stmt = self::$dbHandler->prepare("UPDATE `profile` 
                                                SET(`fk_user_id`=:user_id,
                                                    `fk_profile_type_id`=:profile_type,
                                                    `complete_name`=:complete_name,
                                                    `about`=:about,
                                                    `birth`=:birth,
                                                    `alias`=:alias,
                                                    `curriculum`=:curriculum) 
                                                WHERE `user_id` = :user_id ");

            $stmt->bindValue(':user_id', $toAdd->user->user_id);
            $stmt->bindValue(':profile_type', $toAdd->profile_id);
            $stmt->bindValue(':complete_name', $toAdd->complete_name);
            $stmt->bindValue(':about', $toAdd->about);
            $stmt->bindValue(':birth', $toAdd->birth);
            $stmt->bindValue(':alias', $toAdd->alias);
            $stmt->bindValue(':curriculum', $toAdd->curriculum);    
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
        $stmt = self::$dbHandler->prepare("SELECT * FROM `profile` 
                                            WHERE `profile_id` > :last_element 
                                            ORDER BY `profile_id` LIMIT 25");
        $stmt->bindValue(':last_element', $firstElement);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>