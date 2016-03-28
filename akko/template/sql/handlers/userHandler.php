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

            $params = array(':name' => $toAdd->name,
                            ':mail' => $toAdd->mail, 
                            ':password' => $toAdd->password,
                            ':is_confirmed' => $toAdd->is_confirmed,
                            ':created' => $toAdd->created);
            $ret = $stmt->execute($params);
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
    public function select($template){
        //TODO
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