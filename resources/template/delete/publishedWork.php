<?php
/* 
  Deletes a publishedWork in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/publishedWork.php');

/*
	Verify if the publishedWork information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$publishedWork = json_decode($requestBody);
$publishedWorkId = $publishedWork->publishedWork_id;
$publishedWorkHandler = new publishedWorkHandler();
$publishedWorkHandler->delete($publishedWorkId);
echo json_encode("{ret: \"Deletado com sucesso.\"}");
exit;
?>