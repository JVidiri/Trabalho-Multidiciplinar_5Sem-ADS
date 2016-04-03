<?php
/*
    Class to work with the badges in database.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/sql/dbInterface.php');
require_once($rootPath . '/resources/template/types/governmentDistrict.php');

class governmentDistrictHandler extends dbFacade implements dbInterface{

	public function insert($toAdd){
        if ($this->isRightType($toAdd, "governmentDistrict")){
            if(!self::$dbHandler) {
                $this->connect();
            }
            $stmt = self::$dbHandler->prepare("INSERT INTO 
            									`government_district`(`name`, `uf`, `fk_country`) 
            									VALUES (:name,:uf,:fk_country)");

            $stmt->bindValue(':name', $toAdd->name);
            $stmt->bindValue(':uf', $toAdd->uf);
            $stmt->bindValue(':fk_country', $toAdd->fk_country);                   
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
        $stmt = self::$dbHandler->prepare("DELETE FROM `government_district` 
                                            WHERE `government_district_id` = :toDelete");
        $stmt->bindValue(':toDelete', $toDelete);
        $ret = $stmt->execute();
        return $ret;
    }

    public function update($toUpdate){
        if ($this->isRightType($toAdd, "governmentDistrict")){
            if(!self::$dbHandler) {
                $this->connect();
            }             
            $stmt = self::$dbHandler->prepare("UPDATE `government_district` 
                                                SET `name` = :name , `uf` = :uf, `fk_country` = :fk_country 
                                                WHERE `government_district` = :government_district ");
            
            $stmt->bindValue(':government_district_id', $toUpdate->government_district_id);
            $stmt->bindValue(':name', $toUpdate->name);
            $stmt->bindValue(':uf', $toUpdate->uf);        
            $stmt->bindValue(':fk_country', $toUpdate->fk_country);                    
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
        $stmt = self::$dbHandler->prepare("SELECT * FROM `government_district` 
                                            WHERE `government_district_id` > :government_district_id 
                                            ORDER BY `government_district_id` LIMIT 25");
        $stmt->bindValue(':government_district_id', $firstElement);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>