<?php
/* 
  Deletes a userProfile in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/userProfile.php');

/*
	Verify if the userProfile information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
echo $requestBody;
$userProfile = json_decode($requestBody);
$userProfileId = $userProfile->userProfile_id;
$userProfileHandler = new userProfileHandler();
$userProfileHandler->delete($userProfileId);
echo json_encode("Deletado com sucesso.");
exit;
?>