<?php
/* 
  Deletes a idiom in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/idiom.php');

/*
	Verify if the idiom information is in _POST var.
*/
if ( isset($_POST['idiomId']) ){
	$idiomId = $_POST['idiomId'];	

	$idiomHandler = new idiomHandler();
	$idiomHandler->delete($idiomId);
	echo json_encode("Deletado com sucesso.");
	exit;
}
?>