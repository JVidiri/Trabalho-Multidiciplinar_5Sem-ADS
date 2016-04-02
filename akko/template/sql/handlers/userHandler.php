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
            //return error;
        }
    }    
    public function delete($toDelete){
        //TODO
    }
    public function update($template){
        //TODO
    }
    public function select($lastUser){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("SELECT * from `user` where `user_id` > :last_user ORDER BY `user_id` limit 25");
        $stmt->bindValue(':name', $toAdd->name);

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