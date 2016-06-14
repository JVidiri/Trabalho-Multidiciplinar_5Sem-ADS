<?php
/* 
  Insert a city in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/city.php');

/*
	Verify if the city information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$city = json_decode($requestBody);
if ($city){
	$uf = $city->uf;
	$fk_government_district = $city->fk_government_district;
	
	$newcity = new city(NULL, $uf, $fk_government_district);
	$cityHandler = new cityHandler();
	$cityHandler->insert($newcity);
	echo json_encode("{ret: \"Registrado com sucesso.\"}");
	exit;
}else{
	echo json_encode("{ret: \"Erro no registro.\"}");
	exit;
}
?>