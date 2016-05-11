<?php
/* 
  Deletes a idiomLevel in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/idiomLevel.php');

/*
	Verify if the idiomLevel information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
echo $requestBody;
$idiomLevel = json_decode($requestBody);
$idiomLevelId = $idiomLevel->idiomLevel_id;
$idiomLevelHandler = new idiomLevelHandler();
$idiomLevelHandler->delete($idiomLevelId);
echo json_encode("Deletado com sucesso.");
exit;
?>