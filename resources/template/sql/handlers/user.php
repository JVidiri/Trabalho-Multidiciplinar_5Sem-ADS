<?php
/*
    Class to work with the user in database.
*/
include_once(dirname(__FILE__) . '/../dbFacade.php');
include_once(dirname(__FILE__) . '/../dbInterface.php');
include_once(dirname(__FILE__) . '/../types/user.php');

class userHandler extends dbFacade implements dbInterface{

    public function insert($toAdd){
        if ($this->isRightType($toAdd, "user")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO 
                                                `user`(`name`, `mail`, `pass_hash`, `is_confirmed`, `created`, `last_login`) 
                                                VALUES (:name,:mail,PASSWORD(:password),:is_confirmed, :created, NULL)");

            $stmt->bindValue(':name', $toAdd->name);
            $stmt->bindValue(':mail', $toAdd->mail);
            $stmt->bindValue(':password', $toAdd->password);
            $stmt->bindValue(':is_confirmed', $toAdd->is_confirmed, PDO::PARAM_INT);
            $stmt->bindValue(':created', $toAdd->created);
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
        $stmt = self::$dbHandler->prepare("DELETE FROM `user` 
                                            WHERE `user_id` = :toDelete");
        $stmt->bindValue(':toDelete', $toDelete);
        $ret = $stmt->execute();
        return $ret;
    }

    public function update($toUpdate){
        if ($this->isRightType($toAdd, "user")){
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
            $stmt = self::$dbHandler->prepare("UPDATE `user` 
                                                SET(`name` = :name , `mail` = :mail, `pass_hash` = PASSWORD(:password)) 
                                                WHERE `user_id` = :user_id ");

            $stmt->bindValue(':user_id', $toUpdate->user_id);
            $stmt->bindValue(':name', $toUpdate->name);        
            $stmt->bindValue(':mail', $toUpdate->mail);        
            $stmt->bindValue(':password', $toUpdate->password);        
            $ret = $stmt->execute();
            return $ret;
        }else{
            //TODO return error;
        }
    }

    public function select($lastUser){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("SELECT * FROM `user` 
                                            WHERE `user_id` > :last_user 
                                            ORDER BY `user_id` LIMIT 25");
        $stmt->bindValue(':last_user', $lastUser);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($userID){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("SELECT * FROM `user` 
                                            WHERE `user_id` > :user_id");
        $stmt->bindValue(':user_id', $userId);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        $user = NULL;   
        if ($userData) {            
            $user = new user($userData['user_id'],
                                $userData['name'],
                                $userData['mail'],
                                $userData['pass_hash'],
                                $userData['is_confirmed'],
                                $userData['created'],
                                $userData['last_login']);
        }
        return $user;
    }

    public function confirmEmail($userId, $confirmed){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("call update_user_is_confirmed(:user_id, :is_confirmed)");
        $stmt->bindValue(':user_id', $userId);
        $stmt->bindValue(':is_confirmed', $confirmed);
        $ret = $stmt->execute();
        return $ret;
    }

    public function verifyByMailAndPassword($mail, $password){
        if(!self::$dbHandler) {
            $this->connect();
        }        
        $stmt = self::$dbHandler->prepare("SELECT * FROM user
                                                           WHERE mail = :mail 
                                                           AND pass_hash = PASSWORD(:password)");

        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':password', $password);  
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        $user = NULL;   
        if ($userData) {            
            $user = new user($userData['user_id'],
                                $userData['name'],
                                $userData['mail'],
                                $userData['pass_hash'],
                                $userData['is_confirmed'],
                                $userData['created'],
                                $userData['last_login']);
        }
        return $user;
    }
}