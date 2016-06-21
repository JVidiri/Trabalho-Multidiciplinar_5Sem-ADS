<?php
/* 
  Deletes a experience in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/experience.php');

/*
	Verify if the experience information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$experience = json_decode($requestBody);
$experienceId = $experience->experience_id;
$experienceHandler = new experienceHandler();
$experienceHandler->delete($experienceId);
echo json_encode("{ret: \"Deletado com sucesso.\"}");
exit;
?>