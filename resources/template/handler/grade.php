<?php
/*
    Class to work with the badges in database.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/sql/dbInterface.php');
require_once($rootPath . '/resources/template/types/grade.php');

class gradeHandler extends dbFacade implements dbInterface{

	public function insert($toAdd){
        if ($this->isRightType($toAdd, "grade")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO 
            									`grade`(`title`, `pontuation`, `fk_country_id`) 
            									VALUES (:title,:pontuation,:fk_country_id)");

            $stmt->bindValue(':title', $toAdd->title);
            $stmt->bindValue(':pontuation', $toAdd->pontuation);
            $stmt->bindValue(':fk_country_id', $toAdd->fk_country_id);            
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
        $stmt = self::$dbHandler->prepare("DELETE FROM `grade` 
                                            WHERE `grade_id` = :toDelete");
        $stmt->bindValue(':toDelete', $toDelete);
        $ret = $stmt->execute();
        return $ret;
    }

    public function update($toUpdate){
        if ($this->isRightType($toAdd, "grade")){
            if(!self::$dbHandler) {
                $this->connect();
            }             
            $stmt = self::$dbHandler->prepare("UPDATE `grade` 
                                                SET `title` = :title, `pontuation` = :pontuation, `fk_country_id` = :fk_country_id 
                                                WHERE `grade_id` = :grade_id ");
            
            $stmt->bindValue(':grade_id', $toUpdate->grade_id);
            $stmt->bindValue(':title', $toUpdate->title);
            $stmt->bindValue(':pontuation', $toUpdate->pontuation);        
            $stmt->bindValue(':fk_country_id', $toUpdate->fk_country_id);                    
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
        $stmt = self::$dbHandler->prepare("SELECT * FROM `grade` 
                                            WHERE `grade_id` > :grade_id 
                                            ORDER BY `grade_id` LIMIT 25");
        $stmt->bindValue(':grade_id', $firstElement);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>