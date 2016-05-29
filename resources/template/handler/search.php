<?php 
/*
    Class to make search in the database, 
    The functions can find users, badges and posts, by the prefix and entire words.
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');

class searchHandler extends dbFacade{

	public function searchUsersBySearchTerm($searchTerm){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("SELECT profile_id, complete_name 
        										FROM `profile` 
        										WHERE MATCH(`profile`.`complete_name`) 
        												AGAINST(:searchTerm
        												IN NATURAL LANGUAGE MODE)");
        $stmt->bindValue(':searchTerm', $searchTerm);
        $stmt->execute();
        //echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchBadgesBySearchTerm($searchTerm){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("SELECT badge_id, title 
        										FROM `badge` 
        										WHERE MATCH(`badge`.`title`) 
        												AGAINST(:searchTerm
        												IN NATURAL LANGUAGE MODE)");
        $stmt->bindValue(':searchTerm', $searchTerm);
        $stmt->execute();
        //echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchPostsBySearchTerm($searchTerm){
        if(!self::$dbHandler) {
            $this->connect();
        }
        $stmt = self::$dbHandler->prepare("SELECT post_id, content 
        										FROM `post` 
        										WHERE MATCH(`post`.`content`) 
        												AGAINST(:searchTerm
        												IN NATURAL LANGUAGE MODE)");
        $stmt->bindValue(':searchTerm', $searchTerm);
        $stmt->execute();
        //echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>