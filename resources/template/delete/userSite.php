<?php
/* 
  Deletes a userSite in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/userSite.php');

/*
	Verify if the userSite information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$userSite = json_decode($requestBody);
$userSiteId = $userSite->userSite_id;
$userSiteHandler = new userSiteHandler();
$userSiteHandler->delete($userSiteId);
echo json_encode("{ret: \"Deletado com sucesso.\"}");
exit;
?>