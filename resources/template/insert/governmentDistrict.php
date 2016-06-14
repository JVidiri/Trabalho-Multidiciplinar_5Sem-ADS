<?php
/* 
  Insert a new user in the database
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/governmentDistrict.php');

/*
	Verify if the user information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$data = json_decode($requestBody);
if ($data){
	$name = $data->name;
	$uf = $data->uf;
	$fk_country = $data->fk_country;	

	$newGovernmentDistrict = new governmentDistrict(NULL, $name, $uf, $fk_country);	
	$governmentDistrictHandler = new governmentDistrictHandler();
	$governmentDistrictHandler->insert($newGovernmentDistrict);		
	echo json_encode("{ret: \"Registrado com sucesso.\"}");
	exit;
}else{
	echo json_encode("{ret: \"Erro no registro.\"}");
	exit;
}
?>