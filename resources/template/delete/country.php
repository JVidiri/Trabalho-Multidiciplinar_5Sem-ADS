<?php
/* 
  Deletes a country in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/country.php');

/*
	Verify if the country information is in _POST var.
*/
if ( isset($_POST['countryId']) ){
	$countryId = $_POST['countryId'];	

	$countryHandler = new countryHandler();
	$countryHandler->delete($countryId);
	echo json_encode("Deletado com sucesso.");
	exit;
}
?>