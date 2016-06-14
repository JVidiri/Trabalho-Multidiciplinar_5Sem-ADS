<?php
/* 
  Deletes a governmentDistrict in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/governmentDistrict.php');

/*
	Verify if the governmentDistrict information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$governmentDistrict = json_decode($requestBody);
$governmentDistrictId = $governmentDistrict->governmentDistrict_id;
$governmentDistrictHandler = new governmentDistrictHandler();
$governmentDistrictHandler->delete($governmentDistrictId);
echo json_encode("{ret: \"Deletado com sucesso.\"}");
exit;
?>