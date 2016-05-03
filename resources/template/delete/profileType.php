<?php
/* 
  Deletes a profileType in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/profileType.php');

/*
	Verify if the profileType information is in _POST var.
*/
if ( isset($_POST['profileTypeId']) ){
	$profileTypeId = $_POST['profileTypeId'];	

	$profileTypeHandler = new profileTypeHandler();
	$profileTypeHandler->delete($profileTypeId);
	echo json_encode("Deletado com sucesso.");
	exit;
}
?>