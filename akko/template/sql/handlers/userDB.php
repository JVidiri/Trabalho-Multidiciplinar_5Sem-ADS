<?php
/*
    Class to work with the user in database.
*/
echo getcwd();
$path = $_SERVER['DOCUMENT_ROOT'];
echo $path;
include('../dbFacade.php');
include('../dbInterface.php');
include('../types/user.php');

class userDB extends dbFacade implements dbInterface{

    public function insert($toAdd){
        if (isRightType($toAdd, "user")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO 
                                            `user`(`name`, `email`, `pass_hash`, `is_confirmed`, `created`, `last_login`) 
                                            VALUES (:name,:email,PASSWORD(:pass_hash),:is_confirmed, :created, NULL)");

            $params = array(':name' => $toAdd->name,
                            ':email' => $toAdd->email,
                            ':pass_hash' => $toAdd->pass_hash,
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
        $stmt = self::$dbHandler->prepare("SELECT COUNT(*) FROM user 
                                                           WHERE mail = ':mail' 
                                                           AND pass_hash = PASSWORD(':password')");
        $params = array(':mail' => $mail,
                        ':password' => $password);
        $ret = $stmt->execute($params);
        return $ret;
    }
}