<?php
/* 
  Deletes a governmentDistrict in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/governmentDistrict.php');

/*
	Verify if the governmentDistrict information is in _POST var.
*/
if ( isset($_POST['governmentDistrictId']) ){
	$governmentDistrictId = $_POST['governmentDistrictId'];	

	$governmentDistrictHandler = new governmentDistrictHandler();
	$governmentDistrictHandler->delete($governmentDistrictId);
	echo json_encode("Deletado com sucesso.");
	exit;
}
?>