<?php
/* 
  Deletes a city in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/city.php');

/*
	Verify if the city information is in _POST var.
*/
if ( isset($_POST['cityId']) ){
	$cityId = $_POST['cityId'];	

	$cityHandler = new cityHandler();
	$cityHandler->delete($cityId);
	echo json_encode("Deletado com sucesso.");
	exit;
}
?>