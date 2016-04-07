<?php
/* 
  Insert a country in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/country.php');

/*
	Verify if the country information is in _POST var.
*/
if ( isset($_POST['country_id']) && isset($_POST['name']) && 
		isset($_POST['thumb_pic']) && isset($_POST['uf'])){
	$country_id = $_POST['country_id'];
	$name = $_POST['name'];
	$thumb_pic = $_POST['thumb_pic'];
	//TODO verificar como fazer o upload do arquivo.
	$uf = $_POST['uf'];
	
	$newCountry = new country(NULL, $name, $country_id, $name, $thumb_pic, $uf);	
	$countryHandler = new countryHandler();
	$countryHandler->insert($newCountry);
	$RegisterOk = "Registrado com sucesso!";	
	exit;
}
?>