<?php
/*
    Class to work with the admin in database.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/sql/dbInterface.php');
require_once($rootPath . '/resources/template/types/admin.php');
/* require_once($rootPath . '/resources/composer/vendor/autoload.php'); */

class adminHandler extends dbFacade implements dbInterface{

    public function insert($toAdd){

        if ($this->isRightType($toAdd, "admin")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO 
                                                `admin_user`(`name`, `pass_hash`)
                                                VALUES (:name, PASSWORD(:pass_hash))");

            $stmt->bindValue(':name', $toAdd->name);            
            $stmt->bindValue(':pass_hash', $toAdd->pass_hash);
            try {
                $ret = $stmt->execute();
            } catch (PDOException $e) {
                $ret = "Database error, try again";
            }   
            return $ret;
        }else{
            $ret = "Object type error";
            return $ret;
        }
    }  

    public function delete($toDelete){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("DELETE FROM `admin_user` 
                                            WHERE `admin_user_id` = :toDelete");
        $stmt->bindValue(':toDelete', $toDelete);
        $ret = $stmt->execute();
        return $ret;
    }

    public function update($toUpdate){
        if ($this->isRightType($toUpdate, "admin")){
            if(!self::$dbHandler) {
                $this->connect();
            }            
            $stmt = self::$dbHandler->prepare("UPDATE `admin_user` 
                                                SET`name` = :name 
                                                WHERE `admin_user_id` = :admin_user_id ");

            $stmt->bindValue(':admin_user_id', $toUpdate->admin_user_id);
            $stmt->bindValue(':name', $toUpdate->name);
            $ret = $stmt->execute();
            return $ret;
        }else{
            //TODO return error;
        }
    }

    public function select($firstElement = 0){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("SELECT `admin_user_id`, `name`  FROM `admin_user` 
                                            WHERE `admin_user_id` > :last_user 
                                            ORDER BY `admin_user_id` LIMIT 25");
        $stmt->bindValue(':last_user', $firstElement);
        $stmt->execute();
        //echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($userID){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("SELECT * FROM `admin_user` 
                                            WHERE `admin_user_id` = :admin_user_id");
        $stmt->bindValue(':user_id', $userId);
        $stmt->execute();
        $adminData = $stmt->fetch(PDO::FETCH_ASSOC);
        $admin = NULL;   
        if ($adminData) {            
            $admin = new admin($adminData['admin_user_id'],
                                $adminData['name'],                                
                                $adminData['pass_hash']);
        }
        return $admin;
    }

    public function getUserByAdminName($adminName){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("SELECT * FROM `admin_user` 
                                            WHERE `name` = :name");
        $stmt->bindValue(':name', $adminName);
        $stmt->execute();
        $adminData = $stmt->fetch(PDO::FETCH_ASSOC);        
        $admin = NULL;   
        if ($adminData) {            
            $admin = new admin($adminData['admin_user_id'],
                                $adminData['name'],                                
                                $adminData['pass_hash']);
        }
        return $admin;
    }

    public function verifyByNameAndPassword($name, $password){
        if(!self::$dbHandler) {
            $this->connect();
        }        
        $stmt = self::$dbHandler->prepare("SELECT * FROM admin_user
                                                           WHERE name = :name 
                                                           AND pass_hash = PASSWORD(:password)");

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':password', $password);  
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        $admin = NULL;   
        if ($userData) {            
            $admin = new admin($userData['admin_user_id'],
                                $userData['name'],                                
                                $userData['pass_hash']);
        }
        return $admin;
    }
}