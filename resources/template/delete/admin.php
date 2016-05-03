<?php
/* 
  Deletes a admin in the database.  
*/
  
require_once($_SERVER['DOCUMENT_ROOT'] . '/Trabalho-Multidiciplinar_5Sem-ADS/resources/inc.php');
require_once($rootPath . '/resources/template/sql/dbFacade.php');
require_once($rootPath . '/resources/template/handler/admin.php');

/*
	Verify if the admin information is in _POST var.
*/
if ( isset($_POST['adminId']) ){
	$adminId = $_POST['adminId'];	
	
	$adminHandler = new adminHandler();
	$adminHandler->delete($adminId);
	echo json_encode("Deletado com sucesso.");
	exit;
}
?>