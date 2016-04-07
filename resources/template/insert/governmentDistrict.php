<?php
/* 
  Insert a new user in the database
*/
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/governmentDistrict.php');

/*
	Verify if the user information is in _POST var.
*/
if ( isset($_POST['name']) && isset($_POST['uf']) && 
		isset($_POST['fk_country']) ){
	$name = $_POST['name'];
	$uf = $_POST['uf'];
	$fk_country = $_POST['fk_country'];	

	$newGovernmentDistrict = new governmentDistrict(NULL, $name, $uf, $fk_country);
	//echo $newUser->is_confirmed;
	$governmentDistrictHandler = new governmentDistrictHandler();
	$governmentDistrictHandler->insert($newGovernmentDistrict);		
	$RegisterOk = "Registrado com sucesso! <a href=\"login.php\">Faça login</a>";	
	exit;
}
?>