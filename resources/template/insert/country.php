<?php
/* 
  Insert a country in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/adminAccessControl.php');
require_once($rootPath . '/resources/template/handler/country.php');

/*
	Verify if the country information is in _POST var.
*/
$requestBody = file_get_contents('php://input');
$country = json_decode($requestBody);
if ($country){		
	$name = $country->name;
	$thumb = $country->thumb;	
	$uf = $country->uf;

	$newCountry = new country(NULL, $name, $thumb, $uf);	
	$countryHandler = new countryHandler();
	$countryHandler->insert($newCountry);
	echo json_encode("{ret: \"Registrado com sucesso.\"}");
	exit;
}else{
	echo json_encode("{ret: \"Erro no registro.\"}");
	exit;
}
?>