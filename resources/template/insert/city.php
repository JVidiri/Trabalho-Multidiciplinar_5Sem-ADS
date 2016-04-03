<?php
/* 
  Insert a city in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/city.php');

/*
	Verify if the city information is in _POST var.
*/
if ( isset($_POST['uf']) && isset($_POST['fk_government_district']) ){
	$uf = $_POST['uf'];
	$fk_government_district = $_POST['fk_government_district'];
	
	$newcity = new city(NULL, $uf, $fk_government_district);
	$cityHandler = new cityHandler();
	$cityHandler->insert($newcity);
	$RegisterOk = "Registrado com sucesso!";	
	exit;
}
?>