<?php
/* 
  Deletes a user in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/user.php');

/*
	Verify if the user information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$user = json_decode($requestBody);
$userId = $user->user_id;
$userHandler = new userHandler();
$userHandler->delete($userId);
echo json_encode("{ret: \"Deletado com sucesso.\"}");
exit;
?>