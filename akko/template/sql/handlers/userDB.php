<?php
/*
    Class to work with the user in database.
*/
include '../dbFacade.php';
include '../dbInterface.php';
include '../types/user.php';

class userDB extends dbFacade implements dbInterface{

    public function insert($toAdd){
        if (isRightType($toAdd, "user")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO 
                                            `user`(`name`, `email`, `pass_hash`, `is_confirmed`, `created`, `last_login`) 
                                            VALUES (:name,:email,:pass_hash,:is_confirmed, :created, NULL)");

            $params = array(':name' => $toAdd->name,
                            ':email' => $toAdd->email,
                            ':pass_hash' => $toAdd->pass_hash,
                            ':is_confirmed' => $toAdd->is_confirmed,
                            ':created' => $toAdd->created;          
            $ret = $stmt->execute($params);
            return $ret;
        }else{
            //return error;
        }
    }    
    public function delete($toDelete){

    }
    public function update($template);
    public function select($template);
}