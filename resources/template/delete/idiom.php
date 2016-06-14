<?php
/* 
  Deletes a idiom in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/idiom.php');

/*
	Verify if the idiom information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$idiom = json_decode($requestBody);
$idiomId = $idiom->idiom_id;
$idiomHandler = new idiomHandler();
$idiomHandler->delete($idiomId);
echo json_encode("{ret: \"Deletado com sucesso.\"}");
exit;
?>