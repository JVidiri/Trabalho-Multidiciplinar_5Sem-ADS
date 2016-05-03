<?php
/* 
  Deletes a publishedWork in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/publishedWork.php');

/*
	Verify if the publishedWork information is in _POST var.
*/
if ( isset($_POST['publishedWorkId']) ){
	$publishedWorkId = $_POST['publishedWorkId'];	

	$publishedWorkHandler = new publishedWorkHandler();
	$publishedWorkHandler->delete($publishedWorkId);
	echo json_encode("Deletado com sucesso.");
	exit;
}
?>